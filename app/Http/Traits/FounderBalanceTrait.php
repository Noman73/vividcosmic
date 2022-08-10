<?php
namespace App\Http\Traits;
use DB;
use App\Models\Fuser;
use App\Models\FounderBalance;
use App\Models\FounderBalanceTransfer;

trait FounderBalanceTrait{
	public function getFounderBalance(){
        $founder = FounderBalance::where('fuser_id',auth()->user()->id)->sum('profit_amount');
        if(isset($founder) && $founder > 0){
            $founder = FounderBalance::where('fuser_id',auth()->user()->id)->sum('profit_amount');
        }else{
            $founder = 0;
        }
        return $founder;
    }
    public function currentFounderBalance(){
        $total = FounderBalance::where('fuser_id',auth()->user()->id)->sum('profit_amount');
        $transfer = FounderBalanceTransfer::where('fuser_id' , auth()->user()->id)->sum('amount');
        $currentbal = ($total-$transfer);
        return $currentbal;
    }
    public function founderBalanceTransfer(){
        $transferedBalance = FounderBalanceTransfer::where('fuser_id' , auth()->user()->id)->sum('amount');
        return $transferedBalance;
    }
}