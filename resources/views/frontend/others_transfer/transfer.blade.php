@extends('layouts.frontend-master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Others D-wallet Transfer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transfer</li>
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
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <form action="{{ URL::to('user/others_transfer') }}" method="POST">
                            @csrf
                            <h5>
                                <span class="text-dark">Your Current Wallet Balance is :
                                    <span class="text-dark font-weight-bold">{{ $balance }} Tk</span>
                                </span>
                            </h5>
                            <h5>
                                <span class="text-danger font-weight-bolder">Note:
                                    <span class="text-dark font-weight-normal">
                                        For Transfer your balance must be
                                        <span class="text-success font-weight-bold">200</span>
                                        <span>Taka</span>
                                    </span>
                                </span>
                            </h5>

                            <!-- Amount  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " id="ammount" placeholder="Amount" name="ammount">
                                </div>
                            </div>
                            <!-- T-pin  -->
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">T-pin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="t_pin" placeholder="Enter T-pin" name="t_pin">
                                </div>
                            </div>
                            {{-- member --}}
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Member</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-control" aria-label="Default select example" name="user" id="user">
                                    </select>
                                </div>
                            </div>
                            <!-- Select Your Payment Type  -->
                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button class="btn btn-primary">Create</button>
                                </div>
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
        $('#user').select2({
            theme: 'bootstrap4',
            placeholder: 'select',
            allowClear: true,
            ajax: {
                url: "{{ URL::to('user/get_referrals_without') }}",
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
    </script>
@endsection
