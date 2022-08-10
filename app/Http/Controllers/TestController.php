<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\Fuser;
// use App\Models\GCommision;
// use Artisan;
// use App\Http\Traits\GenerationCronTrait;
use App\Http\Traits\GcronTrait;
use App\Http\Traits\WalletBalanceTrait;
class TestController extends Controller
{
   // use GenerationCronTrait;
   use GcronTrait,WalletBalanceTrait;
   public function __construct(){
      $this->middleware('auth:fuser');
   }
   public function Test(){
      // $user=Fuser::all();
      // foreach($user as $u){
      //   $singleUser= $this->GetGeneration($u->id);
      //   foreach($singleUser as $keys=>$value){
      //    if($keys!='total'){
      //       // print_r($singleUser[$keys]);
      //       $insert=new GCommision;
      //       $insert->fuser_id=$u->id;
      //       $insert->gen=substr($keys,3);
      //       $insert->comission=floatVal($singleUser[$keys]['ammount']);
      //       $insert->save();
      //   }
            
      //   }
      // }
      // return 'ok';
      // return $this->WalletBalance();
      // return strtotime(date('d-m-Y'));
      return $this->GetGeneration(auth()->user()->id);
   }
}
