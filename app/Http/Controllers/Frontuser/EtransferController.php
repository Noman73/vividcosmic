<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etransfer;
use App\Http\Traits\BalanceTrait;
use Validator;
use DataTables;

class EtransferController extends Controller
{
    use BalanceTrait;
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function Form()
    {
        $balance = $this->Balance();
        return view('frontend.e_transfer.transfer', compact('balance'));
    }
    public function Create(Request $r)
    {
        // return $r->all();
        if ($this->Balance() < 200) {
            return redirect('/user/etransfer')->with("error", "Minimum Balance Needed 200");
        }
        if ($this->Balance() < floatval($r->ammount)) {
            return redirect('/user/etransfer')->with("error", "Your Balance " . $this->Balance() . ' Its Less Than Your Requested Ammount ' . $r->ammount);
        }
        if ($r->t_pin != auth()->user()->t_pin) {
            return redirect('/user/etransfer')->with("error", "Opps! Wrong T-Pin Given.");
        }
        $validator = Validator::make($r->all(), [
            'ammount' => ['required', 'max:20', 'min:1', 'regex:/^([0-9]+)$/'],
            't_pin' => 'required|max:100|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $transfer = new Etransfer;
            $transfer->ammount = $r->ammount;
            $transfer->fuser_id = auth()->user()->id;
            $transfer->save();
            return redirect('/user/etransfer')->with("status", "E-Balance Transfer Request Submitted Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function AllData()
    {
        if (request()->ajax()) {
            $get = Etransfer::where('fuser_id', auth()->user()->id)->get();
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><i class="fas fa-eye"></i></button>
                       <button class="btn btn-danger btn-sm rounded delete" data-id="' . $get->id . '"><i class="fas fa-trash-alt"></i></button>
                    </div>';
                    return $button;
                })
                ->addColumn('date', function ($get) {
                    return Date('d-m-Y', strtotime(strval($get->created_at)));
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('frontend.e_transfer.transaction');
    }
}
