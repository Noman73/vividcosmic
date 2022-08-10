@extends('layouts.master')
@section('content');
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
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="" method="">
                <h2>Your Balance 100 TAKA</h2>
                <h6><span class="text-danger">for withdrow your balance muse be </span><span class="text-success font-weight-bold">500</span><span class="text-danger">TAKA</span>  </h6>

                <!-- Amount  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="" placeholder="Amount" name="amount">
                  </div>
                </div>

                <!-- T-pin  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">T-pin</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="" placeholder="Enter T-pin" name="t-pin">
                  </div>
                </div>

                <!-- Select Country  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Select Country</label>
                  <div class="col-sm-10">
                    <select class="form-select form-control" aria-label="Default select example" name="select_country">
                    <option selected>-- Please Select --</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  </div>
                </div>

                <!-- Mobile Bank Phone No:  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Mobile Bank Phone No:</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="" placeholder="Enter your Mobile Bank" name="mobile_bank_number">
                  </div>
                </div>

                <!-- Select Your Payment Type  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Select your payment Type</label>
                  <div class="col-sm-10">
                    <select class="form-select form-control" aria-label="Default select example" name="payment_type">
                    <option selected>-- Please Select --</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  </div>
                </div>
                
                <!-- Choose Your Payment Method  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Choose Your Payment Method</label>
                  <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1"><img src="" alt=""></label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2"><img src="" alt=""></label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio3" value="option3">
                    <label class="form-check-label" for="inlineRadio3"><img src="" alt=""></label>
                  </div>
                  </div>
                </div>
                
                
              
                <div class="mb-3 row">
                  
                  <div class="col-sm-10">
                    <button class="btn btn-primary">Create</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
