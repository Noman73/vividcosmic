<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Withdraw;
use DataTables;
use DB;
use URL;

class WidthdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Form()
    {
        return view('pages.withdrawals.withdraw');
    }
    public function AllData()
    {
        if (request()->ajax()) {
            $total_bal = 500;
            $get = DB::select("
            	SELECT withdraws.id,fusers.name,withdraws.ammount,withdraws.status,withdraws.number,withdraws.payment_type,withdraws.payment_method,withdraws.created_at from withdraws
               inner join fusers on withdraws.user_id=fusers.id where withdraws.status=1");
            // dd(Withdraw::where('status', 1)->get());
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><a href="' . URL::to('admin/aprove_withdraw/' . $get->id) . '" class="text-light">Approve</a></button>
                    </div>';
                    return $button;
                })
                ->addColumn('ammount', function ($get) {
                    return floatval($get->ammount * 90) / 100;
                })
                ->addColumn('charged', function ($get) {
                    return floatval($get->ammount * 10) / 100;
                })
                ->addColumn('payment_type', function ($get) {
                    if ($get->payment_type == 1) {
                        return $type = "Bank";
                    } elseif ($get->payment_type == 2) {
                        return $type = "Mobile Banking";
                    }
                })
                ->addColumn('payment_method', function ($get) {
                    if ($get->payment_type == 2) {
                        switch ($get->payment_method) {
                            case 1:
                                return "Bkash";
                                break;
                            case 2:
                                return "Rocket";
                                break;
                            case 3:
                                return "Nagad";
                                break;
                        }
                    }
                    if ($get->payment_type == 1) {
                        switch ($get->payment_method) {
                            case 1:
                                return "DBBL";
                                break;
                            case 2:
                                return "Sonali Bank";
                                break;
                        }
                    }
                })
                ->addColumn('status', function ($get) {
                    if ($get->status == 1) {
                        return "Approved";
                    } else {
                        return "Pending";
                    }
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.withdrawals.transaction');
    }
    public function PendingData()
    {
        if (request()->ajax()) {
            $total_bal = 500;
            $get = DB::select("
            	SELECT withdraws.id,fusers.name,withdraws.number,withdraws.ammount,withdraws.payment_type,withdraws.payment_method,withdraws.status,withdraws.created_at from withdraws
               inner join fusers on withdraws.user_id=fusers.id where withdraws.status=0");
            return DataTables::of($get)
                ->addIndexColumn()
                ->addColumn('action', function ($get) {
                    $button = '<div class="btn-group btn-group-toggle" data-toggle="buttons">
                       <button type="button" data-id="' . $get->id . '" class="btn btn-sm btn-primary rounded mr-1 edit" data-toggle="modal" data-target=""><a href="' . URL::to('admin/aprove_withdraw/' . $get->id) . '" class="text-light">Approve</a></button>
                    </div>';
                    return $button;
                })
                ->addColumn('ammount', function ($get) {
                    return floatval($get->ammount * 90) / 100;
                })
                ->addColumn('charged', function ($get) {
                    return floatval($get->ammount * 10) / 100;
                })
                ->addColumn('payment_type', function ($get) {
                    if ($get->payment_type == 1) {
                        return $type = "Bank";
                    } elseif ($get->payment_type == 2) {
                        return $type = "Mobile Banking";
                    }
                })
                ->addColumn('payment_method', function ($get) {
                    if ($get->payment_type == 2) {
                        switch ($get->payment_method) {
                            case 1:
                                return "Bkash";
                                break;
                            case 2:
                                return "Rocket";
                                break;
                            case 3:
                                return "Nagad";
                                break;
                        }
                    }
                    if ($get->payment_type == 1) {
                        switch ($get->payment_method) {
                            case 1:
                                return "DBBL";
                                break;
                            case 2:
                                return "Sonali Bank";
                                break;
                        }
                    }
                })
                ->addColumn('status', function ($get) {
                    if ($get->status == 1) {
                        return "Approved";
                    } else {
                        return "Pending";
                    }
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('pages.withdrawals.pending_transaction');
    }
    public function Aprove($id)
    {
        $aprove = Withdraw::find($id);
        $aprove->status = 1;
        $aprove->approved_id = auth()->user()->id;
        $aprove->save();
        if ($aprove) {
            return redirect('/admin/withdraw_transaction')->with("status", "Withdraw Aproved Success");
        }
    }
}
