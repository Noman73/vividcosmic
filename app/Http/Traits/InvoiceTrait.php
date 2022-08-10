<?php
namespace App\Http\Traits;
use DB;
trait InvoiceTrait{
	public function InvoiceBalance($id){
             $data=DB::select("select ifnull(sum(qantity*price),0) total from invoices where owner_id=:id",['id'=>$id]);
             return $data[0]->total;
	}
}