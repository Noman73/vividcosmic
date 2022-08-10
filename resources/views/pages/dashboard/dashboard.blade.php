@extends('layouts.master')
@section('content')
@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .icon {
            font-size: 25px;
            float: left;
        }

        .text {
            float: right;
        }

        .number {
            float: left;
            padding-top: 5px;
        }

        .number h6 {
            margin-bottom: 0px;
        }

        .hr {
            margin-top: 40px;
            margin-bottom: 0px;
        }

        .row1 .card1 {
            background-color: #1B1464;
            color: #FFF;
        }

        .row1 .card2 {
            background-color: #0652DD;
            color: #FFF;
        }

        .row1 .card3 {
            background-color: #009432;
            color: #FFF;
        }

        .row1 .card4 {
            background-color: #EE5A24;
            color: #FFF;
        }

        .row2 .card1 {
            background-color: #1B1464;
            color: #FFF;
        }

        .row2 .card2 {
            background-color: #0652DD;
            color: #FFF;
        }

        .row2 .card3 {
            background-color: #009432;
            color: #FFF;
        }

        .row2 .card4 {
            background-color: #EE5A24;
            color: #FFF;
        }

        .row3 .card1 {
            background-color: #1B1464;
            color: #FFF;
        }

        .row3 .card2 {
            background-color: #0652DD;
            color: #FFF;
        }

        .row3 .card3 {
            background-color: #009432;
            color: #FFF;
        }

        .row3 .card4 {
            background-color: #EE5A24;
            color: #FFF;
        }


        .row4 .card1 {
            background-color: #1B1464;
            color: #FFF;
        }

        .row4 .card2 {
            background-color: #0652DD;
            color: #FFF;
        }

        .row4 .card3 {
            background-color: #009432;
            color: #FFF;
        }

        .row4 .card4 {
            background-color: #EE5A24;
            color: #FFF;
        }

        .row4 .card5 {
            background-color: #A3CB38;
            color: #FFF;
        }

    </style>
@endsection
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="container">
    @if (Session::has('status'))
        <p class="alert alert-info">{{ Session::get('status') }}</p>
    @endif
    <div class="row  justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center my-2">
                        <h3 class="d-inline my-0">DASHBOARD</h3>
                        
                        <button type="button" class="btn btn-sm btn-info ml-auto" data-toggle="modal" data-target="#centralBonus">
                            <i class="nav-icon fas fa-gifts"></i> Distribute CB
                        </button>
                        <div class="modal fade" id="centralBonus" tabindex="-1" aria-labelledby="centralBonusLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="centralBonusLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('do.cron.central.bonus.distribute') }}" method="GET>
                                  @csrf
                                  @method('GET')
                                  <div class="form-group">
                                    <label for="centralBonusAmount">Bonus Amount</label>
                                    <div class="input-group mb-3">
                                      <input name="amount" type="text" class="form-control" placeholder="Central Bonus">
                                      <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row row1">
                        <div class="col-md-3">
                            <div class="dashobard1">
                                <div class="card card1">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="text">
                                            <span>NEW TRANSCTION</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card2">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                        <div class="text">
                                            <span>DAILY CLUB MONEY</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">3000</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card3">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>DAILY CLUB MEMBER</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">3</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card4">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>USER</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">50</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>LEVEL</h3>
                    <div class="row row2">
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card1">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="text">
                                            <span>SMART CLUB MEMBER</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">2</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card2">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                        <div class="text">
                                            <span>SCHOLAR CLUB MEMBER</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">1</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card3">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>MO</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">1980</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card4">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>ML</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">1650</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>LEVEL</h3>
                    <div class="row row3">
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card1">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="text">
                                            <span>MM</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">1320</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card2">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                        <div class="text">
                                            <span>AGM</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">990</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card3">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>GM</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">660</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card4">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>RANK IN MEMEBER</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">49</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>LEVEL</h3>
                    <div class="row row4">
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card1">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="text">
                                            <span>RANK IN MO</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">3</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card2">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                        <div class="text">
                                            <span>RANK IN ML</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card3">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>RANK IN MM</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card4">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>RANK IN AGM</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dashobard">
                                <div class="card card5">
                                    <div class="card-body">
                                        <div class="icon" class="text-success">
                                            <i class="fas fa-user-plus"></i>
                                        </div>
                                        <div class="text">
                                            <span>RANK IN GM</span>
                                        </div>
                                        <hr class="hr" style="border-top: 3px solid red;">
                                        <div class="number">
                                            <h4 class="font-weight-bold">0</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@endsection
