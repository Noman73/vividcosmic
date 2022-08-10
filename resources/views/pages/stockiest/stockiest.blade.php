@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stockiest</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stockiest</li>
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
                        @if ($errors->any())
                            {!! implode('', $errors->all("<div class='mb-1'><div class='text-danger text-center'>:message</div></div>")) !!}
                        @endif
                        <form action="{{ URL::to('admin/stockiest') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Full Name  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                            </div>

                            <!-- Description  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Adress</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="adress" name="adress" placeholder="Enter Adress">
                                </div>
                            </div>

                            <!-- Full Name  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number">
                                </div>
                            </div>
                            <!-- Commision  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="eamil" class="form-control" id="email" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <!-- Commision  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Company Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company Name">
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
