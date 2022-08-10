<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Fuser;
use App\Models\Upgrade;
use App\Models\Package;
use App\Models\Generation;
use Auth;
use Redirect;
use Validator;
use Hash;
use App\Rules\ValidatePlacement;
use App\Rules\ValidatePosition;
use App\Http\Traits\WalletBalanceTrait;
use App\Models\DCommision;
use Storage;

class UserController extends Controller
{
    use WalletBalanceTrait;
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function Form()
    {
        $fuser = Fuser::select('id', 'username')->orderBy('id')->get();
        return view('frontend.users.user', compact('fuser'));
    }
    public function UserList()
    {
        if (request()->ajax()) {
            $get = DB::select("
           SELECT fusers.id,fusers.name,fusers.username,fusers.adress,fs.name as refarrar_name from fusers
           left JOIN fusers fs on fs.id=fusers.reffer_id
           ");
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
        return view('frontend.users.user_list');
    }
    public function Create(Request $r)
    {

        $validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'username' => 'required|max:100|unique:fusers,username,' . "vc" . $r->username,
            'email' => 'nullable|max:100',
            'adress' => 'nullable|max:200',
            'nid' => 'nullable|max:50|regex:/^([0-9]+)$/',
            'country' => 'nullable|max:50',
            'birth_date' => 'nullable|max:20|date_format:d-m-Y',
            'password' => 'required|max:50|confirmed',
            'mobile' => 'nullable|max:50|regex:/^([0-9]+)$/',
            'refarral' => 'required|max:100',
            'placement' => ['required', 'max:100', 'regex:/^([0-9]+)$/', new ValidatePlacement],
            'position' => ['required', 'max:100', new ValidatePosition($r->placement)],
            't_pin' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2024',
        ]);
        if ($validator->passes()) {
            $usr = new Fuser;
            $usr->name = $r->name;
            $usr->username = "vc" . $r->username;
            $usr->email = $r->email;
            $usr->adress = $r->adress;
            $usr->nid = $r->nid;
            $usr->country = $r->country;
            $usr->birth_date = $r->birth_date;
            $usr->password = Hash::make($r->password);
            $usr->mobile = $r->mobile;
            $usr->t_pin = $r->t_pin;
            $usr->reffer_id = $r->refarral;
            $usr->placement_id = $r->placement;
            $usr->position = $r->position;
            $usr->status = 1;
            $usr->gen_id = 0;
            $usr->fuser_id = Auth::user()->id;
            $usr->user_created_at = time();
            if ($r->hasFile('image')) {
                $ext = $r->image->getClientOriginalExtension();
                $name = Auth::user()->id . '_' . md5(time()) . '.' . $ext;
                $r->image->storeAs('public/fuser', $name);
                $usr->image = $name;
            }
            $usr->save();
            if($usr){
                $commision=new DCommision;
                $commision->ammount=100;
                $commision->user_id=$r->refarral;
                $commision->date=strtotime(date("d-m-Y 00:00:00"));
                $commision->author_id=auth()->user()->id;
                $commision->save();
            }
            return redirect('/user/user')->with("status", "User Added Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function UpdateForm(Request $r)
    {
        $data = Fuser::find(auth()->user()->id);
        return view('frontend.users.user_edit', compact('data'));
    }
    public function Update(Request $r)
    {
        // return $r->all();
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'email' => 'nullable|max:100',
            'adress' => 'nullable|max:200',
            'nid' => 'nullable|max:50|regex:/^([0-9]+)$/',
            'birth_date' => 'nullable|max:20|date_format:d-m-Y',
            'mobile' => 'nullable|max:50|regex:/^([0-9]+)$/',
            't-pin' => 'nullable|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2024',
            'nominee_name' => 'nullable',
            'nominee_id' => 'string|nullable',
            'nominee_relationship' => 'nullable',
            'nominee_mobile' => 'nullable|numeric',
        ]);
        //for image
        if ($validator->passes()) {
            $usr = Fuser::find($r->data_id);
            $usr->name = $r->name;
            $usr->email = $r->email;
            $usr->adress = $r->adress;
            $usr->nid = $r->nid;
            $usr->birth_date = $r->birth_date;
            $usr->mobile = $r->mobile;
            $usr->t_pin = $r->t_pin;
            $usr->nominee_name = $r->nominee_name;
            $usr->nominee_id = $r->nominee_id;
            $usr->nominee_relationship = $r->nominee_relationship;
            $usr->nominee_mobile = $r->nominee_mobile;
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
            return redirect('/user/user_update')->with("status", "Your Profile Updated Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function GetName($id)
    {
        $user = Fuser::find($id);
        return $user->name;
    }
}
