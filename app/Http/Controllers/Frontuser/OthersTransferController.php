<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OthersTransfer;
use App\Http\Traits\BalanceTrait;
use Validator;
use Redirect;
use DB;
use DataTables;

class OthersTransferController extends Controller
{
    use BalanceTrait;
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function Form()
    {
        $balance = $this->Balance();
        return view('frontend.others_transfer.transfer', compact('balance'));
    }
    public function Create(Request $r)
    {
        // return $r->all();
        //  dd($this->Balance());

        if ($this->Balance() < 200) {
            return redirect('/user/others_transfer')->with("error", "Minimum Balance Needed 200 Your Available Balance is " . $this->Balance());
        }
        if ($this->Balance() < floatval($r->ammount)) {
            return redirect('/user/others_transfer')->with("error", "Your Balance " . $this->Balance() . '. Its Less Than Your Requested Ammount' . $r->ammount);
        }
        if ($r->t_pin != auth()->user()->t_pin) {
            return redirect('/user/others_transfer')->with("error", "Opps! Wrong T-Pin Given.");
        }
        $validator = Validator::make($r->all(), [
            'ammount' => ['required', 'max:20', 'min:1', 'regex:/^([0-9]+)$/'],
            't_pin' => 'required|max:100|regex:/^([0-9]+)$/',
            'user' => 'required|max:200|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $withdraw = new OthersTransfer;
            $withdraw->ammount = $r->ammount;
            $withdraw->owner_id = auth()->user()->id;
            $withdraw->transfer_id = $r->user;
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
            SELECT others_transfers.id,concat('You Recieved By ',fusers.username) name,cast((others_transfers.ammount-((others_transfers.ammount*1)/100)) as decimal(20,2)) ammount from others_transfers
            inner join fusers on fusers.id=others_transfers.owner_id
             where others_transfers.transfer_id=:transfer_id
            union all
            SELECT others_transfers.id,concat('You Transfer To ',fusers.username) name,cast(others_transfers.ammount as decimal(20,2)) ammount  from others_transfers
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
        return view('frontend.others_transfer.transaction');
    }
}
