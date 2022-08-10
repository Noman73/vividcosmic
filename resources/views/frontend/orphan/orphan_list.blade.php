@extends('layouts.frontend-master')
@section('content')
@section('link')
@endsection
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orphan List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Home</a></li>
              <li class="breadcrumb-item">Orphan</li>
              <li class="breadcrumb-item active">Orphan List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="container">
	<div class="card m-0">
    <div class="card-header pt-3  flex-row align-items-center justify-content-between">
      <h5 class="m-0 font-weight-bold">Orphan</h5>
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
                  <table class="table table-sm table-bordered table-striped align-items-center display table-flush data-table text-center">
                    <thead class="thead-light">
                     <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Adress</th>
                        <th>Ammount</th>
                        <th>Photos</th>
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
          url:"{{ URL::to('/user/orphan_list') }}"
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
            data:'mobile',
            name:'mobile',
          },
          {
            data:'adress',
            name:'adress',
          },
          {
            data:'ammount',
            name:'ammount',
          },
          {
            data:'images',
            render:function(data){
                return '<img src="data:image/gif;base64,{0},' + data + '" />';
            },
          },
        ],
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

$('table').on('click','.delete',function(){
     Swal.fire({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  showCancelButton: true,
  // dangerMode: true,
  confirmButtonColor: "#DD6B55",
  cancelButtonText: "CANCEL",
  confirmButtonText: "CONFIRM",
})
.then((isConfirmed) => {
  if (isConfirmed.isConfirmed) {
  var id=$(this).data('id');
    axios.delete('/admin/invoice/'+id,{_method:'DELETE'})
      .then((res)=>{
        if (res.data.message) {
          window.toastr.success(res.data.message);
          $('.data-table').DataTable().ajax.reload();
        }
      })
      .catch((error)=>{
        alert((JSON.parse(error.request.response)).message);
      })
  }
});
 })
 //ajax request from employee.js
 </script>
@endsection
