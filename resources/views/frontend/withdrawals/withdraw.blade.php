@extends('layouts.frontend-master')
@section('link')
    <link rel="stylesheet" href="{{ asset('form-css/form-design.css') }}">
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Withdraw</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Withdraw</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="form-title">withdraw</h3>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
                            <form class="row g-3" action="{{ URL::to('/user/withdraw') }}" method="post">
                                @csrf
                                <!-- Amount -->
                                <div class="ml-2 col-md-12">
                                    <h5>
                                        <span class="text-dark">Your Wallet Balance is :
                                            <span class="text-success font-weight-bold">{{ $balance }}</span> Tk
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-md-12">
                                    <label for="" class="ml-2 mb-0">Amount</label>
                                    <input type="text" class="gradient-bg input-text" id="inputEmail4" placeholder="Enter Withdraw Amount" name="ammount">
                                </div>
                                <!-- T-Pin -->
                                <div class="col-md-12">
                                    <label for="" class="ml-2 mb-0">T-Pin</label>
                                    <input type="text" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter T-pin" name="t_pin">
                                </div>


                                <!-- Select Your Payment Type -->
                                <div class="col-md-12">
                                    <label for="" class="ml-2 mb-0">Select Your Payment Type</label>
                                    <select class="form-select gradient-bg select-item" aria-label="Default select example" name="payment_type" id="payment_type">
                                        <option value="">-- Select your Payment Type --</option>
                                        <option value="1">Bank</option>
                                        <option value="2">Mobile Banking</option>
                                    </select>
                                </div>
                                {{-- select bank --}}
                                <div class="col-md-12 d-none">
                                    <label for="" class="ml-2 mb-0">Select Bank</label>
                                    <select class="form-select gradient-bg select-item" aria-label="Default select example" name="bank" id="bank">
                                        <option value="">-- Select Bank --</option>
                                        <option value="1">DBBL</option>
                                        <option value="2">Sonali Bank</option>
                                    </select>
                                </div>
                                {{-- mobile Bank --}}
                                <div class="col-md-12 d-none">
                                    <label for="" class="ml-2 mb-0">Select Mobile Bank</label>
                                    <select class="form-select gradient-bg select-item" aria-label="Default select example" name="mobile_bank" id="mobile_bank">
                                        <option value="">-- Select Mobile Bank --</option>
                                        <option value="1">Bkash</option>
                                        <option value="2">Rocket</option>
                                        <option value="3">Nagad</option>
                                    </select>
                                </div>
                                <!-- Mobile/Bank/Phone Number: -->
                                <div class="col-md-12">
                                    <label for="" class="ml-2 mb-0">Mobile/Bank Number:</label>
                                    <input type="text" class="gradient-bg input-text" id="inputEmail4" placeholder="Enter Account Number " name="number">
                                </div>
                                <!-- Choose Your Payment Method -->
                                <div class="col-12 mt-3">
                                    <button type="submit" class="custom-button button-primary">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $('#payment_type').change(function() {
            console.log('121323')
            if ($(this).val() == 1) {
                $('#bank').parent().removeClass('d-none');
                $('#mobile_bank').parent().addClass('d-none');
            } else if ($(this).val() == 2) {
                $('#mobile_bank').parent().removeClass('d-none');
                $('#bank').parent().addClass('d-none');
            }
        })
    </script>
@endsection
