@extends('layouts.master')
@section('content');
	  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Packages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Packages</li>
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
              <form action="{{URL::to('admin/package_edit')}}" method="post">
              	@csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="data_id" value="{{$data->id}}">
                <!-- Full Name  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Package Name</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="name" name="name" placeholder="Package Name" value="{{$data->name}}">
                  </div>
                </div>

                <!-- Description  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                     <textarea id="maxlength-textarea" class="form-control" rows="4" placeholder="Enter Description" id="description" name="description" value="{{$data->description}}"></textarea>
                  </div>
                </div>

                <!-- Full Name  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="ammount" name="ammount" placeholder="Enter Amount" value="{{$data->ammount}}">
                  </div>
                </div>


                <!-- Commision  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Refer Comission</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="comission" name="comission" placeholder="Enter Commission" value="{{$data->comission}}">
                  </div>
                </div>

                <!-- Genarel  Commission -->

                <!-- Status -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select type="text"  class="form-control" id="status" name="status" value="$data->status">
                    	<option value="1">Active</option>
                    	<option value="0">Deactive</option>
                    </select>
                  </div>
                </div>
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