Models\<?php
namespace App\Http\Traits;
use DB;
use App\Models\Fuser;
use App\Models\TradingEarn;
use DateTime;
use DatePeriod;
use DateInterval;
trait TradingEarnTrait{
	public function TradingEarn(){
       $tradingEarnAdded=$this->get3RefferBonus()['added']+$this->trading10Days()['added'];
       $tradingEarnCurrent=$this->get3RefferBonus()['current']+$this->trading10Days()['current'];
       // dd($tradingEarnAdded);
       return ['added'=>$tradingEarnAdded,'current'=>$tradingEarnCurrent];
	}

   public function TradingDayCount($st,$en){
        $start = new DateTime($st);
        $end = new DateTime($en);
        // otherwise the  end date is excluded (bug?)
        $end->modify('+1 day');
        $interval = $end->diff($start);
        // total days
        $days = $interval->days;
        // create an iterateable period of date (P1D equates to 1 day)
        $period = new DatePeriod($start, new DateInterval('P1D'), $end);
        // best stored as array, so you can add more than one
        return $days;
   }
   public function trading10Days(){
        $count=DB::select("SELECT count(fusers.id) count from fusers 
         inner join packages on packages.id=fusers.package_id where fusers.reffer_id=:id and packages.ammount=:ammount",['id'=>auth()->user()->id,'ammount'=>1250]);
        $countme=TradingEarn::where('fuser_id',auth()->user()->id)->where('type',10)->count();
        if($count[0]->count>=10 and $countme==0){
           $earn=new TradingEarn;
           $earn->fuser_id=auth()->user()->id;
           $earn->type=10;
           $earn->status=1;
           $earn->save(); 
        }
        $tradingEarns=TradingEarn::where('fuser_id',auth()->user()->id)->where('type',10)->first();
        // dd($tradingEarns->created_at);
        if(isset($tradingEarns)){
           if ($tradingEarns->added_at!=null){
               $start = Date('d-m-Y',strtotime($tradingEarns->created_at));
               $end=Date('d-m-Y',$tradingEarns->added_at);
               $days_between = $this->TradingDayCount($start,$end);
               // dd($days_between);
               $added =($days_between)*40;
               $added =number_format((float)$added,2,'.','');
           }else{
               $added=0.00;
           }
           if($tradingEarns->added_at==null){
              $start = Date('d-m-Y',strtotime($tradingEarns->created_at));
           }else{
              $start = Date('d-m-Y',$tradingEarns->added_at);
           }
           $end=(Date('d-m-Y'));
           $count_days = $this->TradingDayCount($start,$end);
           $daily_work_currnt_blnc =($count_days-($tradingEarns->added_at!=null ? 1 : 0))*40;
        }else{
           $added=0.00;
           $daily_work_currnt_blnc=0.00;
        }
        return ['added'=>$added,'current'=>$daily_work_currnt_blnc,'my_reffer'=>$count];
   }
   public function get3RefferBonus(){
        $count=DB::select("SELECT count(fusers.id) count from fusers 
         inner join packages on packages.id=fusers.package_id where fusers.reffer_id=:id and packages.ammount=:ammount",['id'=>auth()->user()->id,'ammount'=>5000]);  
        $countme=TradingEarn::where('fuser_id',auth()->user()->id)->where('type',3)->count();
        // dd($count[0]->count);
        if($count[0]->count>=3 and $countme==0){
            // dd('ok');
           $earn=new TradingEarn;
           $earn->fuser_id=auth()->user()->id;
           $earn->type=3;
           $earn->status=1;
           $earn->save();
        }
        $tradingEarns=TradingEarn::where('fuser_id',auth()->user()->id)->where('type',3)->first();
        // dd($tradingEarns->created_at);
        if(isset($tradingEarns)){
           if ($tradingEarns->added_at!=null){
               $start = Date('d-m-Y',strtotime($tradingEarns->created_at));
               $end=Date('d-m-Y',$tradingEarns->added_at);
               $days_between = $this->TradingDayCount($start,$end);
               // dd($days_between);
               $added =($days_between)*40;
               $added =number_format((float)$added,2,'.','');
           }else{
               $added=0.00;
           }
           if($tradingEarns->added_at==null){
              $start = Date('d-m-Y',strtotime($tradingEarns->created_at));
           }else{
              $start = Date('d-m-Y',$tradingEarns->added_at);
           }
           $end=(Date('d-m-Y'));
           $count_days = $this->TradingDayCount($start,$end);
           $daily_work_currnt_blnc =($count_days-($tradingEarns->added_at!=null ? 1 : 0))*40;
        }else{
           $added=0.00;
           $daily_work_currnt_blnc=0.00;
        }
        return ['added'=>$added,'current'=>$daily_work_currnt_blnc,'my_reffer'=>$count];
   }
   
}