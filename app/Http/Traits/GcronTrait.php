<?php

namespace App\Http\Traits;
use App\Models\Fuser;
use DB;
trait GcronTrait{

   public function GetGeneration($id){
   $start=microtime(true);
     // $arr[]=15;
   $this->data=DB::select('
   SELECT fusers.*,(invoice.vp*48) ammount from fusers 
      left join (
         select sum(vp) vp,fuser_id from invoices where invoices.created_at between  :from_date and :to_date group by fuser_id
      ) invoice on invoice.fuser_id=fusers.id 
   ' ,['from_date'=>date('Y-m-d 00:00:00'),'to_date'=>date('Y-m-d 23:59:59')]);
    //   dd($this->data);
       $user=(array)array_column($this->data,'id');
       $this->x=(array)array_column($this->data,'placement_id');
        $user=array_keys($user,1);
        $user_ammount=$this->data[$user[0]];
         $gen1_alpha = array_keys($this->x,$id);
         if(count($gen1_alpha)>0){
            $gen1=$this->GenerationKeys($gen1_alpha,1);
         }else{
            $gen1=$this->BlankArray();
         }
         if(count($gen1['keys'])>0 and isset($gen1['keys'])){
            $gen2=$this->GenerationKeys($gen1['keys'],2);
         }else{
            $gen2=$this->BlankArray();
         }
         if(count($gen2['keys'])>0 and isset($gen2['keys'])){
            $gen3=$this->GenerationKeys($gen2['keys'],3);
         }else{
            $gen3=$this->BlankArray();
         }
         if(count($gen3['keys'])>0 and isset($gen3['keys'])){
            $gen4=$this->GenerationKeys($gen3['keys'],4);
         }else{
            $gen4=$this->BlankArray();
         }
         if(count($gen4['keys'])>0 and isset($gen4['keys'])){
            $gen5=$this->GenerationKeys($gen4['keys'],5);
         }else{
            $gen5=$this->BlankArray();
         }
         if(count($gen5['keys'])>0 and isset($gen5['keys'])){
            $gen6=$this->GenerationKeys($gen5['keys'],6);
         }else{
            $gen6=$this->BlankArray();
         }
         if(count($gen6['keys'])>0 and isset($gen6['keys'])){
            $gen7=$this->GenerationKeys($gen6['keys'],7);
         }else{
            $gen7=$this->BlankArray();
         }
         if(count($gen7['keys'])>0 and isset($gen7['keys'])){
            $gen8=$this->GenerationKeys($gen7['keys'],8);
         }else{
            $gen8=$this->BlankArray();
         }
         if(count($gen8['keys'])>0 and isset($gen8['keys'])){
            $gen9=$this->GenerationKeys($gen8['keys'],9);
         }else{
            $gen9=$this->BlankArray();
         }
         if(count($gen9['keys'])>0 and isset($gen9['keys'])){
            $gen10=$this->GenerationKeys($gen9['keys'],10);
         }else{
            $gen10=$this->BlankArray();
         }
         if(count($gen10['keys'])>0 and isset($gen10['keys'])){
            $gen11=$this->GenerationKeys($gen10['keys'],11);
         }else{
            $gen11=$this->BlankArray();
         }
         if(count($gen11['keys'])>0 and isset($gen11['keys'])){
            $gen12=$this->GenerationKeys($gen11['keys'],12);
         }else{
            $gen12=$this->BlankArray();
         }
         if(count($gen12['keys'])>0 and isset($gen12['keys'])){
            $gen13=$this->GenerationKeys($gen12['keys'],13);
         }else{
            $gen13=$this->BlankArray();
         }
         if(count($gen13['keys'])>0 and isset($gen13['keys'])){
            $gen14=$this->GenerationKeys($gen13['keys'],14);
         }else{
            $gen14=$this->BlankArray();
         }
         if(count($gen14['keys'])>0 and isset($gen14['keys'])){
            $gen15=$this->GenerationKeys($gen14['keys'],15);
         }else{
            $gen15=$this->BlankArray();
         }
         if(count($gen15['keys'])>0 and isset($gen15['keys'])){
            $gen16=$this->GenerationKeys($gen15['keys'],16);
         }else{
            $gen16=$this->BlankArray();
         }
         if(count($gen16['keys'])>0 and isset($gen16['keys'])){
            $gen17=$this->GenerationKeys($gen16['keys'],17);
         }else{
            $gen17=$this->BlankArray();
         }


         // dd($gen1,$gen2,$gen3,$gen4,$gen5,$gen6,$gen7);
         $end=microtime(true);
         // echo $end-$start;
         // dd($gen6['count']);
         return [
            'gen1' =>['count'=>$gen1['count'],'ammount'=>$gen1['ammount']],
            'gen2' =>['count'=>$gen2['count'],'ammount'=>$gen2['ammount']],
            'gen3' =>['count'=>$gen3['count'],'ammount'=>$gen3['ammount']],
            'gen4' =>['count'=>$gen4['count'],'ammount'=>$gen4['ammount']],
            'gen5' =>['count'=>$gen5['count'],'ammount'=>$gen5['ammount']],
            'gen6' =>['count'=>$gen6['count'],'ammount'=>$gen6['ammount']],
            'gen7' =>['count'=>$gen7['count'],'ammount'=>$gen7['ammount']],
            'gen8' =>['count'=>$gen8['count'],'ammount'=>$gen8['ammount']],
            'gen9' =>['count'=>$gen9['count'],'ammount'=>$gen9['ammount']],
            'gen10'=>['count'=>$gen10['count'],'ammount'=>$gen10['ammount']],
            'gen11'=>['count'=>$gen11['count'],'ammount'=>$gen11['ammount']],
            'gen12'=>['count'=>$gen12['count'],'ammount'=>$gen12['ammount']],
            'gen13'=>['count'=>$gen13['count'],'ammount'=>$gen13['ammount']],
            'gen14'=>['count'=>$gen14['count'],'ammount'=>$gen14['ammount']],
            'gen15'=>['count'=>$gen15['count'],'ammount'=>$gen15['ammount']],
            'gen16'=>['count'=>$gen16['count'],'ammount'=>$gen16['ammount']],
            'gen17'=>['count'=>$gen17['count'],'ammount'=>$gen17['ammount']],
            'total'=>(floatval($gen1['ammount'])+floatval($gen2['ammount'])+floatval($gen3['ammount'])+floatval($gen4['ammount'])+floatval($gen5['ammount'])+floatval($gen6['ammount'])+floatval($gen7['ammount'])+floatval($gen8['ammount'])+floatval($gen9['ammount'])+floatval($gen10['ammount'])+floatval($gen11['ammount'])+floatval($gen12['ammount'])+floatval($gen13['ammount'])+floatval($gen14['ammount'])+floatval($gen15['ammount'])+floatval($gen16['ammount'])+floatval($gen17['ammount'])),
         ];
    }
    public function GenerationKeys($arr,$gen){
        if($gen==1){
           $parcent=6;
        }elseif($gen==2){
           $parcent=4;
        }elseif($gen==3){
           $parcent=2;
        }else{
           $parcent=1;
        }
        $count=count($arr);
        $ammount=0;
        for($i=0;$i<count($arr);$i++){
        //    dd($this->data[$arr[$i]]->ammount);
         //   $today_start=strtotime(date('d-m-Y 00:00:00'));
         //   $today_end=strtotime(date('d-m-Y 23:59:59'));
         //   $date=strtotime(date($this->data[ $arr[$i] ]->created_at));
         //   if($today_start<=$date && $today_end>=$date){
                $g=array_keys($this->x,$this->data[ $arr[$i] ]->id);
                $ammount+=((floatval($this->data[$arr[$i]]->ammount)*$parcent)/100);
                for($j=0;$j<count($g);$j++){
                    $keys[]=$g[$j];
               //  }
           } 
        }
        if(!isset($keys)){
           $keys=[];
        }
       return ['count'=>$count,'ammount'=>$ammount,'keys'=>$keys];
     }
     public function BlankArray(){
        return ['count'=>0,'ammount'=>0,'keys'=>[]];
     }
}

?>