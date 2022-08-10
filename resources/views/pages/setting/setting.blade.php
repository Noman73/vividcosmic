@extends('layouts.master')
@section('content')
	  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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
                    {!! implode('', $errors->all("<div class='text-danger'>:message</div>")) !!}
                  @endif
              <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
              	@csrf
                <!-- Full Name  -->
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Generation 1</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" id="gen1" name="gen1" placeholder="0.00" value="{{$gen->gen1}}">
                  </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 2</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="gen2" name="gen2" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 3</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="gen3" name="gen3" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 4</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="gen4" name="gen4" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 5</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="gen5" name="gen5" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 6</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="gen6" name="gen6" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 7</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen7" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 8</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen8" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 9</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen9" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 10</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen10" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 11</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen11" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 12</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen12" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 13</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen13" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 14</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen14" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 15</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen15" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 16</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen16" placeholder="0.00" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Generation 17</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control" id="name" name="gen17" placeholder="0.00" >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection