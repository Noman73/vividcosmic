<?php

namespace App\Http\Controllers;

use App\Fuser;
use App\ShareBalance;
use Illuminate\Http\Request;
use DB;
class ShareBalanceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $share_balances = ShareBalance::latest()->paginate(10);
        return view('pages.sharebalance.index',compact('share_balances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fusers = Fuser::all();
        return view('pages.sharebalance.create',compact('fusers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fuser_id'      => 'required|unique:share_balances,fuser_id',
            // 'invest_amount' => 'required',
            // 'share'         => 'required',
            // 'profit_amount' => 'required',
        ]);

        $share_balance = new ShareBalance();
        $share_balance->fuser_id = $request->fuser_id;
        $share_balance->invest_amount = $request->invest_amount;
        $share_balance->share = $request->share;
        $share_balance->profit_amount = 0;
        $share_balance->status = 1;
        $share_balance->save();
        return redirect()->route('sharebalance.list')->with('success' , 'Share Balance Send Successfully');
    }

    public function send(){
        $fusers = ShareBalance::distinct()->where('status',1)->get(['fuser_id']);
        return view('pages.balance.share',compact('fusers'));
    }

    public function mothlyadd(Request $request){
        $validated = $request->validate([
            'fuser_id'      => 'required',
            'profit_amount' => 'required',
        ]);

        $share_balance = new ShareBalance();
        $share_balance->fuser_id = $request->fuser_id;
        // $share_balance->invest_amount = $request->invest_amount;
        // $share_balance->share = $request->share;
        $share_balance->profit_amount = $request->profit_amount;
        $share_balance->status = 1;
        $share_balance->save();
        return redirect()->route('sharebalance.list')->with('success' , 'Share Balance Send Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $share_balance = ShareBalance::find($id);
        return view('pages.sharebalance.edit' ,compact('share_balance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $share_id = $request->share_id;
        $share_balance = ShareBalance::find($share_id);
        $share_balance->fuser_id = $request->fuser_id;
        $share_balance->invest_amount = $request->invest_amount;
        $share_balance->share = $request->share;
        $share_balance->profit_amount = 0;
        $share_balance->status = 1;
        $share_balance->save();
        return redirect()->route('sharebalance.list')->with('success' , 'Share Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
