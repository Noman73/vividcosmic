<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Http\Traits\BalanceTrait;
use Validator;
use DB;
use DataTables;

class BalanceTransferController extends Controller
{
    use BalanceTrait;
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function Form()
    {
        dd($this->Balance());
        return view('frontend.transfer.transfer');
    }
    public function Create(Request $r)
    {
        // return $r->all();
        return redirect('/user/transfer')->with("error", "This Feature Currently Not Available");
        if ($this->Balance() < 200) {
            return redirect('/user/transfer')->with("error", "Minimum Balance Needed 200");
        }
        if ($this->Balance() < floatval($r->ammount)) {
            return redirect('/user/transfer')->with("error", "Your Balance " . $this->Balance() . '. Its Less Than Your Requested Ammount' . $r->ammount);
        }
        if ($r->t_pin != auth()->user()->t_pin) {
            return redirect('/user/transfer')->with("error", "Opps! Wrong T-Pin Given.");
        }
        $validator = Validator::make($r->all(), [
            'ammount' => ['required', 'max:20', 'min:1', 'regex:/^([0-9]+)$/'],
            't_pin' => 'required|max:100|regex:/^([0-9]+)$/',
            'user' => 'required|max:200|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $withdraw = new Transfer;
            $withdraw->ammount = $r->ammount;
            $withdraw->owner_id = auth()->user()->id;
            $withdraw->transfer_id = $r->user;
            $withdraw->user_id = auth()->user()->id;
            $withdraw->status = 0;
            $withdraw->save();
            return redirect('/user/transfer')->with("status", "Balance Transfer Request Submitted Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function AllData()
    {
        if (request()->ajax()) {
            $get = DB::select("
           SELECT others_transfers.id,concat('You Transfer To ',fusers.name) name,cast((others_transfers.ammount-((transfers.ammount*1)/100)) as decimal(20,2)) ammount from others_transfers
           inner join fusers on fusers.id=others_transfers.owner_id
            where others_transfers.transfer_id=:transfer_id
           union all
           SELECT others_transfers.id,concat('You Received By ',fusers.name) name,cast((others_transfers.ammount-((others_transfers.ammount*1)/100)) as decimal(20,2)) ammount  from others_transfers
           inner join fusers on fusers.id=others_transfers.transfer_id
           where others_transfers.owner_id=:owner_id
           ", ['transfer_id' => auth()->user()->id, 'owner_id' => auth()->user()->id]);
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><i class="fas fa-eye"></i></button>
                       <button class="btn btn-danger btn-sm rounded delete" data-id="' . $get->id . '"><i class="fas fa-trash-alt"></i></button>
                    </div>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('frontend.transfer.transaction_list');
    }
}
