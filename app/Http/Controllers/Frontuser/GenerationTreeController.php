<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class GenerationTreeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function Tree($id)
    {
        $owner = DB::table('fusers')->select('id', 'username', 'name', 'image')->where('id', $id)->first();
        $left = DB::table('fusers')->select('id', 'username', 'name', 'image')->where('placement_id', $id)->where('position', 1)->first();
        $right = DB::table('fusers')->select('id', 'username', 'name', 'image')->where('placement_id', $id)->where('position', 2)->first();
        return view('frontend.generation_tree.tree', compact('owner', 'left', 'right'));
    }
}
