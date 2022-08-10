@extends('layouts.frontend-master')
@section('content')
@section('link')
<style>
    .card-body{
        min-height: 220px;
    }
</style>
@endsection
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card " style="background: #e91e63; color: #fff;">
                                    <div class="card-body">
                                        <div class="text font-weight-bold">
                                            <span class="font-weight-bold"><i class="fas fa-restroom"></i> WELCOME TO</span>
                                        </div>
                                        <hr class="hr" style="color: #fff">
                                        <h3 class=" font-weight-bold text-center">{{ auth()->user()->name }}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card " style="background: #ff9800; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Down Member</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #fff">
                                        <div>A Team: <span class="float-right">{{ $active_id['down_left'] }}</span></div>
                                        <div>B Team: <span class="float-right">{{ $active_id['down_right'] }}</span></div>
                                        <div>C Team: <span class="float-right">0</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card " style="background: #ff9800; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Active ID</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #fff">
                                        <div>A Team: <span class="float-right">{{ $active_id['left'] }}</span></div>
                                        <div>B Team: <span class="float-right">{{ $active_id['right'] }}</span></div>
                                        <div>C Team: <span class="float-right">0</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background: #3f51b5; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span> <i class="fas fa-money-bill-alt"></i> Total Sales</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>A Team VP: <span class="float-right"> {{ $active_id['vp_left'] }}</span></div>
                                        <div>B Team VP: <span class="float-right"> {{ $active_id['vp_right'] }}</span></div>
                                        <div>C Team VP: <span class="float-right"> 0</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background: #3f51b5; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span> <i class="fas fa-money-bill-alt"></i> Total Referral</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>A Team: <span class="float-right">{{ $refCount['left'] }}</span></div>
                                        <div>B Team: <span class="float-right">{{ $refCount['right'] }}</span></div>
                                        <div>C Team: <span class="float-right">0</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card " style="background: #3f51b5; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span> <i class="fas fa-money-bill-alt"></i> Referral Income</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>Today: <span class="float-right">৳ 0.00</span></div>
                                        <div>Total: <span class="float-right">৳ {{ number_format((float) $refarral_commition0[0]->total, 2, '.', '') }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card " style="background: #ff9800; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Generation Income</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #fff">
                                        <div>Today: <span class="float-right">৳ 0.00</span></div>
                                        <div>Total: <span class="float-right">৳ {{ number_format((float) $generation['total'], 2, '.', '') }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background: #009432; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Central Bonus</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #fff">
                                        <div>This Month: <span class="float-right">৳ {{ $monthly_central_bonus->ammount ?? '0.00' }}</span></div>
                                        <div>Total: <span class="float-right">৳ {{ $myCentralBonus }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="background: #008478; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Salary</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>This Month: <span class="float-right">৳ 0.00</span></div>
                                        <div>Total: <span class="float-right">৳ 0.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background: #cd1a57; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Tour</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>This Month: <span class="float-right">৳ 0.00</span></div>
                                        <div>Total: <span class="float-right">৳ 0.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background: #cd1a57; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Reward</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>This Month: <span class="float-right">৳ 0.00</span></div>
                                        <div>Total: <span class="float-right">৳ 0.00</span></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="card" style="background: #cd1a57; color: #fff;">
                                    <div class="card-body">
                                        <div class="text">
                                            <span><i class="fas fa-money-bill-alt"></i> Royalty</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>This Month: <span class="float-right">৳ 0.00</span></div>
                                        <div>Total: <span class="float-right">৳ 0.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                @php
                                    $shareBalances = \App\Models\ShareBalance::where('fuser_id',auth()->user()->id)->oldest()->first();
                                    $founderBalances = \App\Models\FounderBalance::where('fuser_id' , auth()->user()->id)->oldest()->first();
                                @endphp
                                @if (isset($shareBalances->status) && $shareBalances->status == 1)
                                <div class="col-md-3">
                                    <div class="card" style="background: #ffa502; color: #fff;">
                                        <div class="card-body">
                                            <div class="text">
                                                <span><i class="fas fa-money-bill-alt"></i> Share Balance</span>
                                            </div>
                                            <hr class="hr" style="border-top: 3px solid #192a56">
                                            <div>Invest Amount <span class="float-right">৳ {{ isset($shareBalances->invest_amount) ? $shareBalances->invest_amount : 0.00  }}.00</span></div>
                                            <div>Parcent <span class="float-right">৳ {{ isset($shareBalances->share) ? $shareBalances->share : 0  }}.00</span></div>
                                            <div>This Month <span class="float-right">৳ {{ isset($monthlyShare) ? $monthlyShare : 0  }}.00</span></div>
                                            <div>Totalc Current </br> Share Balance: <span class="float-right">৳ {{ isset($currentShareblc) ? $currentShareblc: 0 }}.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div></div>
                                @endif
                                @if (isset($founderBalances->status) && $founderBalances->status == 1)
                                <div class="col-md-3">
                                    <div class="card" style="background: #e84118; color: #fff;">
                                        <div class="card-body">
                                            <div class="text">
                                                <span><i class="fas fa-money-bill-alt"></i> Share Balance</span>
                                            </div>
                                            <hr class="hr" style="border-top: 3px solid #192a56">
                                            <div>Invest Amount <span class="float-right">৳ {{ isset($founderBalances->invest_amount) ? $founderBalances->invest_amount : 0.00  }}.00</span></div>
                                            <div>Parcent <span class="float-right">৳ {{ isset($founderBalances->share) ? $founderBalances->share : 0  }}.00</span></div>
                                            <div>This Month <span class="float-right">৳ {{ isset($monthlyFoundersBalance) ? $monthlyFoundersBalance : 0  }}.00</span></div>
                                            <div>Total Current </br>Founder Balance:<span class="float-right">৳{{ isset($founderCurrentBalance) ? $founderCurrentBalance: 0 }}.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div></div>
                                @endif
                            <div class="col-md-3">
                                <div class="card" style="background: #44bd32; color: #fff;">
                                    <div class="card-body">
                                        <div class="text font-weight-bold">
                                            <span><i class="fas fa-money-bill-alt"></i> Transaction</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>Transfer : <span class="float-right">৳ {{ $d_transfer_other }}</span></div>
                                        <div>Receive: <span class="float-right">৳ {{ $d_transfer_me }}</span></div>
                                        <div>Bonus: <span class="float-right">৳ 0.00</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background: #1B1464; color: #fff;">
                                    <div class="card-body">
                                        <div class="text font-weight-bold">
                                            <span><i class="fas fa-money-bill-alt"></i> E-Wallet</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>Wallet: <span class="float-right">৳ {{ $ebalance }}</span></div>
                                        <div>withdraw: <span class="float-right">৳ {{ $widthdraw }}</span></div>
                                        <div>Ammount: <span class="float-right">৳ {{ $balance }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background: #009432; color: #fff;">
                                    <div class="card-body">
                                        <div class="text font-weight-bold">
                                            <span> <i class="fas fa-money-bill-alt"></i> Total D Wallet</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid #192a56">
                                        <div>Total In: <span class="float-right">৳ {{ $d_total_in }}</span></div>
                                        <div>Total Out: <span class="float-right">৳ {{ $d_total_out }}</span></div>
                                        <div>Ammount: <span class="float-right">৳ {{ $wallet_blnc }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
