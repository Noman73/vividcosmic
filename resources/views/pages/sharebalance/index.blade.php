@extends('layouts.master')

@section('content')
<style>
    .select2-container .select2-selection--single{
        height: 40px !important;
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        Share Balance List
                    </div>
                    @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <div class="card-body">
                        <h3 class="text-center mb-3">Activated Share Balance List</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>SL NO.</th>
                                <th>Name</th>
                                <th>UserName</th>
                                <th>Invest Amount</th>
                                <th>Share Parcent</th>
                                {{-- <th>Profit Amount</th> --}}
                                <th>Action</th>
                            </tr>
                            @php
                                $i = 1;
                                $j = 1;
                            @endphp
                            @foreach ($share_balances as $key=>$share_balance)
                            @if ($share_balance->profit_amount == 0)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ isset($share_balance->user->name) ? $share_balance->user->name : null }}</td>
                                <td>{{ isset($share_balance->user->username) ? $share_balance->user->username : null }}</td>
                                <td>{{ $share_balance->invest_amount }}</td>
                                <td>{{ $share_balance->share }}</td>
                                {{-- <td>{{ $share_balance->profit_amount }}</td> --}}
                                <td>
                                    <a href="{{ route('share.edit',$share_balance->id) }}" class="btn btn-danger btn-sm"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            {{ $share_balances->links() }} 
                        </table>
                        <h3 class="text-center my-3">Send Share Balance List</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>SL NO.</th>
                                <th>Name</th>
                                <th>UserName</th>
                                <th>Profit Amount</th>
                            </tr>
                            @foreach ($share_balances as $key=>$share_balance)
                            @if ($share_balance->invest_amount == 0 && $share_balance->share == 0)
                            <tr>
                                <td>{{ $j++ }}</td>
                                <td>{{ isset($share_balance->user->name) ? $share_balance->user->name : null }}</td>
                                <td>{{ isset($share_balance->user->username) ? $share_balance->user->username : null }}</td>
                                <td>{{ $share_balance->profit_amount }}</td>
                            </tr>
                            @endif
                            @endforeach
                            {{ $share_balances->links() }} 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection 
@section('script')
<script src="jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection

