@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Packages</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Home</a></li>
                        <li class="breadcrumb-item">Packages</li>
                        <li class="breadcrumb-item active">All Packages</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="card m-0">
            <div class="card-header pt-3  flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold">Packages</h5>
            </div>
            <div class="card-body px-3 px-md-5">
                <button type="button" class="btn btn-primary">
                    Add New <i class="fas fa-plus"></i>
                </button>
                <div class="table-responsive mt-2">
                    <table class="table table-sm table-bordered table-striped align-items-center display table-flush data-table">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>VP</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('yearly.sales') }}"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                },
                {
                    data: 'fuser_id',
                    name: 'fuser_id',
                },
                {
                    data: 'product_id',
                    name: 'product_id',
                },
                {
                    data: 'price',
                    name: 'price',
                },
                {
                    data: 'qantity',
                    name: 'qantity',
                },
                {
                    data: 'vp',
                    name: 'vp',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'action',
                    name: 'action',
                },
            ]
        });
    </script>
@endsection
