<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use App\CurrentBalance;
use Auth;
use DataTables;
use DB;
use URL;
class CurrentBalanceController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function Form(){
   		return view('pages.current_balance.current_balance');
    }
    public function Create(Request $r) {
        $r->all();
    $validator = Validator::make($r->all(), [
            'ammount' => 'required|max:100|regex:/^([0-9.]+)$/',
            'user' => 'required|max:20|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $blnce = new CurrentBalance;
            $blnce->fuser_id = $r->user;
            $blnce->ammount = $r->ammount;
            $blnce->status = $r->status;
            $blnce->user_id = Auth::user()->id;
            $blnce->save();
            return redirect('/admin/balance')->with("status","Balance Added Success");
        }
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }	
    }
    public function AllData(){
        if (request()->ajax()) {
            $get = DB::select("
                SELECT balances.id,balances.ammount,fusers.username from balances
                inner join fusers on balances.fuser_id=fusers.id
                ");
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><a href="'.URL::to('admin/balance_edit/'.$get->id).'"><i class="fas fa-eye"></i></button>
                       <button class="btn btn-danger btn-sm rounded delete" data-id="' . $get->id . '"><i class="fas fa-trash-alt"></i></button>
                    </div>';
                    return $button;
                })
                ->addColumn('id',function($get){
                    $id='#1'.str_pad($get->id,9,'0',STR_PAD_LEFT);
                    return $id;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.balance.transaction_list');
    }
    public function EditForm($id){
        // return $id;
        $data=DB::select('SELECT balances.id,balances.ammount,fusers.name from balances 
            inner join fusers on fusers.id=balances.fuser_id
            where balances.id=:id',['id'=>$id]);
        $data=$data[0];
        return view('pages.balance.balance_edit',compact('data'));
    } 
}
