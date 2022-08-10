<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
	public function __construct(){
		$this->middleware('auth:fuser');
	}
    public function GetRefWithoutMe(Request $r){
        $data = DB::select("SELECT id,username name from fusers where id<>:user_id and username like :term limit 10",['term'=>'%'.$r->searchTerm.'%','user_id'=>auth()->user()->id]);
            foreach ($data as $value) {
                $set_data[] = ['id' => $value->id, 'text' => $value->name];
            }
            return $set_data;
    }
}
