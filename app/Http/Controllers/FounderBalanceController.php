<?php

namespace App\Http\Controllers;

use App\FounderBalance;
use App\Fuser;
use Illuminate\Http\Request;

class FounderBalanceController extends Controller
{
    
    public function index()
    {
        $founders = FounderBalance::latest()->paginate(10);
        return view('pages.founder.index',compact('founders'));

    }

    
    public function create()
    {
        $fusers = Fuser::all();
        return view('pages.founder.create',compact('fusers'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fuser_id'      => 'required|unique:founder_balances,fuser_id',
            // 'invest_amount' => 'required',
            // 'share'         => 'required',
            // 'profit_amount' => 'required',
        ]);

        $founder = new FounderBalance();
        $founder->fuser_id = $request->fuser_id;
        $founder->invest_amount = $request->invest_amount;
        $founder->share = $request->share;
        $founder->profit_amount = 0;
        $founder->status = 1;
        $founder->save();
        return redirect()->route('founders.list')->with('success' , 'Founder Active Successfully');
    }

    public function send(){
        $fusers = FounderBalance::distinct()->where('status',1)->get(['fuser_id']);
        return view('pages.balance.founder_balance',compact('fusers'));
    }
    
    public function monthlyadd(Request $request){
        $validated = $request->validate([
            'fuser_id'      => 'required',
            'profit_amount' => 'required',
        ]);

        $share_balance = new FounderBalance();
        $share_balance->fuser_id = $request->fuser_id;
        // $share_balance->invest_amount = $request->invest_amount;
        // $share_balance->share = $request->share;
        $share_balance->profit_amount = $request->profit_amount;
        $share_balance->status = 1;
        $share_balance->save();
        return redirect()->route('founders.list')->with('success' , 'Founder Balance Send Successfully');
    }
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $foudner_bal = FounderBalance::find($id);
        return view('pages.founder.edit' ,compact('foudner_bal'));
    }

    
    public function update(Request $request)
    {
        $founder_id = $request->founder_id;
        $founder = FounderBalance::find($founder_id);
        $founder->fuser_id = $request->fuser_id;
        $founder->invest_amount = $request->invest_amount;
        $founder->share = $request->share;
        $founder->profit_amount = 0;
        $founder->status = 1;
        $founder->save();
        return redirect()->route('founders.list')->with('success' , 'Founder Updated Successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
