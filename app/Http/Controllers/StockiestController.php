<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stockiest;
use Validator;
use Redirect;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class StockiestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Form()
    {
        return view('pages.stockiest.stockiest');
    }
    public function Create(Request $r)
    {
        // return $r->all();
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:200',
            'mobile' => 'nullable|max:25',
            'adress' => 'nullable|max:100',
            'email' => 'nullable|email|max:200',
            'company_name' => 'nullable|max:200',
        ]);
        //for image
        if ($validator->passes()) {
            $st = new Stockiest;
            $st->name         = $r->name;
            $st->mobile       = $r->mobile;
            $st->adress       = $r->adress;
            $st->email        = $r->email;
            $st->company_name = $r->company_name;
            $st->user_id      = auth()->user()->id;
            $st->save();
            return redirect('/admin/stockiest')->with("status", "Stockiest Added Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function Edit($id)
    {
        $data = DB::select('SELECT stockiests.id,stockiests.name,stockiests.adress,stockiests.mobile,stockiests.email,stockiests.company_name from stockiests
            where stockiests.id=:id', ['id' => $id]);
        $data = $data[0];
        return view('pages.stockiest.edit_stockiest', compact('data'));
    }

    public function Update(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required|max:200',
            'mobile' => 'nullable|max:25',
            'adress' => 'nullable|max:100',
            'email' => 'nullable|email|max:200',
            'company_name' => 'nullable|max:200',
        ]);
        if ($validator->passes()) {
            $st = Stockiest::find($r->id);
            $st->name         = $r->name;
            $st->mobile       = $r->mobile;
            $st->adress       = $r->adress;
            $st->email        = $r->email;
            $st->company_name = $r->company_name;
            $st->user_id      = auth()->user()->id;
            $st->save();
            return redirect('/admin/stockiest_list')->with("Success", "Stockiest Updated Successfully!");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }

    public function Delete($id)
    {
        $stockiest = Stockiest::find($id);
        $stockiest->delete();
        return redirect()->back()->with('success!', 'Stockiest Deleted!');
    }

    public function AllData()
    {
        if (request()->ajax()) {
            $total_bal = 500;
            $get = Stockiest::all();
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <a href="' . URL::to('/admin/edit/stockiest/' . $get->id) . '" class="text-light btn btn-sm btn-primary rounded mr-1 edit"><i class="fas fa-eye"></i></a>
                       <a href="' . URL::to('/admin/delete/stockiest/' . $get->id) . '" class="text-light btn btn-sm btn-danger rounded mr-1 delete"><i class="fas fa-trash-alt"></i></a>
                    </div>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.stockiest.stockiest_list');
    }
}
