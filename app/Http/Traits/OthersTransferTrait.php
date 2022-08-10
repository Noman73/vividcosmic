<?php
namespace App\Http\Traits;
use App\Models\OthersTransfer;
use DB;
trait OthersTransferTrait{
	public function OthersTransferD($id){
       return $data=OthersTransfer::where('owner_id',$id)->sum('ammount');
	}
	public function OthersTransferMe($id){
		return $data=(OthersTransfer::where('transfer_id',$id)->sum('ammount')*99)/100;
	}
}