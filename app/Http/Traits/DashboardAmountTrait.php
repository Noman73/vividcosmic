<?php

namespace App\Http\Traits;

use App\Models\Balance;
use App\Models\Cbonus;
use App\Models\CurrentBalance;
use App\Models\FounderBalance;
use App\Models\ShareBalance;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait DashboardAmountTrait
{
    use TestTrait, RefarralTrait, DailyWorkTrait, WalletBalanceTrait, BalanceTransferTrait, InvoiceTrait, TreeCountTrait, RefarralCountTrait, CentralBonusTrait, ShareBalanceTrait, FounderBalanceTrait;
    public function allAmount()
    {
        $myCentralBonus = $this->myCentralBonus(auth()->user()->id);
        $monthly_central_bonus = Cbonus::where('fuser_id', Auth::user()->id)->latest()->first();
        $generation = $this->GetGeneration();
        // dd($generation);
        $d_wallet_from_admin = Balance::where('fuser_id', auth()->user()->id)->sum('ammount');
        $shareBalance = $this->getShareBalance();
        $shareTransfered = $this->shareTransfered();
        $currentShareblc = $this->getCurrentShareBalance();
        $founderBalance = $this->getFounderBalance();
        $founderCurrentBalance = $this->currentFounderBalance();
        $founderBalanceTransfer = $this->founderBalanceTransfer();
        $etransfer = $this->Extransfer(auth()->user()->id);
        $widthdraw = Withdraw::where('user_id', auth()->user()->id)->sum('ammount');
        $widthdraw = number_format((float)$widthdraw, 2, '.', '');
        $currblnc = CurrentBalance::where('fuser_id', auth()->user()->id)->sum('ammount');
        $refarral_commition1 = $this->GetRefarralIncome()['added'];
        $refarral_commition0 = $this->GetRefarralIncome()['current'];
        $ebalance = ($refarral_commition0[0]->total + $generation['total'] + $currblnc + $myCentralBonus + $this->OthersTransferMe(auth()->user()->id) + $shareTransfered + $founderBalanceTransfer) - ($etransfer + $this->OthersTransferD(auth()->user()->id));
        $balance = (($refarral_commition0[0]->total + $generation['total'] + $currblnc + $this->OthersTransferMe(auth()->user()->id) + $myCentralBonus + $shareTransfered + $founderBalanceTransfer) - ($widthdraw + $etransfer + $this->OthersTransferD(auth()->user()->id)));
        // dd(($refarral_commition0[0]->total+$generation['total']+$currblnc+$this->OthersTransferMe(auth()->user()->id)+$myCentralBonus)-($widthdraw+$etransfer+$this->OthersTransferD(auth()->user()->id)));
        $balance = number_format((float)$balance, 2, '.', ''); //stayed wallet amount
        $ebalance = number_format((float)$ebalance, 2, '.', ''); // e-wallet amount
        $wallet_blnc = $this->WalletBalance();
        $d_total_in = $this->OthersTransferMe(auth()->user()->id) + (($etransfer * 99) / 100) + $d_wallet_from_admin;
        $d_total_in = number_format((float)$d_total_in, 2, '.', '');
        $d_total_out = $this->InvoiceBalance(auth()->user()->id);
        $d_total_out = number_format((float)$d_total_out, 2, '.', '');
        $d_transfer_other = $this->OthersTransferD(auth()->user()->id);
        $d_transfer_me = $this->OthersTransferMe(auth()->user()->id);
        $active_id = $this->treeCount();
        $refCount = $this->MyReferralCount();
        // Monthly Share Amount 
        $monthlyShare = ShareBalance::select('id')
        ->whereYear('created_at' , Carbon::now()->year)
        ->whereMonth('created_at',Carbon::now()->month)
        ->sum('profit_amount');

        // Monthly Founder Balance 
        $monthlyFoundersBalance = FounderBalance::select('id')
        ->whereYear('created_at' , Carbon::now()->year)
        ->whereMonth('created_at',Carbon::now()->month)
        ->sum('profit_amount');
        return [
            'balance' => $balance,
            'refarral_commition0' => $refarral_commition0,
            'widthdraw' => $widthdraw,
            'generation' => $generation,
            'wallet_blnc' => $wallet_blnc,
            'ebalance' => $ebalance,
            'd_total_in' => $d_total_in,
            'd_total_out' => $d_total_out,
            'wallet_blnc' => $wallet_blnc,
            'd_transfer_other' => $d_transfer_other,
            'd_transfer_me' => $d_transfer_me,
            'active_id' => $active_id,
            'refCount' => $refCount,
            'myCentralBonus' => $myCentralBonus,
            'monthly_central_bonus' => $monthly_central_bonus,
            'shareBalance'  => $shareBalance,
            'founderBalance' => $founderBalance,
            'monthlyShare' => $monthlyShare,
            'monthlyFoundersBalance' => $monthlyFoundersBalance,
            'currentShareblc' => $currentShareblc,
            'founderCurrentBalance' => $founderCurrentBalance,
        ];
    }
    public static function staticAllAmount()
    {
        return (new self)->allAmount();
    }
}
