<?php

namespace App\Http\Controllers\Frontuser;

use App\Models\FounderBalanceTransfer;
use App\Http\Controllers\Controller;
use App\Http\Traits\FounderBalanceTrait;
use Illuminate\Http\Request;

class FounderBalanceTransferController extends Controller
{
    use FounderBalanceTrait;
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function create(){
        $currentbal = $this->currentFounderBalance();
        return view('frontend.founder-balance-transfer.transfer',compact('currentbal'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'amount' => 'required',
        ]); 
        $currentbal = $this->currentFounderBalance();
        if($request->amount >= 200){
            if($request->t_pin == auth()->user()->t_pin){
                if($request->amount = $currentbal){
                    $founderBalTransfer = new FounderBalanceTransfer();
                    $founderBalTransfer->fuser_id = auth()->user()->id;
                    $founderBalTransfer->amount = $request->amount;
                    $founderBalTransfer->status = 1;
                    $founderBalTransfer->save();
                    return redirect()->back()->with('status' , 'Share Balance Converted to Wallet Successfully');
                }else{
                    return redirect()->back()->with('error','Your Balance Is low');
                }
            }else{
                return redirect()->back()->with('error' , 'T-Pin Not Mached');
            }
        }else{
            return redirect()->back()->with('error' , 'Minimum Amount Need 200 Tk');
        }
    }
    public function list()
    {
        $data = FounderBalanceTransfer::where('fuser_id' , auth()->user()->id)->latest()->paginate();
        return view('frontend.founder-balance-transfer.transaction',compact('data'));
    }
}
