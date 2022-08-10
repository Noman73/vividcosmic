@extends('layouts.master')
@section('content')
	  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Generation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Generation</li>
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
            	  @if (session('status'))
	                  <div class="alert alert-success">
	                      {{ session('status') }}
	                  </div>
	              @endif
	              @if($errors->any())
	                  {!! implode('', $errors->all('<div>:message</div>')) !!}
	              @endif
              <form action="{{URL::to('admin/generation')}}" method="post">
              	@csrf
                <!-- Full Name  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">1st Generation</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="first" name="first" placeholder="Enter 1st Generation Ammount" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">2nd Generation</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="second" name="second" placeholder="Enter 2nd Generation Ammount" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">3rd Generation</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="third" name="third" placeholder="Enter 3rd Generation Ammount" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">4th Generation</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="fourth" name="fourth" placeholder="Enter 4th Generation Ammount" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">5th Generation</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="fifth" name="fifth" placeholder="Enter 5th Generation Ammount" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">6th Generation</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="sixth" name="sixth" placeholder="Enter 6th Generation Ammount" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">7th Generation</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="seventh" name="seventh" placeholder="Enter 7th Generation Ammount">
                  </div>
                </div>
                <!-- Description  -->
              <!-- User Id -->
                <div class="mb-3 row">
                  <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit">Create</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection