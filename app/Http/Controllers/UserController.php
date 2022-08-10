<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuser;
use App\Upgrade;
use App\Generation;
use App\Invoice;
use Validator;
use Auth;
use Redirect;
use Hash;
use DataTables;
use DB;
use URL;
use App\Rules\ValidatePlacement;
use App\Rules\ValidatePosition;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Form()
    {
        return view('pages.users.user');
    }
    public function UserList()
    {
        if (request()->ajax()) {
            $get = DB::select("
           SELECT fusers.id,fusers.name,fusers.username,fusers.t_pin,fusers.adress,fusers.password,fusers.reffer_id,fs.name as refarrar_name from fusers
           left JOIN fusers fs on fs.id=fusers.reffer_id
           ");
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit text-white" data-toggle="modal" data-target="">
                            <a href="' . URL::to('/admin/fuser/' . $get->id) . '" class="text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                       </button>
                       <button class="btn btn-danger btn-sm rounded delete " data-id="' . $get->id . '">
                        <a href="' . URL::to('admin/fuser_delete/' . $get->id) . '" class="text-white">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                       </button>
                    </div>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        $totalUser = Fuser::all()->count();
        $countActiveUser =  Fuser::where('status' , 1)->count();
        $salesVP = Invoice::all()->sum('vp');
        $salesTaka = Invoice::all()->sum('price');
        return view('pages.users.user_list',compact('totalUser','countActiveUser','salesVP','salesTaka'));
    }
    public function Create(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'username' => 'required|max:100|unique:fusers,username,' . 'vc' . $r->username,
            'email' => 'nullable|max:100',
            'adress' => 'nullable|max:200',
            'nid' => 'nullable|max:50|regex:/^([0-9]+)$/',
            'birth_date' => 'nullable|max:20|date_format:d-m-Y',
            'password' => 'required|max:50|confirmed',
            'mobile' => 'nullable|max:50|regex:/^([0-9]+)$/',
            't_pin' => 'required|max:100',
            'refarral' => 'required|max:100|regex:/^([0-9]+)$/',
            'placement' => ['required', 'max:100', 'regex:/^([0-9]+)$/', new ValidatePlacement],
            'position' => ['required', 'max:100', 'regex:/^([1-2]+)$/', new ValidatePosition($r->placement)],
            'package' => 'required|max:100|regex:/^([0-9]+)$/',
            'status' => 'required|max:1|regex:/^([0-9]+)$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2024',
        ]);
        //for image
        if ($validator->passes()) {
            $usr = new Fuser;
            $usr->name = $r->name;
            $usr->username = 'vc' . $r->username;
            $usr->email = $r->email;
            $usr->adress = $r->adress;
            $usr->nid = $r->nid;
            $usr->birth_date = $r->birth_date;
            $usr->password = Hash::make($r->password);
            $usr->mobile = $r->mobile;
            $usr->t_pin = $r->t_pin;
            $usr->reffer_id = $r->refarral;
            $usr->package_id = $r->package;
            $usr->status = $r->status;
            $usr->gen_id = 0;
            $usr->placement_id = $r->placement;
            $usr->position = $r->position;
            $usr->user_id = Auth::user()->id;
            $usr->user_created_at = time();
            if ($r->hasFile('image')) {
                $ext = $r->image->getClientOriginalExtension();
                $name = Auth::user()->id . '_' . md5(time()) . '.' . $ext;
                $r->image->storeAs('public/fuser', $name);
                $usr->image = $name;
            }
            $usr->save();
            return redirect('/admin/fuser')->with("status", "User Added Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function EditForm($id)
    {
        $data = Fuser::find($id);
        return view('pages.users.user_edit', compact('data'));
    }
    public function Update(Request $r)
    {
        // return $r->all();
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'username' => 'max:100|min:1|unique:fusers,username,',
            'email' => 'nullable|max:100',
            'adress' => 'nullable|max:200',
            'nid' => 'nullable|max:50|regex:/^([0-9]+)$/',
            'birth_date' => 'nullable|max:20|date_format:d-m-Y',
            'mobile' => 'nullable|max:50|regex:/^([0-9]+)$/',
            't-pin' => 'nullable|max:100',
            'placement' => ['nullable', 'max:100', 'regex:/^([0-9]+)$/', new ValidatePlacement],
            'position' => ['nullable', 'max:100', new ValidatePosition($r->placement)],
            'status' => 'required|max:1|regex:/^([0-9]+)$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2024',
        ]);
        //for image
        if ($validator->passes()) {
            $usr = Fuser::find($r->data_id);
            $usr->name = $r->name;
            $usr->username = $usr->username;
            $usr->email = $r->email;
            $usr->adress = $r->adress;
            $usr->nid = $r->nid;
            $usr->birth_date = $r->birth_date;
            $usr->mobile = $r->mobile;
            $usr->status = $r->status;
            if ($r->hasFile('image')) {
                $photo = DB::table('fusers')->select('image')->where('id', $r->data_id)->first();
                $ext = $r->image->getClientOriginalExtension();
                $name = Auth::user()->id . '_' . md5(time()) . '.' . $ext;
                $r->image->storeAs('public/fuser', $name);
                $usr->image = $name;
            }
            $usr->save();
            if (isset($photo)) {
                Storage::delete('public/fuser/' . $photo->image);
            }
            return redirect('/admin/fuser_list')->with("status", "User Updated Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function Delete($id)
    {
        $dlt = Fuser::where('id', $id)->delete();
        if ($dlt) {
            $updlt = Upgrade::where('fuser_id', $id)->delete();
            if ($updlt) {
                return redirect('/admin/fuser_list')->with("status", "User Deleted Success");
            }
        }
        return redirect('/admin/fuser_list')->with("error", "Something wrong");
    }
}
