<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use Validator;
use App\Rules\ValidWithdrawBalance;
use App\Http\Traits\BalanceTrait;
use Redirect;
use DataTables;
use DB;

class WidthdrawController extends Controller
{
    use BalanceTrait;
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function Form()
    {
        $balance = $this->Balance();
        return view('frontend.withdrawals.withdraw', compact('balance'));
    }
    public function Create(Request $r)
    {
        // return $r->all();
        if ($this->Balance() < 500) {
            return redirect('/user/withdraw')->with("error", "Minimum Balance Needed 500");
        }
        if ($this->Balance() < floatval($r->ammount)) {
            return redirect('/user/withdraw')->with("error", "Your Balance " . $this->Balance() . '. Its Less Than Your Requested Ammount' . $r->ammount);
        }
        if ($r->t_pin != auth()->user()->t_pin) {
            return redirect('/user/withdraw')->with("error", "Opps! Wrong T-Pin Given.");
        }
        if ($r->payment_type == 1) {
            $bank = 'required';
            $mobile_bank = 'nullable';
        } else {
            $bank = 'nullable';
            $mobile_bank = 'required';
        }
        $validator = Validator::make($r->all(), [
            'ammount' => ['required', new ValidWithdrawBalance],
            't_pin' => 'required|max:100|regex:/^([0-9]+)$/',
            'number' => 'required|max:100|regex:/^([0-9]+)$/',
            'payment_type' => 'required|max:200|regex:/^([0-9]+)$/',
            'bank' => $bank . '|max:50|regex:/^([0-9]+)$/',
            'mobile_bank' => $mobile_bank . '|max:50|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $withdraw = new Withdraw;
            $withdraw->ammount = $r->ammount;
            $withdraw->t_pin = $r->t_pin;
            $withdraw->number = $r->number;
            $withdraw->payment_type = $r->payment_type;
            if ($r->payment_type == 1) {
                $withdraw->payment_method = $r->bank;
            } else {
                $withdraw->payment_method = $r->mobile_bank;
            }
            $withdraw->status = 0;
            $withdraw->user_id = auth()->user()->id;
            $withdraw->save();
            return redirect('/user/withdraw')->with("status", "Withdraw Request Submitted Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function AllData()
    {
        if (request()->ajax()) {
            $get = DB::select("
                SELECT withdraws.id,fusers.name,withdraws.ammount,withdraws.status,withdraws.payment_type,withdraws.payment_method from withdraws
               inner join fusers on withdraws.user_id=fusers.id
               WHERE fusers.id=:id", ['id' => auth()->user()->id]);
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('transaction_id', function ($get) {
                    return '#' . str_pad($get->id, 8, '0', STR_PAD_LEFT);
                })
                ->addColumn('ammount', function ($get) {
                    return (floatval($get->ammount) * 90) / 100;
                })
                ->addColumn('charged', function ($get) {
                    return (floatval($get->ammount) * 10) / 100;
                })
                ->addColumn('payment_type', function ($get) {
                    if ($get->payment_type == 1) {
                        return $type = "Bank";
                    } elseif ($get->payment_type == 2) {
                        return $type = "Mobile Banking";
                    }
                })
                ->addColumn('payment_method', function ($get) {
                    if ($get->payment_type == 2) {
                        switch ($get->payment_method) {
                            case 1:
                                return "Bkash";
                                break;
                            case 2:
                                return "Rocket";
                                break;
                            case 3:
                                return "Nagad";
                                break;
                        }
                    }
                    if ($get->payment_type == 1) {
                        switch ($get->payment_method) {
                            case 1:
                                return "DBBL";
                                break;
                            case 2:
                                return "Sonali Bank";
                                break;
                        }
                    }
                })
                ->editColumn('status', function ($get) {
                    if ($get->status == 1) {
                        return "Approved";
                    } else {
                        return "Pending";
                    }
                })
                ->rawColumns(['transaction_id'])->make(true);
        }
        return view('frontend.withdrawals.transaction');
    }
}
