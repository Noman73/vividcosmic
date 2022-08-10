<?php

namespace App\Http\Traits;
use App\Models\Fuser;
use DB;
trait VpCountTrait{
   
   private $v_data;
   public  $v_placement;
   public function getVp(){
   		$left=0;
   		$right=0;
   		$keys;
   		$my_gen_right;
   		$my_gen_left;
   		// dd($left);
      $start=microtime(true);
      $this->v_data=DB::select("SELECT fusers.id,fusers.placement_id,fusers.position,ifnull(invoice.ammount,0) ammount from fusers
         left join (
          select sum(ifnull(vp,0)) ammount,fuser_id from invoices  group by fuser_id
      ) invoice on invoice.fuser_id=fusers.id");
      $this->v_placement=(array)array_column($this->v_data, 'placement_id');
      $my_gen=array_keys($this->v_placement,auth()->user()->id);
      $keys=$my_gen;
      // dd($this->keys);
      $count=count($my_gen);
      $x=0;

      // divide generation left right array
      for ($i=0; $i <$count ; $i++) { 
         if($this->v_data[ $my_gen[$i] ]->position==1){
            $my_gen_left[]=$my_gen[$i];
         }
         if($this->v_data[ $my_gen[$i] ]->position==2){
            $my_gen_right[]=$my_gen[$i];
         }
      }
      // dd($my_gen_left);
      // get and count total array
      if(isset($my_gen_left)){
         while ($count!=0){
            $x+=1;
            $this_gen=$this->getTotal($my_gen_left);
            // dd($this_gen);
            $my_gen_left=$this_gen['keys'];
            $left+=$this_gen['total'];
            // dd($left);
            if(count($my_gen_left)==0){
               break;
            }
         }
      }
      if (isset($my_gen_right)){
         while ($count!=0){
            $x+=1;
            $this_genx=$this->getTotal($my_gen_right);
            $my_gen_right=$this_genx['keys'];
            $right+=$this_genx['total'];
            if(count($my_gen_right)==0){
               break;
            }
         }
      }
      $end=microtime(true);
    //   echo $end-$start;
    //   dd($left,$right);
      return ['left'=>$left,'right'=>$right];
   }
   private function getTotal($arr){
        $count=0;
        $ammount=0;
         $total=0;
         $count=count($arr);
        for($i=0;$i<$count;$i++){
         $position=$this->v_data[ $arr[$i] ]->position;
         $ammount=$this->v_data[ $arr[$i] ]->ammount;
         // dd($ammount);
           if($ammount!=0){
               $total+=floatval($ammount);
           }
           $ammount+=$this->v_data[ $arr[$i] ]->ammount;
           $g=array_keys($this->v_placement,$this->v_data[ $arr[$i] ]->id);
           for($j=0;$j<count($g);$j++){
              $keys[]=$g[$j];
           }
           if(!isset($keys)){
               $keys=[];
           }
        }
       return ['count'=>$count,'ammount'=>$ammount,'keys'=>$keys,'total'=>$total];
     }
}

?>