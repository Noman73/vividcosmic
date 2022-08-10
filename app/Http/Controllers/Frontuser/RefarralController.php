<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fuser;
use App\Http\Traits\RefarralTrait;
use Redirect;
use DB;
use DataTables;
use App\Models\Invoice;
class RefarralController extends Controller
{
    use RefarralTrait;
    public function __construct(){
    	$this->middleware('auth:fuser');
    }
    public function AddRefIncomeToBalance(){
        if($this->GetRefarralIncome()['current'][0]->total>=300){
            $all=Fuser::select('id')->where('reffer_id',auth()->user()->id)->get();
             foreach($all as $data){
                $fuser=Fuser::find($data->id);
                $fuser->blnc_status=1;
                $fuser->save();
             }
        }else{
            Redirect::back()->with('error','Need Minimum 300.00');
        }
         return redirect('/user/dashboard')->with("status","Balance Added Success");
    }
    public function GetMyRefarral(){
        $vp=Invoice::where('fuser_id',auth()->user()->id)->sum("vp");
        if($vp<60){
            $parcent=10;
        }elseif($vp>59 and $vp<80){
            $parcent=15;
        }else{
            $parcent=15;
        }
        if (request()->ajax()){
            $get = DB::select("
           SELECT fusers.id,fusers.name,fusers.username,fusers.adress,((invoice.ammount-((invoice.ammount*40)/100))*'".$parcent."' )/100 as comission from fusers
           left join 
           (
                SELECT fuser_id,sum(ifnull(qantity,0)*ifnull(price,0)) ammount from invoices group by fuser_id
           ) invoice  on fusers.id=invoice.fuser_id where fusers.reffer_id=:id
           ",['id'=>auth()->user()->id]);
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><i class="fas fa-eye"></i></button>
                       <button class="btn btn-danger btn-sm rounded delete" data-id="' . $get->id . '"><i class="fas fa-trash-alt"></i></button>
                    </div>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('frontend.referrals.referrals');
    }
}
