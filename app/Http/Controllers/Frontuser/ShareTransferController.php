<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use App\Http\Traits\ShareBalanceTrait;
use App\ShareTransfer;
use Illuminate\Http\Request;

class ShareTransferController extends Controller
{
    use ShareBalanceTrait;
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }

    public function create(){
        $sharebalance = $this->getCurrentShareBalance();
        return view('frontend.sharetransfer.transfer',compact('sharebalance'));
    }

    public function store(Request $request){
       $validated = $request->validate([
            'amount' => 'required',
        ]); 
        $sharebalance = $this->getCurrentShareBalance();
        if($request->t_pin == auth()->user()->t_pin){
            if($request->amount < $sharebalance){
                if($request->amount < 200){
                    return redirect()->back()->with('error' , 'Minimum Transfer 200 tk');
                }else{
                    $sharetransfer = new ShareTransfer();
                    $sharetransfer->fuser_id = auth()->user()->id;
                    $sharetransfer->amount = $request->amount;
                    $sharetransfer->status = 1;
                    $sharetransfer->save();
                    return redirect()->back()->with('status' , 'Share Balance Converted to Wallet Successfully');
                }
            }else{
                return redirect()->back()->with('error' , 'Your Share Balance Low');
            }
        }else{
            return redirect()->back()->with('error' , 'T-Pin Not Matched');
        }
    }
    public function list(){
        $data =  ShareTransfer::where('fuser_id' , auth()->user()->id)->latest()->paginate();
        return view('frontend.sharetransfer.transaction',compact('data'));
    }
}
