<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Auth;
use Validator;
use Redirect;
use DataTables;
use DB;
use URL;
class PackageController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    public function Form(){
    	return view('pages.packages.package');
    }
    public function Create(Request $r){
    	// return $r->all();
    	$validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'description' => 'nullable|max:100',
            'ammount' => 'required|max:100|regex:/^([0-9]+)$/',
            'comission' => 'required|max:200|regex:/^([0-9]+)$/',
            // 'gen_comission' => 'required|max:50|regex:/^([0-9]+)$/',
            'status' => 'required|max:20|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $package = new Package;
            $package->name = $r->name;
            $package->description   = $r->description;
            $package->ammount       = $r->ammount;
            $package->comission     = $r->comission;
            $package->gen_comission = 0;
            $package->status        = $r->status;
            $package->user_id       = Auth::user()->id;
            $package->save();
            return redirect('/admin/packages')->with("status","Package Added Success");
        }
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function AllData(){
    	if (request()->ajax()) {
            $total_bal = 500;
            $get = Package::all();
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><a class="text-light" href="'.URL::to('admin/package_edit/'.$get->id).'"><i class="fas fa-eye"></i></a></button>
                       <button class="btn btn-danger btn-sm rounded delete" data-id="' . $get->id . '"><a class="text-light" href="'.URL::to('admin/package_delete/'.$get->id).'"><i class="fas fa-trash-alt"></i></a></button>
                    </div>';
                    return $button;
                })
                ->addColumn('status',function($get){
                	if($get->status==1){
                		return "Active";
                	}else{
                		return "Deactive";
                	}
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.packages.all_packages');
    }
   public function GetPackages(Request $r) {
            $data = DB::select("SELECT id,name from packages where name like :term  limit 10",['term'=>'%'.$r->searchTerm.'%']);
            foreach ($data as $value) {
                $set_data[] = ['id' => $value->id, 'text' => $value->name];
            }
            return $set_data;
    }
    public function EditForm($id){
        $data=Package::find($id);
        return view('pages.packages.package_edit',compact('data'));
    }
    public function Edit(Request $r){
        // return $r->all();
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'description' => 'nullable|max:100',
            'ammount' => 'required|max:100|regex:/^([0-9.]+)$/',
            'comission' => 'required|max:200|regex:/^([0-9.]+)$/',
            // 'gen_comission' => 'required|max:50|regex:/^([0-9]+)$/',
            'status' => 'required|max:20|regex:/^([0-9]+)$/',
        ]);
        //for image
        if ($validator->passes()) {
            $package =Package::find($r->data_id);
            $package->name = $r->name;
            $package->description = $r->description;
            $package->ammount = $r->ammount;
            $package->comission = $r->comission;
            $package->gen_comission = 0;
            $package->status = $r->status;
            $package->user_id = Auth::user()->id;
            $package->save();
            return redirect('/admin/all_packages')->with("status","Package Updated Success");
        }
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function Delete($id){
        $delete=Package::where('id',$id)->delete();
        return redirect('/admin/all_packages')->with("status","Package Deleted Success");
    }
}
