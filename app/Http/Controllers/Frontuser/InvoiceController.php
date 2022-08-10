<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;
use Validator;
use Redirect;
use DataTables;
use DB;
use App\Http\Traits\WalletBalanceTrait;
class InvoiceController extends Controller
{
    use WalletBalanceTrait;
    public function __construct(){
        $this->middleware('auth:fuser');
    }
    public function Form(){
        $product=Product::all();
        return view('frontend.invoices.invoice',compact('product'));
    }
    public function Create(Request $r){
        // return $r->product[0];
        $total=0;
        for ($i=0; $i <count($r->product) ; $i++) { 
            $query=Product::where('id',$r->product[$i])->first();
            $total+=floatval($r->qantity[$i])*floatval($query->sales_rate);
        }
        // return $this->WalletBalance();
        if($this->WalletBalance()<$total){
            return response()->json(['error'=>'Wallet Balance Is Low than Your 
            Purchase Ammount']);
        }
        $validator = Validator::make($r->all(),[
            'fuser' => 'required|regex:/^([0-9]+)$/',
            'product' => 'required|array',
            'product.*' => 'required|distinct|regex:/^([0-9]+)$/',
            'qantity' => 'required|array',
            'qantity.*' => 'required|regex:/^([0-9]+)$/',
        ]);

        if ($validator->passes()) {
            for ($i=0; $i < count($r->product); $i++) {
                $query=Product::where('id',$r->product[$i])->first();
                $invoice = new Invoice;
                $invoice->owner_id = auth()->user()->id;
                $invoice->fuser_id = $r->fuser;
                $invoice->product_id = $query->id;
                $invoice->price = $query->sales_rate;
                $invoice->qantity = $r->qantity[$i];
                $invoice->vp = $query->vp*$r->qantity[$i];
                $invoice->dates = time();
                $invoice->save();
            }
            return response()->json(['message'=>'Product Purchase Success']);
        }
        if($validator->fails()){
            return response()->json($validator->getMessageBag());
        }
    }
    public function InvoiceList(){
        if(request()->ajax()){
            $get = DB::select("
          SELECT invoices.price,invoices.qantity,products.name,invoices.vp FROM invoices 
          inner join products on products.id=invoices.product_id 
          where invoices.fuser_id= :fuser_id",['fuser_id'=>auth()->user()->id]);
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('total', function($get){
                    return (floatval($get->qantity)*floatval($get->price));
                })
                ->rawColumns(['total'])->make(true);
        }
        return view('frontend.invoices.invoice_list');
    }
}
