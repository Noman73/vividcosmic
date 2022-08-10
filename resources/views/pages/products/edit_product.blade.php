@extends('layouts.master')
@section('content')
    @php
    // $lang=App\MultiSetting::select('value')->where('name','language')->first();
    // App::setLocale(isset($lang->value) ? $lang->value : '' );
    @endphp
@section('link')
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
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
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
                        {!! implode('', $errors->all("<div class='text-danger'>:message</div>")) !!}
                    @endif
                    <form action="{{ route('product.update', $data->id) }}" method="post" id='myForm' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Full Name  -->
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="{{ $data->name }}">
                            </div>
                        </div>

                        <!-- User Name  -->
                        <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label">Product Size</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="size" name="size" placeholder="Enter Product Size" value="{{ $data->size }}">
                            </div>
                        </div>

                        <!-- purchase rate  -->
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Purchase Rate</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="purchase_rate" name="purchase_rate" placeholder="Enter Purchase Rate" value="{{ $data->purchase_rate }}">
                            </div>
                        </div>
                        {{-- sale rate --}}
                        <div class="mb-3 row">
                            <label for="adress" class="col-sm-2 col-form-label">Sales Rate</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sales_rate" name="sales_rate" placeholder="Enter Sales Rate" value="{{ $data->sales_rate }}">
                            </div>
                        </div>
                        {{-- vp --}}
                        <div class="mb-3 row">
                            <label for="adress" class="col-sm-2 col-form-label">Vp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="vp" name="vp" placeholder="Enter Vp" value="{{ $data->vp }}">
                            </div>
                        </div>

                        {{-- nid --}}
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary ml-1" id="submit" type="submit">Save</button>
                            <button class="btn btn-secondary ml-1" onclick="Reset()">Reset</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script type="text/javascript">
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
            url: "{{ URL::to('admin/get_packages') }}",
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
    $('#refarral').select2({
        theme: 'bootstrap4',
        placeholder: 'select',
        allowClear: true,
        ajax: {
            url: "{{ URL::to('admin/get_refarral') }}",
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
    $('#placement').select2({
        theme: 'bootstrap4',
        placeholder: 'select',
        allowClear: true,
        ajax: {
            url: "{{ URL::to('admin/get_refarral') }}",
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
