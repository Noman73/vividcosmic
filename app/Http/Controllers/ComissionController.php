<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
class ComissionController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function GetAdminRefComission(){
    	if (request()->ajax()) {
            $total_bal = 500;
            $get = DB::select(" 
            	SELECT users.name,users.email as mobile,sum(packages.comission) comission from fusers
            	inner join users on users.id=fusers.reffer_id
            	inner join packages on fusers.package_id=packages.id
            	where fusers.status=1
            	group by fusers.reffer_id
            	");
            return DataTables::of($get)
                ->addIndexColumn()
                ->make(true);
        }
        return view('pages.comission.refarral_comission');
    }
}
