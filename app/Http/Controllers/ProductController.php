<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use DB;
use Redirect;
use DataTables;
use URL;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Form()
    {
        return view('pages.products.add_product');
    }
    public function Create(Request $r)
    {
        // return $r->all();
        $validator = Validator::make($r->all(), [
            'product_name' => 'required|max:100',
            'purchase_rate' => 'required|max:20|regex:/^([0-9]+)$/',
            'sales_rate' => 'required|max:20|regex:/^([0-9]+)$/',
            'vp' => 'required|max:20|regex:/^([0-9]+)$/',
            'size' => 'required|max:20',
        ]);
        //for image
        if ($validator->passes()) {
            $product = new Product;
            $product->name = $r->product_name;
            $product->purchase_rate = $r->purchase_rate;
            $product->sales_rate = $r->sales_rate;
            $product->vp = $r->vp;
            $product->size = $r->size;
            $product->user_id = auth()->user()->id;
            $product->save();
            return redirect('/admin/add_product')->with("status", "Product Added Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }
    public function Edit($id)
    {
        $data = DB::select('SELECT products.id,products.name,products.purchase_rate,products.sales_rate,products.vp,products.size,products.user_id from products
            where products.id=:id', ['id' => $id]);
        $data = $data[0];
        return view('pages.products.edit_product', compact('data'));
    }

    public function Update(Request $r)
    {
        // return $r->all();
        // return $r;
        $validator = Validator::make($r->all(), [
            'product_name' => 'required|max:100',
            'purchase_rate' => 'required|numeric',
            'sales_rate' => 'required|numeric',
            'vp' => 'required|numeric',
            'size' => 'required',
        ]);
        //for image
        if ($validator->passes()) {
            $product = Product::find($r->id);
            $product->name = $r->product_name;
            $product->purchase_rate = $r->purchase_rate;
            $product->sales_rate = $r->sales_rate;
            $product->vp = $r->vp;
            $product->size = $r->size;
            $product->user_id = auth()->user()->id;
            $product->save();
            return redirect('/admin/product_list')->with("Success", "Product Updated Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }

    public function Delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/product_list')->with("warning", "Product Deleted!");
    }

    public function AllData()
    {
        if (request()->ajax()) {
            $total_bal = 500;
            $get = Product::all();
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><a class="text-light" href="' . URL::to('admin/edit/product/' . $get->id) . '"><i class="fas fa-eye"></i></a></button>
                       <button class="btn btn-danger btn-sm rounded delete" data-id="' . $get->id . '"><a class="text-light" href="' . URL::to('admin/delete/product/' . $get->id) . '"><i class="fas fa-trash-alt"></i></a></button>
                    </div>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.products.product_list');
    }
}
