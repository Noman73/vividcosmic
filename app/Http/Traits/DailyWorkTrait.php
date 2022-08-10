<?php
namespace App\Http\Traits;
use DB;
use App\Http\Traits\GenerationTrait;
use DateTime;
use DatePeriod;
use DateInterval;
trait DailyWorkTrait{
	public function GetDailyWork(){
		$date = DB::select('SELECT user_created_at,dw_updated_at from fusers where id=:id',['id'=>auth()->user()->id]);
        // dd($start);
        if ($date[0]->dw_updated_at!=null) {
           $start = Date('d-m-Y',$date[0]->user_created_at);
            $end=Date('d-m-Y',$date[0]->dw_updated_at);
            $days_between = $this->dayCount($start,$end);
            // dd($days_between);
            $days_between =($days_between-1)*10;
            $days_between=number_format((float)$days_between,2,'.',''); 
        }else{
            $days_between=0.00;
        }
        // dailyWork Current Balance
        if($date[0]->dw_updated_at==null){
            $start=Date('d-m-Y',$date[0]->user_created_at);
        }else{
            $start=Date('d-m-Y',$date[0]->dw_updated_at);
        }
        $end=(Date('d-m-Y'));
        $count_days = $this->dayCount($start,$end);
        $daily_work_currnt_blnc =($count_days-1)*10;
        return ['added'=>$days_between,'current'=>$daily_work_currnt_blnc];
	}
	public function dayCount($st,$en){
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

        foreach($period as $dt) {
            $curr = $dt->format('D');

            // substract if Saturday or Sunday
            if ($curr == 'Sun') {
                $days--;
            }
        }
        return $days; 
    }
}