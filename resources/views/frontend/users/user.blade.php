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

        .select2-selection {
            height: auto !important;
            background: linear-gradient(90deg, #0186ff 0%, #0186ff 35%, #00edff 100%) !important;
            border-radius: 50px !important;
        }

        span .first {
            color: white !important;
        }

    </style>

@endsection
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    @if ($errors->any())
                        {!! implode('', $errors->all("<div class='text-danger text-center'>:message</div>")) !!}
                    @endif
                    <div class="card-body">
                        <h3 class="form-title">Create Account</h3>
                        <form class="row g-3" action="{{ URL::to('user/user') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Full name -->
                            <div class="col-md-6">
                                <input type="text" class="gradient-bg input-text" id="inputEmail4" placeholder="Enter Full name" name="name">
                            </div>
                            <!-- User Id -->
                            <div class="col-md-6">
                                <input type="text" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter User Name" name="username">
                            </div>
                            <!-- Mobile -->
                            <div class="col-md-6">
                                <input type="text" class="gradient-bg input-text" id="inputEmail4" placeholder="Enter Mobile " name="mobile">
                            </div>
                            <!-- NID -->
                            <div class="col-md-6">
                                <input type="text" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter NID NO" name="nid">
                            </div>
                            {{-- adress --}}
                            <div class="col-md-6">
                                <input type="text" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter adress" name="adress">
                            </div>
                            {{-- adress --}}
                            <div class="col-md-6 d-flex align-items-center">
                                <select id="country" class="gradient-bg select-item" aria-label="Default select example" name="country" id="country">
                                    @include('frontend.users.country_option')
                                </select>
                            </div>
                            <!-- E-mail -->
                            <div class="col-md-6">
                                <input type="email" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter E-mail address" name="email">
                            </div>
                            <!-- Refer Id -->
                            <div class="col-md-6 d-flex align-items-center">
                                <select id="refferal" class="form-select gradient-bg select-item" aria-label="Default select example" name="refarral" id="refarral">
                                    <option value="" class="first" selected>-- Select Refferal --</option>
                                    @foreach ($fuser as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Placement Id -->
                            <div class="col-md-6 d-flex align-items-center">
                                <select id="placement" class="form-select gradient-bg select-item" aria-label="Default select example" name="placement" id="placement">
                                    <option value="" class="first" selected>-- Select Placement --</option>
                                    @foreach ($fuser as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Product Buy -->
                            <div class="col-md-6 d-flex align-items-center">
                                <select id="position" class="form-select gradient-bg select-item" aria-label="Default select example" name="position" id="position">
                                    <option value="" class="first" selected>-- Select Position--</option>
                                    <option value="1">left</option>
                                    <option value="2">right</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter T-pin" name="t_pin">
                            </div>
                            <!-- Password -->
                            <div class="col-md-6">
                                <input type="password" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter Password" name="password">
                            </div>
                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <input type="password" class="gradient-bg input-text" id="inputPassword4" placeholder="Enter Confirm Password" name="password_confirmation">
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="gradient-bg input-text" id="image" name="image">
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

<script>
    $("#country").select2()
    ''
    $("#refferal").select2()
    ''
    $("#placement").select2()
    ''
    $("#position").select2()
    ''
</script>
@endsection
