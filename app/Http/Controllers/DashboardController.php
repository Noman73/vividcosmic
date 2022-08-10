<?php

namespace App\Http\Controllers;

use App\Cbonus;
use Illuminate\Http\Request;
use App\Http\Traits\CentralBonusTrait;
use Carbon\Carbon;

class DashboardController extends Controller
{
    use CentralBonusTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Dashboard()
    {
        return view('pages.dashboard.dashboard');
    }

    public function cronJob()
    {
        $last_bonus = Cbonus::latest()->first();
        $check = $last_bonus == !null ? Carbon::parse($last_bonus->created_at)->diffInDays() : 30;

        if ($check >= 30) {
            $this->centralBonusCronJob();
            return redirect()->back()->with('status', 'Success');
        }
        return redirect()->back()->with('status', 'You have to wait ' . 30 - $check . ' day(s)!');
    }
}
