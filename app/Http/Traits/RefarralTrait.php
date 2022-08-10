<?php
namespace App\Http\Traits;
use App\Models\Fuser;
use App\Models\Balance;
use App\Models\Withdraw;
use App\Models\Invoice;
use DB;
use App\Http\Traits\GenerationTrait;
trait RefarralTrait{
	public function GetRefarralIncome(){
      $vp=Invoice::where('fuser_id',auth()->user()->id)->sum('vp');
	  if($vp<60){
		  $parcent=10;
	  }elseif($vp>59 and $vp<80){
		$parcent=15;
	  }else{
		$parcent=15;
	  }
		$refarral_commition0=DB::select("
		select ((sum(ifnull(invoices.price*invoices.qantity,0))*60)/100)*'".$parcent."'/100 total from fusers
		left join invoices on fusers.id=invoices.fuser_id where fusers.reffer_id=:id
		",['id'=>auth()->user()->id]);
				// dd($refarral_commition0);
		
		// dd($refarral_commition0);
		$refarral_commition1=DB::select("
    			SELECT ifnull(sum(packages.comission),0) total from fusers
    			inner join packages on fusers.package_id=packages.id
    			where fusers.reffer_id=:id and fusers.blnc_status=1
    		",['id'=>auth()->user()->id]);
		/*
		older code
		*/
		//       $percent=DB::select("
        //         SELECT packages.comission from fusers
        //         inner join packages on packages.id=fusers.package_id
        //         where fusers.id=:id
        //     ",['id'=>auth()->user()->id]);
		// $refarral_commition0=DB::select("
        //         SELECT cast(ifnull(sum(('".$percent[0]->comission."'*(packages.ammount-((packages.ammount*40)/100)))/100),0) as decimal(20,2)) as total from fusers inner join packages on fusers.package_id=packages.id where fusers.reffer_id=:id",['id'=>auth()->user()->id]);
		// $refarral_commition1=DB::select("
    	// 		SELECT ifnull(sum(packages.comission),0) total from fusers
    	// 		inner join packages on fusers.package_id=packages.id
    	// 		where fusers.reffer_id=:id and fusers.blnc_status=1
    	// 	",['id'=>auth()->user()->id]);
		return ['added'=>$refarral_commition1,'current'=>$refarral_commition0];
	}

}