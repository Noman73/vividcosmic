<?php

namespace App\Http\Traits;
use App\Models\Fuser;
use App\Models\GCommision;
use DB;
trait TestTrait{
	public function GetGeneration(){
         // return 'ok';
        $data=GCommision::where('fuser_id',auth()->user()->id)->get();
        $arr=[];
        $total=0;
        foreach($data as $d){
            $arr['gen'.$d->gen] =['count'=>$d->gen,'ammount'=>$d->comission];
        }
        foreach($arr as $a){
         $total+=floatVal($a['ammount']);
        }
        $arr['total']=$total;
        // dd($arr);
        return $arr;
       
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
         //   dd($this->data[$arr[$i]]->ammount);
             
           $g=array_keys($this->x,$this->data[ $arr[$i] ]->id);
           $ammount+=((floatval($this->data[$arr[$i]]->ammount)*$parcent)/100);
           for($j=0;$j<count($g);$j++){
              $keys[]=$g[$j];
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