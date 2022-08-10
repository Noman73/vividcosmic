<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upgrade;
use App\Fuser;
use DB;
use Validator;
class UpgradeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function Form(){
        return view('pages.upgrade.upgrade');
    }
    public function Create(Request $r){
         // $r->all();
    $validator = Validator::make($r->all(), [
            'package' => 'required|max:100|regex:/^([0-9]+)$/',
            'user' => 'required|max:20|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()){
            $usr = Fuser::find($r->user);
            $usr->package_id = $r->package;
            $usr->save();
            return redirect('/admin/upgrade')->with("status","Account Upgrade  Success");
        }
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    // public function UpgradeLoop(){
    //     return Upgrade::count();
    //     $data=DB::select("
    //         SELECT fusers.reffer_id,fusers.package_id,fusers.id,packages.comission,fusers.placement_id FROM fusers
    //         inner join packages on packages.id=fusers.package_id
    //         ");
    //     foreach($data as $all){
    //         if($all->reffer_id!=null){
    //             $comission=DB::table('fusers')
    //                             ->join('packages','fusers.package_id','=','packages.id')
    //                             ->select('packages.comission')
    //                             ->where('fusers.id',$all->reffer_id)->first();
    //             // dd($comission);
    //         }
    //         $upgrade=new Upgrade;
    //         $upgrade->reffer_id=$all->reffer_id;
    //         $upgrade->package_id=$all->package_id;
    //         $upgrade->placement_id=$all->placement_id;
    //         $upgrade->fuser_id=$all->id;
    //         if($all->reffer_id!=null){
    //             $upgrade->comission=$comission->comission;
    //         }
    //         $upgrade->save();
    //     }
    //     return 'ok';
    // }

}
