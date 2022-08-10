@extends('layouts.frontend-master')
@section('link')
  <link rel="stylesheet" href="{{asset('public/form-css/form-design.css')}}">
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mobile Recharge </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mobile Recharge</li>
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
                  <h3 class="form-title">Mobile Recharge</h3>
                    <form class="row g-3" action="" method="post">
                      <!-- Amount -->
                      <div class="col-md-12">
                        <label for="" class="ml-2 mb-0">Amount</label>
                        <input type="text" class="gradient-bg input-text" id="inputEmail4" placeholder="Enter Recharge Amount" name="amount">
                      </div>
                      <!-- T-Pin -->
                      <div class="col-md-12">
                        <label for="" class="ml-2 mb-0">T-Pin</label>
                        <input type="text" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter T-pin" name="t_pin">
                      </div>
                      <!-- Select Your Payment Type -->
                      <div class="col-md-12">
                        <label for="" class="ml-2 mb-0">Select Operator</label>
                        <select class="form-select gradient-bg select-item" aria-label="Default select example" name="product_buy">
                          <option selected>-- Select Operator --</option>
                          <option value="1">Grameenphone</option>
                          <option value="2">Banglalink</option>
                          <option value="3">Robi</option>
                          <option value="4">Airtel</option>
                          <option value="5">Teletalk</option>
                        </select>
                      </div>
                      <!-- Mobile/Bank/Phone Number: -->
                      <div class="col-md-12">
                        <label for="" class="ml-2 mb-0">Mobile Number:</label>
                        <input type="text" class="gradient-bg input-text" id="inputEmail4" placeholder="Enter Mobile Number " name="mobile_bank">
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
