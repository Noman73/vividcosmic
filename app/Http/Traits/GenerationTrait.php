<?php

namespace App\Http\Traits;
use App\Models\Fuser;
use DB;
trait GenerationTrait{
	public function GetGeneration(){
        $start=microtime(true);
    	//get reffarral
    	$gen=Fuser::select('id')->where('id',auth()->user()->id)->get();
    	// get the first generations id
    	if (isset($gen) and count($gen)>0) {
	    	foreach($gen as $gen0){

	    		$first_gen[]=DB::table('fusers')
                            ->join('packages','packages.id','=','fusers.package_id')
                            ->select('fusers.id','packages.ammount')->where('placement_id',$gen0->id)->get();
	    	}
    		$gen1=$this->getRealAmmount($first_gen,1);
            // print_r($gen1);
	    }
        // get end generation 
        if (isset($gen1) and count($gen1)>0) {
            for ($i=0; $i <count($gen1) ; $i++) {
                $second_gen[]=DB::table('fusers')
                            ->join('packages','packages.id','=','fusers.package_id')
                            ->select('fusers.id','packages.ammount')->where('placement_id',$gen1[$i])->get();
            }
            $gen2=$this->getRealAmmount($second_gen,2);
        }
    	// get third generation 
        if (isset($gen2) and count($gen2)>0) {
            for ($i=0; $i <count($gen2) ; $i++) {
                $third_gen[]=DB::table('fusers')
                            ->join('packages','packages.id','=','fusers.package_id')
                            ->select('fusers.id','packages.ammount')->where('placement_id',$gen2[$i])->get();
            }
            $gen3=$this->getRealAmmount($third_gen,3);
            // print_r($gen3);
        }
        //get fourth generation
    	if (isset($gen3) and count($gen3)>0) {
            for ($i=0; $i <count($gen3) ; $i++) {
        		  $fourth_gen[]=DB::table('fusers')
                               ->join('packages','packages.id','=','fusers.package_id')
                               ->select('fusers.id','packages.ammount')->where('placement_id',$gen3[$i])->get();
        	   }
        	   $gen4=$this->getRealAmmount($fourth_gen,4);
        }
        // get Fifth generation
        if (isset($gen4) and count($gen4)>0) {
            for ($i=0; $i <count($gen4) ; $i++) {
                $fifth_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen4[$i])->get();
            }
            $gen5=$this->getRealAmmount($fifth_gen,5);
        }
        // get six generation
    	if (isset($gen5) and count($gen5)>0) {
            for ($i=0; $i <count($gen5) ; $i++) {
        		$sixth_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen5[$i])->get();
        	}
            $gen6=$this->getRealAmmount($sixth_gen,6);
        }
        // get seven generation
        if (isset($gen6) and count($gen6)>0) {
            for ($i=0; $i <count($gen6) ; $i++) {
        		$seventh_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen6[$i])->get();
        	}
    	   $gen7=$this->getRealAmmount($seventh_gen,7);
        }
        if (isset($gen7) and count($gen7)>0) {
            for ($i=0; $i <count($gen7) ; $i++) {
                $eight_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen7[$i])->get();
            }
           $gen8=$this->getRealAmmount($eight_gen,8);
        }
        if (isset($gen8) and count($gen8)>0) {
            for ($i=0; $i <count($gen8) ; $i++) {
                $nine_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen8[$i])->get();
            }
           $gen9=$this->getRealAmmount($nine_gen,9);
        }
        if (isset($gen9) and count($gen9)>0) {
            for ($i=0; $i <count($gen9) ; $i++) {
                $ten_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen9[$i])->get();
            }
           $gen10=$this->getRealAmmount($ten_gen,10);
        }
        if (isset($gen10) and count($gen10)>0) {
            for ($i=0; $i <count($gen10) ; $i++) {
                $eleven_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen10[$i])->get();
            }
           $gen11=$this->getRealAmmount($eleven_gen,11);
        }
        if (isset($gen11) and count($gen11)>0) {
            for ($i=0; $i <count($gen11) ; $i++) {
                $twelve_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen11[$i])->get();
            }
           $gen12=$this->getRealAmmount($twelve_gen,12);
        }
        if (isset($gen12) and count($gen12)>0) {
            for ($i=0; $i <count($gen12) ; $i++) {
                $thirteen_gen[]=DB::table('fusers')
                           ->join('packages','packages.id','=','fusers.package_id')
                           ->select('fusers.id','packages.ammount')->where('placement_id',$gen12[$i])->get();
            }
           $gen13=$this->getRealAmmount($thirteen_gen,13);
        }
        if(isset($gen1)){
            $gen1=['member'=>count($gen1),'ammount'=>$this->CountAmmount($gen1,1)];
        }else{
            $gen1=['member'=>0,'ammount'=>0];
        }
        if(isset($gen2)){
            $gen2=['member'=>count($gen2),'ammount'=>$this->CountAmmount($gen2,2)];
        }else{
            $gen2=['member'=>0,'ammount'=>0];
        }
        if(isset($gen3)){
            $gen3=['member'=>count($gen3),'ammount'=>$this->CountAmmount($gen3,3)];
        }else{
            $gen3=['member'=>0,'ammount'=>0];
        }
        if(isset($gen4)){
            $gen4=['member'=>count($gen4),'ammount'=>$this->CountAmmount($gen4,4)];
        }else{
            $gen4=['member'=>0,'ammount'=>0];
        }
        if(isset($gen5)){
            $gen5=['member'=>count($gen5),'ammount'=>$this->CountAmmount($gen5,5)];
        }else{
            $gen5=['member'=>0,'ammount'=>0];
        }
        if(isset($gen6)){
            $gen6=['member'=>count($gen6),'ammount'=>$this->CountAmmount($gen6,6)];
        }else{
            $gen6=['member'=>0,'ammount'=>0];
        }
        if(isset($gen7)){
            $gen7=['member'=>count($gen7),'ammount'=>$this->CountAmmount($gen7,7)];
        }else{
            $gen7=['member'=>0,'ammount'=>0];
        }
        if(isset($gen8)){
            $gen8=['member'=>count($gen8),'ammount'=>$this->CountAmmount($gen8,8)];
        }else{
            $gen8=['member'=>0,'ammount'=>0];
        }
        if(isset($gen9)){
            $gen9=['member'=>count($gen9),'ammount'=>$this->CountAmmount($gen9,9)];
        }else{
            $gen9=['member'=>0,'ammount'=>0];
        }
        if(isset($gen10)){
            $gen10=['member'=>count($gen10),'ammount'=>$this->CountAmmount($gen10,10)];
        }else{
            $gen10=['member'=>0,'ammount'=>0];
        }
        if(isset($gen11)){
            $gen11=['member'=>count($gen11),'ammount'=>$this->CountAmmount($gen11,11)];
        }else{
            $gen11=['member'=>0,'ammount'=>0];
        }
        if(isset($gen12)){
            $gen12=['member'=>count($gen12),'ammount'=>$this->CountAmmount($gen12,12)];
        }else{
            $gen12=['member'=>0,'ammount'=>0];
        }
        if(isset($gen13)){
            $gen13=['member'=>count($gen13),'ammount'=>$this->CountAmmount($gen13,13)];
        }else{
            $gen13=['member'=>0,'ammount'=>0];
        }
        // $end=microtime(true);
        // dd($end-$start);
        return [
                'gen1' =>['member'=>$gen1['member'],'ammount'=>$gen1['ammount']],
                'gen2' =>['member'=>$gen2['member'],'ammount'=>$gen2['ammount']],
                'gen3' =>['member'=>$gen3['member'],'ammount'=>$gen3['ammount']],
                'gen4' =>['member'=>$gen4['member'],'ammount'=>$gen4['ammount']],
                'gen5' =>['member'=>$gen5['member'],'ammount'=>$gen5['ammount']],
                'gen6' =>['member'=>$gen6['member'],'ammount'=>$gen6['ammount']],
                'gen7' =>['member'=>$gen7['member'],'ammount'=>$gen7['ammount']],
                'gen8' =>['member'=>$gen8['member'],'ammount'=>$gen8['ammount']],
                'gen9' =>['member'=>$gen9['member'],'ammount'=>$gen9['ammount']],
                'gen10'=>['member'=>$gen10['member'],'ammount'=>$gen10['ammount']],
                'gen11'=>['member'=>$gen11['member'],'ammount'=>$gen11['ammount']],
                'gen12'=>['member'=>$gen12['member'],'ammount'=>$gen12['ammount']],
                'gen13'=>['member'=>$gen13['member'],'ammount'=>$gen13['ammount']],
                'total'=>(floatval($gen1['ammount'])+floatval($gen2['ammount'])+floatval($gen3['ammount'])+floatval($gen4['ammount'])+floatval($gen5['ammount'])+floatval($gen6['ammount'])+floatval($gen7['ammount'])+floatval($gen8['ammount'])+floatval($gen9['ammount'])+floatval($gen10['ammount'])+floatval($gen11['ammount'])+floatval($gen12['ammount'])+floatval($gen13['ammount'])),
        ];

    }
    public function GetId($array){
    	$data=[];
    	for ($i=0; $i <count($array) ; $i++) { 
    		for ($j=0; $j <count($array[$i]) ; $j++) { 
    			array_push($data,$array[$i][$j]->id);
    		}
        }
        return $data;
    }
    public function GetIdCheck($array){
        $data=[];
        for ($i=0; $i <count($array) ; $i++) { 
            for ($j=0; $j <count($array[$i]) ; $j++) { 
                array_push($data,['id'=>$array[$i][$j]->id,'cond'=>$array[$i][$j]->cond]);
            }
        }
        return $data;
    }
    public function GetRealAmmount($array,$gen){
        $data=[];
        if ($gen==1) {
            $percent=6;
        }elseif ($gen==2) {
            $percent=4;
        }elseif ($gen==3) {
            $percent=2;
        }else{
            $percent=1;
        }
        for ($i=0; $i <count($array) ; $i++) { 
            for ($j=0; $j <count($array[$i]) ; $j++) { 
                array_push($data,['id'=>$array[$i][$j]->id,'ammount'=>(floatval($array[$i][$j]->ammount-(($array[$i][$j]->ammount*40)/100))*$percent)/100]);
            }
        }
        return $data;
    }
    public function CountAmmount($data){
        $value=0;
        for ($i=0; $i <count($data) ; $i++) { 
            $value+=floatval($data[$i]['ammount']);
        }
        return $value;
    }
    public function getAddBalance(){
        //get reffarrale
        $gen=Fuser::select('id')->where('reffer_id',auth()->user()->id)->get();
        // get the first generations id
        $date=Fuser::select('user_created_at','gen_update_at')->where('id',auth()->user()->id)->first();
        if ($date->gen_update_at==null) {
            return $data['total']=0.00;
        }
        if (isset($gen) and count($gen)>0) {
            foreach($gen as $gen0){
                $first_gen[]=Fuser::selectRaw('id,if(user_created_at < ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen0->id)->get();
            }
            $gen1=$this->GetIdCheck($first_gen);
        }
        if (isset($gen1) and count($gen1)>0) {
            for ($i=0; $i <count($gen1) ; $i++) {
                $second_gen[]=Fuser::selectRaw('id,if(user_created_at < ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen1[$i])->get();
            }
            $gen2=$this->GetIdCheck($second_gen);
        }
        
        if (isset($gen2) and count($gen2)>0) {
            for ($i=0; $i <count($gen2) ; $i++) {
                $third_gen[]=Fuser::selectRaw('id,if(user_created_at < ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen2[$i])->get();
            }
            $gen3=$this->GetIdCheck($third_gen);
            // print_r($gen3);
        }
        if (isset($gen3) and count($gen3)>0) {
            for ($i=0; $i <count($gen3) ; $i++) {
                  $fourth_gen[]=Fuser::selectRaw('id,if(user_created_at < ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen3[$i])->get();
               }
               $gen4=$this->GetIdCheck($fourth_gen);
        }
        if (isset($gen4) and count($gen4)>0) {
            for ($i=0; $i <count($gen4) ; $i++) {
                $fifth_gen[]=Fuser::selectRaw('id,if(user_created_at < ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen4[$i])->get();
            }
            $gen5=$this->GetIdCheck($fifth_gen);
        }
        if (isset($gen5) and count($gen5)>0) {
            for ($i=0; $i <count($gen5) ; $i++) {
                $sixth_gen[]=Fuser::selectRaw('id,if(user_created_at < ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen5[$i])->get();
            }
            $gen6=$this->GetIdCheck($sixth_gen);
        }
        if (isset($gen6) and count($gen6)>0) {
            for ($i=0; $i <count($gen6) ; $i++) {
                $seventh_gen[]=Fuser::selectRaw('id,if(user_created_at < ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen6[$i])->get();
            }
           $gen7=$this->GetId($seventh_gen);
        }
        if(isset($gen1)){
            $gen1=$this->Count($gen1);
        }else{
            $gen1=0;
        }
        if(isset($gen2)){
            $gen2=$this->Count($gen2);
        }else{
            $gen2=0;
        }
        if(isset($gen3)){
            $gen3=$this->Count($gen3);
        }else{
            $gen3=0;
        }
        if(isset($gen4)){
            $gen4=$this->Count($gen4);
        }else{
            $gen4=0;
        }
        if(isset($gen5)){
            $gen5=$this->Count($gen5);
        }else{
            $gen5=0;
        }
        if(isset($gen6)){
            $gen6=$this->Count($gen6);
        }else{
            $gen6=0;
        }
        if(isset($gen7)){
            $gen7=$this->Count($gen7);
        }else{
            $gen7=0;
        }
        $user_gen=DB::select("
                SELECT generations.first,generations.second,generations.third,generations.fourth,generations.fifth,generations.sixth,generations.seventh from fusers
                inner join generations on generations.id=fusers.gen_id
                where fusers.id=:id
            ",['id'=>auth()->user()->id]);
        return [
                'gen1'=>$gen1.'X'.$user_gen[0]->first.'='.$gen1*floatval($user_gen[0]->first),
                'gen2'=>$gen2.'X'.$user_gen[0]->second.'='.$gen2*floatval($user_gen[0]->second),
                'gen3'=>$gen3.'X'.$user_gen[0]->third.'='.$gen3*floatval($user_gen[0]->third),
                'gen4'=>$gen4.'X'.$user_gen[0]->fourth.'='.$gen4*floatval($user_gen[0]->fourth),
                'gen5'=>$gen5.'X'.$user_gen[0]->fifth.'='.$gen5*floatval($user_gen[0]->fifth),
                'gen6'=>$gen6.'X'.$user_gen[0]->sixth.'='.$gen6*floatval($user_gen[0]->sixth),
                'gen7'=>$gen7.'X'.$user_gen[0]->seventh.'='.$gen7*floatval($user_gen[0]->seventh),
                'total'=>floatval($gen1*$user_gen[0]->first)+floatval($gen2*$user_gen[0]->second)+floatval($gen3*$user_gen[0]->third)+floatval($gen4*$user_gen[0]->fourth)+floatval($gen5*$user_gen[0]->fifth)+floatval($gen6*$user_gen[0]->sixth)+floatval($gen7*$user_gen[0]->seventh),
        ];
    }
    public function getCurrentBalance(){
        //get reffarrale
        $gen=Fuser::select('id')->where('reffer_id',auth()->user()->id)->get();
        // get the first generations id
        $date=Fuser::select('user_created_at','gen_update_at')->where('id',auth()->user()->id)->first();
        if ($date->gen_update_at==null) {
            return $this->GetGeneration();
        }
        if (isset($gen) and count($gen)>0) {
            foreach($gen as $gen0){
                $first_gen[]=Fuser::selectRaw('id,if(user_created_at > ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen0->id)->get();
            }
            $gen1=$this->GetIdCheck($first_gen);
        }
        if (isset($gen1) and count($gen1)>0) {
            for ($i=0; $i <count($gen1) ; $i++) {
                $second_gen[]=Fuser::selectRaw('id,if(user_created_at > ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen1[$i])->get();
            }
            $gen2=$this->GetIdCheck($second_gen);
        }
        
        if (isset($gen2) and count($gen2)>0) {
            for ($i=0; $i <count($gen2) ; $i++) {
                $third_gen[]=Fuser::selectRaw('id,if(user_created_at > ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen2[$i])->get();
            }
            $gen3=$this->GetIdCheck($third_gen);
            // print_r($gen3);
        }
        if (isset($gen3) and count($gen3)>0) {
            for ($i=0; $i <count($gen3) ; $i++) {
                  $fourth_gen[]=Fuser::selectRaw('id,if(user_created_at > ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen3[$i])->get();
               }
               $gen4=$this->GetIdCheck($fourth_gen);
        }
        if (isset($gen4) and count($gen4)>0) {
            for ($i=0; $i <count($gen4) ; $i++) {
                $fifth_gen[]=Fuser::selectRaw('id,if(user_created_at > ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen4[$i])->get();
            }
            $gen5=$this->GetIdCheck($fifth_gen);
        }
        if (isset($gen5) and count($gen5)>0) {
            for ($i=0; $i <count($gen5) ; $i++) {
                $sixth_gen[]=Fuser::selectRaw('id,if(user_created_at > ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen5[$i])->get();
            }
            $gen6=$this->GetIdCheck($sixth_gen);
        }
        if (isset($gen6) and count($gen6)>0) {
            for ($i=0; $i <count($gen6) ; $i++) {
                $seventh_gen[]=Fuser::selectRaw('id,if(user_created_at > ?,1,0) cond',[$date->gen_update_at])->where('reffer_id',$gen6[$i])->get();
            }
           $gen7=$this->GetId($seventh_gen);
        }
        if(isset($gen1)){
            $gen1=$this->Count($gen1);
        }else{
            $gen1=0;
        }
        if(isset($gen2)){
            $gen2=$this->Count($gen2);
        }else{
            $gen2=0;
        }
        if(isset($gen3)){
            $gen3=$this->Count($gen3);
        }else{
            $gen3=0;
        }
        if(isset($gen4)){
            $gen4=$this->Count($gen4);
        }else{
            $gen4=0;
        }
        if(isset($gen5)){
            $gen5=$this->Count($gen5);
        }else{
            $gen5=0;
        }
        if(isset($gen6)){
            $gen6=$this->Count($gen6);
        }else{
            $gen6=0;
        }
        if(isset($gen7)){
            $gen7=$this->Count($gen7);
        }else{
            $gen7=0;
        }
        $user_gen=DB::select("
                SELECT generations.first,generations.second,generations.third,generations.fourth,generations.fifth,generations.sixth,generations.seventh from fusers
                inner join generations on generations.id=fusers.gen_id
                where fusers.id=:id
            ",['id'=>auth()->user()->id]);
        return [
                'gen1'=>$gen1.'X'.$user_gen[0]->first.'='.$gen1*floatval($user_gen[0]->first),
                'gen2'=>$gen2.'X'.$user_gen[0]->second.'='.$gen2*floatval($user_gen[0]->second),
                'gen3'=>$gen3.'X'.$user_gen[0]->third.'='.$gen3*floatval($user_gen[0]->third),
                'gen4'=>$gen4.'X'.$user_gen[0]->fourth.'='.$gen4*floatval($user_gen[0]->fourth),
                'gen5'=>$gen5.'X'.$user_gen[0]->fifth.'='.$gen5*floatval($user_gen[0]->fifth),
                'gen6'=>$gen6.'X'.$user_gen[0]->sixth.'='.$gen6*floatval($user_gen[0]->sixth),
                'gen7'=>$gen7.'X'.$user_gen[0]->seventh.'='.$gen7*floatval($user_gen[0]->seventh),
                'total'=>floatval($gen1*$user_gen[0]->first)+floatval($gen2*$user_gen[0]->second)+floatval($gen3*$user_gen[0]->third)+floatval($gen4*$user_gen[0]->fourth)+floatval($gen5*$user_gen[0]->fifth)+floatval($gen6*$user_gen[0]->sixth)+floatval($gen7*$user_gen[0]->seventh),
        ];
    }
    public function Count($data){
        $value=0;
        for ($i=0; $i <count($data) ; $i++) { 
            if($data[$i]['cond']==1){
                $value=$value+1;
            }
        }
        return $value;
    }
}

?>