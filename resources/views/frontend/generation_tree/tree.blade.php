@extends('layouts.frontend-master')
@section('content')
@section('link')
    @php
    $image = asset('storage/man/man.png');
    $owner_image = $left->image ?? false;
    $owner_image = $owner_image ? asset('storage/fuser/' . $owner->image) : $image;
    $left_image = $left->image ?? false;
    $left_image = $left_image ? asset('storage/fuser/' . $left->image) : $image;
    $right_image = $right->image ?? false;
    $right_image = $right_image ? asset('storage/fuser/' . $right->image) : $image;
    @endphp
    <link rel="stylesheet" href="{{ asset('frontpage/css/tree.css') }}">
@endsection

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tree View</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tree View</li>
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
                        <div class="tree">
                            <div class="body genealogy-body genealogy-scroll">
                                <div class="genealogy-tree">
                                    <ul>
                                        <li>
                                            <a href="">
                                                <div class="member-view-box">
                                                    <div class="member-image">
                                                        <a href="#" class="text-danger">
                                                            <i class="fas fa-plus-square" style="font-size:16px"></i>
                                                        </a>

                                                        <img src="{{ $owner_image }}" alt="Member">
                                                        <a href="#" class="text-danger">
                                                            <i class="fas fa-minus-square" style="font-size:16px"></i>
                                                        </a>
                                                        <div class="status {{ $owner == null ? 'text-danger' : 'text-success' }}">
                                                            <i class="fas {{ $owner == null ? 'fa-times-circle' : 'fa-check-circle' }}"></i>
                                                        </div>

                                                        <div class="member-details">
                                                            <h6>
                                                                {!! $owner == null ? 'unknown' : $owner->name . '<br>' . $owner->username !!}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <ul class="active">
                                                <li>
                                                    <a href="{{ $left == null ? '' : URL::to('user/tree/' . $left->id) }}">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{ $left_image }}" alt="Member">
                                                                <div class="status {{ $left == null ? 'text-danger' : 'text-success' }}">
                                                                    <i class="fas {{ $left == null ? 'fa-times-circle' : 'fa-check-circle' }}"></i>
                                                                </div>
                                                                <div class="member-details">
                                                                    <h6>
                                                                        {!! $left == null ? 'unknown' : $left->name . '<br>' . $left->username !!}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ $right == null ? '' : URL::to('user/tree/' . $right->id) }}">
                                                        <div class="member-view-box">
                                                            <div class="member-image">
                                                                <img src="{{ $right_image }}" alt="Member">
                                                                <div class="status {{ $right == null ? 'text-danger' : 'text-success' }}">
                                                                    <i class="fas {{ $right == null ? 'fa-times-circle' : 'fa-check-circle' }}"></i>
                                                                </div>
                                                                <div class="member-details">
                                                                    <h6>
                                                                        {!! $right == null ? 'unknown' : $right->name . '<br>' . $right->username !!}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
