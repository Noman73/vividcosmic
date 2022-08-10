<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stockiest;
use DataTables;
class StockiestController extends Controller
{
    public function __construct(){
        $this->middleware('auth:fuser');
    }
    public function AllData(){
    	if (request()->ajax()) {
            $total_bal = 500;
            $get = Stockiest::all();
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit " data-toggle="modal" data-target=""><a href="" class="text-light">edit</a></button>
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-danger rounded mr-1 delete " data-toggle="modal" data-target=""><a href="" class="text-light">delete</a></button>
                    </div>';
                    return $button;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('frontend.stockiest.stockiest_list');
    }
}
