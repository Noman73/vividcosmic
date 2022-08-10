<?php

namespace App\Http\Traits;

use App\Models\Invoice;
use App\Models\Cbonus;
use Carbon\Models\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;

trait CentralBonusTrait
{
    public function centralBonusCronJob()
    {
        $userVp = DB::select("
            SELECT fuser_id,sum(vp) total_vp from invoices group by fuser_id having total_vp>179;
            ");
        $monthlyIncome = DB::select("
            select sum(qantity*price) ammount from invoices where dates >=:date and dates<=:todate
            ", ['date' => strtotime(date('d-m-Y', strtotime('first day of last month'))), 'todate' => strtotime(date('d-m-Y'))]);
        $ammount = (((($monthlyIncome[0]->ammount * 60) / 100) / count($userVp)) * 5) / 100;
        foreach ($userVp as $user) {
            $cbonus = new Cbonus;
            $cbonus->ammount = request()->amount;
            $cbonus->fuser_id = $user->fuser_id;
            $cbonus->save();
        }
        return redirect()->back()->with('message', 'Bonus Distributed Successfully!');
    }
    public function myCentralBonus($id)
    {
        $mybonus = Cbonus::where('fuser_id', $id)->sum('ammount');
        // date('d') -
        return $mybonus;
    }
}
