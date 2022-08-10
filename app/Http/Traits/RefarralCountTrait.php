<?php
namespace App\Http\Traits;
use App\Models\Fuser;
use DB;
trait RefarralCountTrait{
	public function MyReferralCount(){
        $left=Fuser::where('reffer_id',auth()->user()->id)->Where('position',1)->count();
        $right=Fuser::where('reffer_id',auth()->user()->id)->Where('position',2)->count();
        return ['left'=>$left,'right'=>$right];
	}

}