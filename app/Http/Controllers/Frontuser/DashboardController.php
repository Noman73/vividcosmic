<?php

namespace App\Http\Controllers\Frontuser;

use App\Models\FounderBalance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\DashboardAmountTrait;
use App\Models\ShareBalance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // use GenerationTrait;
    use DashboardAmountTrait;

    public function __construct()
    {
        $this->middleware('auth:fuser');
    }
    public function Dashboard()
    {
        $data = $this->allAmount();
  
        return view('frontend.dashboard.dashboard', $data);
    }
}
