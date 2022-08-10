@extends('layouts.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orphan Fund</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orphan</li>
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
                        <form action="{{ route('orphan.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Full Name  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $data->name }}">
                                </div>
                            </div>

                            <!-- Description  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" value="{{ $data->mobile }}">
                                </div>
                            </div>

                            <!-- Full Name  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Adress</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="adress" name="adress" placeholder="Enter Adress" value="{{ $data->adress }}">
                                </div>
                            </div>
                            <!-- Commision  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Ammount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ammount" name="ammount" placeholder="Enter Ammount" value="{{ $data->ammount }}">
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="image">
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
