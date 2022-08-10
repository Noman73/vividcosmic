@extends('layouts.frontend-master')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaction List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Home</a></li>
              <li class="breadcrumb-item">Transaction</li>
              <li class="breadcrumb-item active">Transaction List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="container">
  <div class="card m-0">
    <div class="card-header pt-3  flex-row align-items-center justify-content-between">
      <h5 class="m-0 font-weight-bold">Transaction</h5>
     </div>
    <div class="card-body px-3 px-md-5">
    <button type="button" class="btn btn-primary" onclick="addNew()">
          Add New <i class="fas fa-plus"></i>
        </button>
        <!-- Modal -->
        {{-- datatable start --}}
        {{-- <div class="container-fluid" id="container-wrapper"> --}}
            <!-- Datatables -->
                <div class="table-responsive mt-2">
                  <table class="table table-sm table-bordered table-striped align-items-center display table-flush data-table">
                    <thead class="thead-light">
                     <tr>
                        <th>SL</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Ammount</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $key=>$row)
                        <tr>
                          <td>{{ $key+=1 }}</td>
                          <td>{{ $row->user->name }}</td>
                          <td>{{ $row->user->username }}</td>
                          <td>{{ $row->amount }}</td>
                          <td>{{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
        {{-- datatable end --}}
    </div>
  </div>
</div>
@endsection

