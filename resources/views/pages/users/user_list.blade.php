@extends('layouts.master')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Home</a></li>
              <li class="breadcrumb-item">User</li>
              <li class="breadcrumb-item active">Users List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="container">
	<div class="card m-0">
    <div class="card-header pt-3  flex-row align-items-center justify-content-between">
      <h5 class="m-0 font-weight-bold">Users</h5>
     </div>
    <div class="card-body px-3 px-md-5">
		    {{-- <button type="button" class="btn btn-primary" onclick="addNew()">
          Add New <i class="fas fa-plus"></i>
        </button> --}}
       
            <button type="button" class="btn btn-primary">
              Total Users <span class="badge badge-danger">{{ isset($totalUser) ? $totalUser : 0 }}</span>
            </button>
            <button type="button" class="btn btn-success">
              Active Users <span class="badge badge-danger">{{ isset($countActiveUser) ? $countActiveUser : 0 }}</span>
            </button>
            <button type="button" class="btn btn-danger">
              Total Sales VP <span class="badge badge-warning">{{ isset($salesVP) ? $salesVP : 0 }} <b>৳</b></span>
            </button>
            <button type="button" class="btn btn-info">
              Total Sales TK <span class="badge badge-danger">{{ isset($salesTaka) ? $salesTaka : 0 }} <b>৳</b></span>
            </button>
                <div class="table-responsive mt-2">
                  <table class="table table-sm table-bordered table-striped align-items-center display table-flush data-table">
                    <thead class="thead-light">
                     <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>T-pin</th>
                        <th>Adress</th>
                        <th>Refarred By</th>
                        <th>Reffer Id</th>
                        {{-- <th>Password</th> --}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
        {{-- datatable end --}}
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
   $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }

    });
    $('.data-table').DataTable({
        processing:true,
        serverSide:true,
        ajax:{
          url:"{{ URL::to('/admin/fuser_list') }}"
        },
        columns:[
          {
            data:'DT_RowIndex',
            name:'DT_RowIndex',
            orderable:false,
            searchable:false
          },
          {
            data:'name',
            name:'name',
          },
          {
            data:'username',
            name:'username',
          },
          {
            data:'t_pin',
            name:'t_pin',
          },
          {
            data:'adress',
            name:'adress',
          },
          {
            data:'refarrar_name',
            name:'refarrar_name',
          },
          {
            data:'reffer_id',
            name:'reffer_id',
          },
          // {
          //   data:'password',
          //   name:'password',
          // },
          {
            data:'action',
            name:'action',
          },
        ]
    });
$(document).on('click','.edit',function(){
  $('#exampleModalLabel').text('Update Bank Account');
  $('.submit').text('Update');
  $('#balance').attr('disabled',true);
$('#exampleModal').modal('show');
  ModalClose();
  id=$(this).data('id');
  $('#id').val(id);
  axios.get('admin/get_banks/'+id)
  .then(function(response){
    keys=Object.keys(response.data);
    for (var i = 0; i < keys.length; i++) {
      $('#'+keys[i]).val(response.data[keys[i]]);
    }
  })
})
 //ajax request from employee.js
 </script>
@endsection
