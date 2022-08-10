<?php

namespace App\Http\Traits;
use App\Models\Fuser;
use DB;
trait TreeCountTrait{
	private $data;
   private $placement;
   private $my_gen;
   private $my_gen_left;
   private $my_gen_right;
   private $keys;
   private $vp_left=0;
   private $vp_right=0;
   private $left=0;
   private $right=0;
   private $down_left=0;
   private $down_right=0;
   public function treeCount(){
      $start=microtime(true);
      $this->data=DB::select("SELECT fusers.id,fusers.placement_id,fusers.position,ifnull(((invoice.ammount*60)/100),0) ammount,invoice.vp from fusers
         left join (
          select sum(ifnull(price,0)*ifnull(qantity,0)) ammount,sum(ifnull(vp,0)) vp,fuser_id from invoices  group by fuser_id
      ) invoice on invoice.fuser_id=fusers.id");
      $this->placement=(array)array_column($this->data, 'placement_id');
      $this->my_gen=array_keys($this->placement,auth()->user()->id);
      $this->keys=$this->my_gen;
      // dd($this->keys);
      $count=count($this->my_gen);
      $x=0;
      // divide generation left right array
      for ($i=0; $i <$count ; $i++) { 
         if($this->data[ $this->my_gen[$i] ]->position==1){
            $this->my_gen_left[]=$this->my_gen[$i];
         }
         if($this->data[ $this->my_gen[$i] ]->position==2){
            $this->my_gen_right[]=$this->my_gen[$i];
         }
      }
      // get and count total array
      if($this->my_gen_left!=null){
         while ($count!=0){
            $x+=1;
            $this_gen=$this->getTotal($this->my_gen_left);
            $this->my_gen_left=$this_gen['keys'];
            $this->left+=$this_gen['total'];
            $this->down_left+=$this_gen['down'];
            $this->vp_left+=$this_gen['vp'];
            if(count($this->my_gen_left)==0){
               break;
            }
         }
      }
      if ($this->my_gen_right!=null) {
         while ($count!=0){
            $x+=1;
            $this_genx=$this->getTotal($this->my_gen_right);
            $this->my_gen_right=$this_genx['keys'];
            $this->right+=$this_genx['total'];
            $this->down_right+=$this_genx['down'];
            $this->vp_right+=$this_genx['vp'];
            if(count($this->my_gen_right)==0){
               break;
            }
         }
      }
      
      $end=microtime(true);
      // echo $end-$start;
      // dd(['left'=>$this->left,'right'=>$this->right,'down_left'=>$this->down_left,'down_right'=>$this->down_right,'vp_left'=>$this->vp_left,'vp_right'=>$this->vp_right]);
      return ['left'=>$this->left,'right'=>$this->right,'down_left'=>$this->down_left,'down_right'=>$this->down_right,'vp_left'=>$this->vp_left,'vp_right'=>$this->vp_right];
   }
   public function getTotal($arr){
         $count=0;
         $ammount=0;
         $total=0;
         $down=0;
         $vp=0;
         $count=count($arr);
        for($i=0;$i<$count;$i++){
         $position=$this->data[ $arr[$i] ]->position;
         $ammount=$this->data[ $arr[$i] ]->ammount;
         $vp+=$this->data[ $arr[$i] ]->vp;
           if($ammount!=0){
               $total+=1;
           }
           $down+=1;
           $ammount+=$this->data[ $arr[$i] ]->ammount;
           $g=array_keys($this->placement,$this->data[ $arr[$i] ]->id);
           for($j=0;$j<count($g);$j++){
              $keys[]=$g[$j];
           }
           if(!isset($keys)){
               $keys=[];
           }
        }
       return ['count'=>$count,'ammount'=>$ammount,'keys'=>$keys,'total'=>$total,'vp'=>$vp,'down'=>$down];
     }
}

?>