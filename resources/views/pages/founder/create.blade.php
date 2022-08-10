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
                        Add Founder
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            {!! implode('', $errors->all("<div class='text-danger'>:message</div>")) !!}
                        @endif
                        <form action="{{ route('active.founder.balance') }}" method="POST" >@csrf
                            <label for="">Select User</label>
                            <select class="form-select form-control select2" aria-label="Default select example" style="width: 100%;" name="fuser_id" id="selectUser">
                                <option value="" selected>-- Select User --</option>
                                @foreach ($fusers as $fuser)
                                    <option value="{{ $fuser->id }}">{{ $fuser->name }} ({{ $fuser->username }})</option>
                                @endforeach
                            </select>
                              <div id="details" class="text-success"></div>
                              <div class="row mt-5">
                                  <div class="col-md-6">
                                      <label for="">Invest Amount</label>
                                      <input type="number" class="form-control" name="invest_amount" placeholder="Invest Amount">
                                  </div>
                                  <div class="col-md-6">
                                      <label for="">Share Parcent</label>
                                      <input type="number" class="form-control" name="share" placeholder="Share Parcent">
                                  </div>
                                    {{-- <div class="col-md-4">
                                        <label for="">Profit Amount</label>
                                        <input type="number" class="form-control" name="profit_amount" placeholder="Profit Amount">
                                    </div> --}}

                              </div>
                              <div class="row mt-2">
                                  <div class="col-md-12">
                                      <button class="btn btn-primary" type="submit">ACTIVE</button>
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
<script src="jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
{{-- <script>
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
</script>     --}}
@endsection

