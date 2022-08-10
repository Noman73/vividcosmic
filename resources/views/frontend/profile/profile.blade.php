@extends('layouts.frontend-master')
@section('content')
@section('link')
<style>
    .wallet img{
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 3px solid #222;
    }
  </style>
@endsection
   <!-- Content Header (Page header) -->
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
      <div class="row">
        <div class="col-md-12">
          <h3>Profile</h3>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="wallet text-center mb-4">
                    @php
                       if (auth()->user()->image==null) {
                           $image="https://designshack.net/wp-content/uploads/placeholder-image.png";
                       }else{
                         $image=asset('storage/fuser/'.auth()->user()->image);
                       }
                     @endphp
                   <img src="{{$image}}" alt="" class="img-fluid">
                   <div class="button mt-4">
                     <a href="#" class="btn btn-danger">ID: <strong>{{auth()->user()->username}}</strong></a>
                     <a href="#" class="btn btn-danger">VP# {{$vp}}</a>
                     <a href="#" class="btn btn-danger"><i class="fas fa-trophy"> {{$package}}</i></a>
                   </div>
                  </div>
                  <div class="worker-info">
                    <table class="table table-bordered">
                      <tr>
                        <td><i class="fas fa-user text-success"></i> Name</td>
                        <td class="text-danger">{{auth()->user()->name}}</td>
                      </tr>
                      <tr>
                        <td><i class="fas fa-envelope text-success"></i> Email</td>
                        <td class="text-danger">{{auth()->user()->email}}</td>
                      </tr>
                      <tr>
                        <td><i class="fas fa-mobile-alt text-success"></i> Phone</td>
                        <td class="text-danger">{{auth()->user()->mobile}}</td>
                      </tr>
                      <tr>
                        <td><i class="fas fa-address-card text-success"></i> National ID</td>
                        <td class="text-danger">{{auth()->user()->nid}}</td>
                      </tr>
                      <tr>
                        <td><i class="fas fa-home text-success"></i> Present Rank</td>
                        <td class="text-danger">Distributor</td>
                      </tr>
                      <tr>
                        <td><i class="fas fa-clock text-success"></i>Joining Date</td>
                        <td class="text-danger">{{Date('d-m-Y',strtotime(auth()->user()->created_at))}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
            
          </div>
        </div>
      </div>
@endsection