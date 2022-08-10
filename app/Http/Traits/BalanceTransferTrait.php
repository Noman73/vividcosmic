<?php
namespace App\Http\Traits;
use App\Models\Transfer;
use DB;
trait BalanceTransferTrait{
	public function Transfer($id){
       return $data=Transfer::where('owner_id',$id)->sum('ammount');
	}
    public function Deposit($id){
        $data=DB::select("SELECT ifnull(SUM(ammount-((ammount*5)/100)),0) ammount from transfers where transfer_id=:id",['id'=>$id]);
       return $data[0]->ammount;
    }
}