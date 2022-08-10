<?php
namespace App\Http\Traits;
use DB;
use App\Models\Fuser;
use App\Models\ShareBalance;
use App\Models\ShareTransfer;

trait ShareBalanceTrait{
	public function getShareBalance(){
        $share = ShareBalance::where('fuser_id',auth()->user()->id)->sum('profit_amount');
        if(isset($share) && $share > 0){
            $share = ShareBalance::where('fuser_id',auth()->user()->id)->sum('profit_amount');
        }else{
            $share = 0;
        }
        return $share;
    }
    public function getCurrentShareBalance(){
        $total = ShareBalance::where('fuser_id',auth()->user()->id)->sum('profit_amount');
        $convert = ShareTransfer::where('fuser_id' , auth()->user()->id)->sum('amount');
        $currentShareBalance =  ($total - $convert);
        return $currentShareBalance;
    }
    public function shareTransfered(){
        $transferedBalance = ShareTransfer::where('fuser_id' , auth()->user()->id)->sum('amount');
        return $transferedBalance;
    }
}