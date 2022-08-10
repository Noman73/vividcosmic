<?php

namespace App\Http\Controllers;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SalesController extends Controller
{
    public function yearlySales()
    {
        if (request()->ajax()) {
            $data = Invoice::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <button type="button" data-id="' . $data->id . '" class="btn btn-sm btn-danger rounded mr-1 edit" data-toggle="modal" data-target="">
                                <a href="' . route('delete.sales', $data->id) . '" class="text-light">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </button>
                        </div>
                    ';
                    return $button;
                })
                ->editColumn('created_at', function ($data) {
                    return date('M d, Y, h:i a', strtotime($data->created_at));
                })
                ->editColumn('fuser_id', function ($data) {
                    return $data->fuser->name;
                })
                ->editColumn('product_id', function ($data) {
                    return $data->product->name;
                })
                ->rawColumns(['action', 'created_at', 'fuser_id', 'product_id'])->make(true);
        }
        return view('pages.sales.yearly');
    }
    public function monthlySales()
    {
        if (request()->ajax()) {
            $data = Invoice::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <button type="button" data-id="' . $data->id . '" class="btn btn-sm btn-danger rounded mr-1 edit" data-toggle="modal" data-target="">
                                <a href="' . route('delete.sales', $data->id) . '" class="text-light">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </button>
                        </div>
                    ';
                    return $button;
                })
                ->editColumn('created_at', function ($data) {
                    return date('M d, Y, h:i a', strtotime($data->created_at));
                })
                ->editColumn('fuser_id', function ($data) {
                    return $data->fuser->name;
                })
                ->editColumn('product_id', function ($data) {
                    return $data->product->name;
                })
                ->rawColumns(['action', 'created_at', 'fuser_id', 'product_id'])->make(true);
        }
        return view('pages.sales.monthly');
    }
    public function weeklySales()
    {
        if (request()->ajax()) {
            $data = Invoice::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <button type="button" data-id="' . $data->id . '" class="btn btn-sm btn-danger rounded mr-1 edit" data-toggle="modal" data-target="">
                                <a href="' . route('delete.sales', $data->id) . '" class="text-light">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </button>
                        </div>
                    ';
                    return $button;
                })
                ->editColumn('created_at', function ($data) {
                    return date('M d, Y, h:i a', strtotime($data->created_at));
                })
                ->editColumn('fuser_id', function ($data) {
                    return $data->fuser->name;
                })
                ->editColumn('product_id', function ($data) {
                    return $data->product->name;
                })
                ->rawColumns(['action', 'created_at', 'fuser_id', 'product_id'])->make(true);
        }
        return view('pages.sales.weekly');
    }
    public function deleteSales($id)
    {
        $sales = Invoice::find($id);
        $sales->delete();
        return redirect()->back()->with('deleted', 'Record Deleted Successfully!');
    }
}
