<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orphan;
use Validator;
use Redirect;
use DataTables;
use URL;
use Auth;
use Illuminate\Support\Facades\DB;

class OrphanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Form()
    {
        return view('pages.orphan.orphan');
    }
    public function Create(Request $r)
    {
        // return $r->all();
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'mobile' => 'required|max:25',
            'adress' => 'nullable|max:100',
            'ammount' => 'required|max:200|regex:/^([0-9]+)$/',
            // 'gen_comission' => 'required|max:50|regex:/^([0-9]+)$/',
            'image' => 'nullable',
        ]);
        //for image
        if ($validator->passes()) {
            $orphan = new Orphan;
            $orphan->name = $r->name;
            $orphan->mobile   = $r->mobile;
            $orphan->adress       = $r->adress;
            $orphan->ammount     = $r->ammount;
            $orphan->user_id       = auth()->user()->id;
            if ($r->hasFile('image')) {
                $ext = $r->image->getClientOriginalExtension();
                $name = Auth::user()->id . '_' . md5(time()) . '.' . $ext;
                $r->image->storeAs('public/orphan', $name);
                $orphan->images = $name;
            }
            $orphan->save();
            return redirect('/admin/orphan')->with("status", "Orphan Added Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }

    public function Edit($id)
    {
        $data = DB::select('SELECT orphans.id,orphans.name,orphans.mobile,orphans.adress,orphans.ammount,orphans.user_id from orphans
            where orphans.id=:id', ['id' => $id]);
        $data = $data[0];
        return view('pages.orphan.edit_orphan', compact('data'));
    }

    public function Update(Request $r)
    {
        // return $r->all();
        // return $r;
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:100',
            'mobile' => 'required|max:25',
            'adress' => 'nullable|max:100',
            'ammount' => 'required|max:200',
            // 'gen_comission' => 'required|max:50|regex:/^([0-9]+)$/',
            'image' => 'nullable',
        ]);
        //for image
        if ($validator->passes()) {
            $orphan = Orphan::find($r->id);
            $orphan->name = $r->name;
            $orphan->mobile   = $r->mobile;
            $orphan->adress       = $r->adress;
            $orphan->ammount     = $r->ammount;
            $orphan->user_id       = auth()->user()->id;
            $orphan->save();
            return redirect('/admin/orphan_list')->with("Success", "Orphan Profile Updated Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function Delete($id)
    {
        $orphan = Orphan::find($id);
        $orphan->delete();
        return redirect('/admin/orphan_list')->with("warning", "Orphan Deleted!");
    }
    public function AllData()
    {
        if (request()->ajax()) {
            $total_bal = 500;
            $get = Orphan::all();
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <a href="' . URL::to('admin/edit/orphan/' . $get->id) . '" class="text-light btn btn-sm btn-primary rounded mr-1 edit "><i class="fas fa-eye"></i></a>
                       <a href="' . URL::to('admin/delete/orphan/' . $get->id) . '" class="text-light btn btn-sm btn-danger rounded mr-1 delete "><i class="fas fa-trash-alt"></i></a>
                    </div>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.orphan.orphan_list');
    }
}
