@extends('layouts.frontend-master')
@section('content')
@section('link')
    <link rel="stylesheet" href="{{ asset('form-css/form-design.css') }}">
    <style type="text/css">
        .file {
            border: 1px solid #ccc;
            display: inline-block;
            width: 100px;
            cursor: pointer;
            background-color: green;
            color: white;
        }

        .file:hover {
            background-color: #fff000;
        }

        .image-upload {
            margin: 0 auto;
        }

        .control-label {
            padding-right: 15px;
        }

        .input-group {
            margin-top: 5px;
        }

        .form-control:focus {
            background-color: rgb(188, 248, 240);
        }

    </style>
@endsection
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
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
                        <h3 class="form-title">Edit Profile</h3>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            {!! implode('', $errors->all("<div class='text-danger'>:message</div>")) !!}
                        @endif
                        <form class="row g-3" action="{{ URL::to('user/user_update') }}" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <a class="btn btn-info btn-sm float-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Add Nominee +
                                </a>
                            </div>
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="data_id" value="{{ $data->id }}" {{ $data->id == null ? '' : 'readonly' }}>
                            <!-- Full name -->
                            <div class="col-md-6">
                                <label>Full Name:</label>
                                <input type="text" class="gradient-bg input-text" id="name" placeholder="Enter Full name" name="name" value="{{ $data->name }}" {{ $data->name == null ? '' : 'readonly' }}>
                            </div>
                            <!-- Mobile -->
                            <div class="col-md-6">
                                <label>Mobile No:</label>
                                <input type="text" class="gradient-bg input-text" id="mobile" placeholder="Enter Mobile " name="mobile" value="{{ $data->mobile }}" {{ $data->mobile == null ? '' : 'readonly' }}>
                            </div>
                            <!-- NID -->
                            <div class="col-md-6">
                                <label>NID NO:</label>
                                <input type="text" class="gradient-bg input-text" id="nid" placeholder="Enter NID NO" name="nid" value="{{ $data->nid }}" {{ $data->nid == null ? '' : 'readonly' }}>
                            </div>
                            <div class="col-md-6">
                                <label>Date Of Birth:</label>
                                <input type="text" class="gradient-bg input-text" id="birth_date" placeholder="Birth Date" name="birth_date" value="{{ $data->birth_date }}" {{ !empty($data->birth_date) ? 'disabled' : '' }}>
                            </div>
                            <!-- E-mail -->
                            <div class="col-md-6">
                                <label>Email:</label>
                                <input type="email" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter E-mail address" name="email" value="{{ $data->email }}" {{ $data->email == null ? '' : 'readonly' }}>
                            </div>
                            <div class="col-md-6">
                                <label>Address:</label>
                                <input type="text" class="gradient-bg input-text" id="adress" placeholder="Enter Adress ..." name="adress" value="{{ $data->adress }}" {{ $data->adress == null ? '' : 'readonly' }}>
                            </div>
                            <!-- Product Buy -->
                            <div class="col-md-6">
                                <label>T-Pin:</label>
                                <input type="number" class="gradient-bg input-text" id="t_pin" placeholder="T-pin" name="t_pin" value="{{ $data->t_pin }}" {{ $data->t_pin == null ? '' : 'readonly' }}>
                            </div>
                            <!-- image -->
                            <div class="col-md-6">
                                <label>Profile Picture:</label>
                                <input type="file" class="gradient-bg input-text" id="inputPassword4" placeholder="image" name="image">
                            </div>


                            <div class="collapse col-md-12" id="collapseExample">
                                <div class="row">
                                    {{-- Nominee Name --}}
                                    <div class="col-md-6">
                                        <label>Nominee Name:</label>
                                        <input type="text" class="gradient-bg input-text" id="nominee_name" placeholder="Nominee Name" name="nominee_name" value="{{ $data->nominee_name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nominee ID:</label>
                                        <input type="text" class="gradient-bg input-text" id="nominee_id" placeholder="Nominee ID" name="nominee_id" value="{{ $data->nominee_id }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nominee Relationship:</label>
                                        <input type="text" class="gradient-bg input-text" id="nominee_relationship" placeholder="Relationship with Nomine " name="nominee_relationship" value="{{ $data->nominee_relationship }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nominee Mobile:</label>
                                        <input type="number" class="gradient-bg input-text" id="nominee_mobile" placeholder="Nominee Mobile " name="nominee_mobile" value="{{ $data->nominee_mobile }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="custom-button button-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')

<script type="text/javascript">
    // document.getElementById("submit").addEventListener("click", function(event){
    //   event.preventDefault()
    // let name=$('#name').val();
    // let username=$('#username').val();
    // let email=$('#email').val();
    // let adress=$('#adress').val();
    // let adress=$('#nid').val();
    // let adress=$('#birth_date').val();
    // let adress=$('#password').val();
    // let adress=$('#password_confirmation').val();
    // let adress=$('#mobile').val();
    // let adress=$('#t-pin').val();
    // let adress=$('#referral').val();
    // let adress=$('#package').val();
    // let file=document.getElementById('file').files;
    // let formData= new FormData();
    // formData.append('name',name);
    // formData.append('email',email);
    // formData.append('adress',adress);
    // formData.append('nid',nid);
    // formData.append('birth_date',birth_date);
    // formData.append('password',password);
    // formData.append('password_confirmation',password_confirmation);
    // formData.append('mobile',mobile);
    // formData.append('t-pin',t_pin);
    // formData.append('refarral',refarral);
    // formData.append('package',package);
    // formData.append('city',city);
    // if (file[0]!=null) {
    //   formData.append('photo',file[0]);
    // }
    // });
    $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ URL::to('/admin/all-customer') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'phone1',
                name: 'phone1',
            },
            {
                data: 'adress',
                name: 'adress',
            },
            {
                data: 'action',
                name: 'action',
            }
        ]
    });
    // read Image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagex').setAttribute('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('click', '.edit', function() {
        $('#exampleModalLabel').text("@lang('key.customer.customer.title_update')");
        $('.submit').text("@lang('key.buttons.update')");
        $('#Modalx').modal('show');
        id = $(this).data('id');
        $('#id').val(id);
        axios.get('admin/get-customer/' + id)
            .then(function(response) {
                var keys = Object.keys(response.data[0]);
                for (var i = 0; i < keys.length; i++) {
                    if (keys[i] !== 'opening_balance') {
                        $('#' + keys[i]).val(response.data[0][keys[i]])
                    } else {
                        if (parseFloat(response.data[0][keys[i]]) > 0) {
                            $('#' + keys[i]).val(response.data[0][keys[i]])
                            $('#balance_type').val(1)
                        } else {
                            $('#' + keys[i]).val(response.data[0][keys[i]])
                            $('#balance_type').val(0)
                        }
                    }
                }
                $('#imagex').attr('src', '{{ asset('storage/customer') }}/' + ((response.data[0]['photo'] == null) ? 'fixed.jpg' : response.data[0]['photo']))
            })
    })

    function AddNew() {
        document.getElementById('myForm').reset();
        $('#id').val('');
        $('#exampleModalLabel').text("@lang('key.customer.customer.title_modal')");
        $('#imagex').attr("src", "{{ URL::to('storage/admin-lte/dist/img/avatar5.png') }}");
        $('.submit').text("@lang('key.buttons.save')");
        $('#Modalx').modal('show');
    }
    //ajax request from employee.js

    $('table').on('click', '.delete', function() {
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
                    var id = $(this).data('id');
                    axios.delete('/admin/customer/' + id, {
                            _method: 'DELETE'
                        })
                        .then((res) => {
                            if (res.data.message == 'success') {
                                window.toastr.success('Supplier Deleted Success');
                                $('.data-table').DataTable().ajax.reload();
                            }
                        })
                        .catch((error) => {
                            console.log(error.request);
                            alert(JSON.parse(error.request.response).message)
                        })
                }
            });
    })

    function ModalClose() {
        document.getElementById('myForm').reset();
        $('#photo').attr('src', 'http://localhost/accounts/public/storage/admin-lte/dist/img/avatar5.png');
        $('.invalid-feedback').hide();
        $('input').css('border', '1px solid rgb(209,211,226)');
        $('select').css('border', '1px solid rgb(209,211,226)');
        $('#Modalx').modal('hide')
    }

    function Reset() {
        document.getElementById('myForm').reset();
    }
    // $('#birth_date,#mariage_date').daterangepicker({
    //        showDropdowns: true,
    //        singleDatePicker: true,
    //        locale:{
    //            format: 'DD-MM-YYYY',
    //            separator:' to ',
    //            customRangeLabel: "Custom",
    //        },
    //        minDate: '01-01-1970',
    //        maxDate: '01/01/2050'
    //  })
    $('#package').select2({
        theme: 'bootstrap4',
        placeholder: 'select',
        allowClear: true,
        ajax: {
            url: "{{ URL::to('user/get_packages') }}",
            type: 'post',
            dataType: 'json',
            delay: 20,
            data: function(params) {
                return {
                    searchTerm: params.term,
                    _token: "{{ csrf_token() }}",
                }
            },
            processResults: function(response) {
                return {
                    results: response,
                }
            },
            cache: true,
        }
    })
    $('#birth_date').daterangepicker({
        showDropdowns: true,
        singleDatePicker: true,
        locale: {
            format: 'DD-MM-YYYY',
            separator: ' to ',
            customRangeLabel: "Custom",
        },
        minDate: '01-01-1970',
        maxDate: '01/01/2050'
    })
</script>
@endsection
