<?php
namespace App\Http\Traits;
use App\Models\Balance;
use App\Models\Etransfer;
use DB;
use App\Http\Traits\EBalanceTransferTrait;
use App\Http\Traits\OthersTransferTrait;
trait WalletBalanceTrait{
    use EBalanceTransferTrait , OthersTransferTrait , ShareBalanceTrait;
	public function WalletBalance(){
        $packages_money=DB::select("
        	SELECT ifnull(sum(qantity*price),0) total from invoices where owner_id=:id
        	",['id'=>auth()->user()->id]);
        // $from_admin_ammount=Balance::where('fuser_id',auth()->user()->id)->sum('ammount');
        $othersTransferMe=$this->OthersTransferMe(auth()->user()->id);
        $wallet=Balance::where('fuser_id',auth()->user()->id)->sum('ammount');
        $etransfer=($this->Extransfer(auth()->user()->id)*99)/100;
        $wallet=floatval($wallet);
        $packages_money=floatval($packages_money[0]->total);
        $shareBalance = $this->getShareBalance();
        $balance=($wallet+$etransfer+$othersTransferMe)-($packages_money);
        $balance=number_format((float)$balance, 2, '.', '');
        return $balance;
	}
}