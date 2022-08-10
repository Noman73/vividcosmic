<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use Validator;
use App\Rules\ValidWithdrawBalance;
use App\Http\Traits\BalanceTrait;
use Redirect;
class MobileRechargeController extends Controller
{
    use BalanceTrait;
    public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function Form(){
    	return view('frontend.mobile_recharge.mobile_recharge');
    }
    public function Create(Request $r){
        // return $r->all();
        if ($this->Balance()<500) {
            return redirect('/user/withdraw')->with("error","Minimum Balance Needed 500");
        }
        if($this->Balance()<float($r->ammount)){
            return redirect('/user/withdraw')->with("error","Your Balance ".$this->Balance().'. Its Less Than Your Requested Ammount'.$r->ammount);
        }
        if ($r->t_pin!=auth()->user()->t_pin) {
            return redirect('/user/withdraw')->with("error","Opps! Wrong T-Pin Given.");
        }
    	$validator = Validator::make($r->all(), [
            'ammount' => ['required',new ValidWithdrawBalance],
            't_pin' => 'required|max:100|regex:/^([0-9]+)$/',
            'number' => 'required|max:100|regex:/^([0-9]+)$/',
            'payment_type' => 'required|max:200|regex:/^([0-9]+)$/',
            'payment_method' => 'required|max:50|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $withdraw = new Withdraw;
            $withdraw->ammount = $r->ammount;
            $withdraw->t_pin = $r->t_pin;
            $withdraw->number = $r->number;
            $withdraw->payment_type = $r->payment_type;
            $withdraw->payment_method = $r->payment_method;
            $withdraw->user_id = auth()->user()->id;
            $withdraw->save();
            return redirect('/user/withdraw')->with("status","Withdraw Request Submitted Success");
        }
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
}
