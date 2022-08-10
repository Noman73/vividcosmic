<?php
namespace App\Http\Traits;
use App\Models\Etransfer;
use DB;
trait EBalanceTransferTrait{
	public function Extransfer($id){
       return $data=Etransfer::where('fuser_id',$id)->sum('ammount');
	}
}