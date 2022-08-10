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
                        Founder Balance List
                    </div>
                    @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <div class="card-body">
                        <h3 class="text-center my-3">Activated Founder List</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>SL NO.</th>
                                <th>Name</th>
                                <th>UserName</th>
                                <th>Invest Amount</th>
                                <th>Share Parcent</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($founders as $key=>$founder)
                            @if ($founder->profit_amount == 0)      
                            <tr>
                                <td>{{ $key +=1 }}</td>
                                <td>{{ isset($founder->user->name) ? $founder->user->name : null }}</td>
                                <td>{{ isset($founder->user->username) ? $founder->user->username : null }}</td>
                                <td>{{ $founder->invest_amount }}</td>
                                <td>{{ $founder->share }}</td>
                                {{-- <td>{{ $founder->profit_amount }}</td> --}}
                                <td>
                                    <a href="{{ route('founder.edit',$founder->id) }}" class="btn btn-danger btn-sm"><i class="far fa-edit"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            {{ $founders->links() }} 
                        </table>
                        <h3 class="text-center my-3">Send Founder Balance List</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>SL NO.</th>
                                <th>Name</th>
                                <th>UserName</th>
                                {{-- <th>Invest Amount</th> --}}
                                {{-- <th>Share Parcent</th> --}}
                                <th>Profit Amount</th>
                            </tr>
                            @foreach ($founders as $key=>$founder)
                            @if ($founder->invest_amount == 0 && $founder->share == 0)      
                            <tr>
                                <td>{{ $key +=1 }}</td>
                                <td>{{ isset($founder->user->name) ? $founder->user->name : null }}</td>
                                <td>{{ isset($founder->user->username) ? $founder->user->username : null }}</td>
                                {{-- <td>{{ $founder->invest_amount }}</td> --}}
                                {{-- <td>{{ $founder->share }}</td> --}}
                                <td>{{ $founder->profit_amount }}</td>
                               
                            </tr>
                            @endif
                            @endforeach
                            {{ $founders->links() }} 
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
<script>
    $(document).ready(function(){
        $("#selectUser").on('change' , function(){
            var user_id = $("#selectUser").val();
            $.get("{{ route('get_user','') }}/" + user_id,
                function(data){
                    data = JSON.parse(data);
                    data.forEach(function(element){
                        var details =`<ul>
                                <li><span>Name: </span>`+ element.name+`</li>   
                                <li><span>E-mail: </span>`+ element.email+`</li>  
                                <li><span>Address: </span>`+ element.address+`</li>  
                                <li><span>NID: </span>`+ element.nid+`</li>  
                                <li><span>Country: </span>`+ element.country+`</li>  
                                <li><span>Mobile: </span>`+ element.mobile+`</li>  
                                <li><span>Date Of Birth: </span>`+ element.birth_date+`</li>  
                                <li><span>T-pin: </span>`+ element.t_pin+`</li>  
                                <li><span>T-pin: </span>`+ element.t_pin+`</li>     
                                </ul>`; 
                        $("#details").html(details);
                  });
                }
            )
        });
    });
</script>    
@endsection

