<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\GenSetting;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;
use Redirect;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $gen=GenSetting::first();
        return view('pages.setting.setting',compact('$gen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        // return $r->all();
        $validator = Validator::make($r->all(), [
            'gen1' => 'required|max:15|min:1',
            'gen2' => 'required|max:15|min:1',
            'gen3' => 'required|max:15|min:1',
            'gen4' => 'required|max:15|min:1',
            'gen5' => 'required|max:15|min:1',
            'gen6' => 'required|max:15|min:1',
            'gen7' => 'required|max:15|min:1',
            'gen8' => 'required|max:15|min:1',
            'gen9' => 'required|max:15|min:1',
            'gen10' => 'required|max:15|min:1',
            'gen11' => 'required|max:15|min:1',
            'gen12' => 'required|max:15|min:1',
            'gen13' => 'required|max:15|min:1',
            'gen14' => 'required|max:15|min:1',
            'gen15' => 'required|max:15|min:1',
            'gen16' => 'required|max:15|min:1',
            'gen17' => 'required|max:15|min:1',
           
        ]);
        if ($validator->passes()) {
            $genCount=GenSetting::count();
            if($gen>0){
                $gen=GenSetting::first();
            }else{
                $gen = new GenSetting;
            }
            $gen->gen1 = $r->gen1;
            $gen->gen2 = $r->gen2;
            $gen->gen3 = $r->gen3;
            $gen->gen4 = $r->gen4;
            $gen->gen5 = $r->gen5;
            $gen->gen6 = $r->gen6;
            $gen->gen7 = $r->gen7;
            $gen->gen8 = $r->gen8;
            $gen->gen9 = $r->gen9;
            $gen->gen10 = $r->gen10;
            $gen->gen11 = $r->gen11;
            $gen->gen12 = $r->gen12;
            $gen->gen13 = $r->gen13;
            $gen->gen14 = $r->gen14;
            $gen->gen15 = $r->gen15;
            $gen->gen16 = $r->gen16;
            $gen->gen17 = $r->gen17;
            $gen->author_id = auth()->user()->id;
            $gen->save();
            
            return redirect()->back()->with("status", "User Added Success");
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
