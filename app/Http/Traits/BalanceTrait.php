<?php

namespace App\Http\Traits;

use App\Models\Fuser;
use App\Models\Balance;
use App\Models\CurrentBalance;
use App\Models\Withdraw;
use DB;
use App\Http\Traits\TestTrait;
use App\Http\Traits\RefarralTrait;
use App\Http\Traits\BalanceTransferTrait;
use App\Http\Traits\EBalanceTransferTrait;
use App\Http\Traits\OthersTransferTrait;
use App\Http\Traits\CentralBonusTrait;

trait BalanceTrait
{
    use TestTrait, OthersTransferTrait, RefarralTrait, BalanceTransferTrait, EBalanceTransferTrait, CentralBonusTrait,ShareBalanceTrait , FounderBalanceTrait;
    public function Balance()
    {
        $myCentralBonus = $this->myCentralBonus(auth()->user()->id);
        $generation_add_blnc = $this->GetGeneration();
        $refarral = $this->GetRefarralIncome()['current'];
        $currblnc = CurrentBalance::where('fuser_id', auth()->user()->id)->sum('ammount');
        // $from_admin_ammount=Balance::where('fuser_id',auth()->user()->id)->sum('ammount');
        $blnc_transfer = $this->Transfer(auth()->user()->id);
        $blnc_deposit = $this->Deposit(auth()->user()->id);
        $etransfer = $this->Extransfer(auth()->user()->id);
        $othersTransferD = $this->OthersTransferD(auth()->user()->id);
        $othersTransferMe = $this->OthersTransferMe(auth()->user()->id);
        $widthdraw = Withdraw::where('user_id', auth()->user()->id)->sum('ammount');
        // dd($othersTransferMe);
        $shareBalance = $this->getShareBalance();
        $shareTransfered = $this->shareTransfered();
        $founderBalance =  $this->getFounderBalance();
        $balance = (($refarral[0]->total + $generation_add_blnc['total'] + $currblnc + $blnc_deposit + $othersTransferMe + $myCentralBonus + $shareTransfered) - ($widthdraw + $blnc_transfer + $etransfer + $othersTransferD));
        return $balance;
    }
}
