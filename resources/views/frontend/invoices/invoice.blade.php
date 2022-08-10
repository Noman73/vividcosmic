@extends('layouts.frontend-master')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buy Product</h1>
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
    <div class="container" id="invoice_page">
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
              @if($errors->any())
                  {!! implode('', $errors->all('<div>:message</div>')) !!}
              @endif
              <form action="{{URL::to('user/invoice')}}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <select class="form-control form-control-sm " name="fuser" id="fuser">
                    </select>
                    <div id="fuser_msg" class="invalid-feedback">
                    </div>
                    <div class="d-none name">
                      Name : <span id="name"><span>
                    </div>
                </div>
                
                <table class="table table-sm table-striped text-center table-bordered">
                    <head>
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Size</th>
                            <th>Qantity</th>
                            <th>Price</th>
                            <th>vp</th>
                            <th>Total Vp</th>
                            <th>Total</th>
                            <th>Select</th>
                        </tr>
                    </head>
                    <tbody> 
                        @php
                          $i=0;  
                        @endphp
                        @foreach($product as $products)
                        <tr>
                            <td width="10%">#{{$i=$i+1}}</td>
                            <td width="30%" class="text-left">{{$products->name}} <input type="hidden" name="product[]" value="{{$products->id}}"></td>
                            <td width="10%">{{$products->size}}</td>
                            <td width="10%"><input type="number" class="form-control form-control-sm qantity" name="qantity[]"></td>
                            <td width="10%"> <input type="number" disabled class="form-control form-control-sm" name="price[]" value="{{$products->sales_rate}}"></td>
                            <td width="10%">{{$products->vp}}</td>
                            <td></td>
                            <td width="10%" id="total">0.00</td>
                            <td width="10%" id="select"><input type="checkbox" class="check" name="check[]"></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="6">Total</th>
                        <th id="vp">0.00</th>
                        <th id="totalx">0.00</th>
                      </tr>
                    </tfoot>
                </table>
                <!-- Choose Your Payment Method  -->
              </form>
              <div class="mb-3 row"> 
                <div class="col-sm-10">
                  <button class="btn btn-primary" onclick="SendData()">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section("script")
<script type="text/javascript">
  function Calculation(){
  let x=0;
  let vpcal=0;
  let totalcal=0;
  var total_item=$('#total_item').val();
  var qantity=$("input[name='qantity[]']")
              .map(function(){return (($(this).val()=='')? 0:$(this).val());}).get();
 $("input[name='price[]']")
  .map(function(){
      checkbox=$(this).parent().next().next().next().next().children("input[name='check[]']").is(':checked');
      if(checkbox){
          vp=parseFloat($(this).parent().next().text())*parseFloat(qantity[x]).toFixed(2);
          price=(($(this).val()=='')? 0:$(this).val());
          total=(parseFloat(price)*parseFloat(qantity[x])).toFixed(2);
          if (!isNaN(total)) {
          $(this).parent().next().next().text(vp);
          $(this).parent().next().next().next().text(total);
          totalcal+=parseFloat(total);
          vpcal+=parseFloat(vp);
        }
      }
    x=x+1;
  }).get();
  $('#vp').text(vpcal.toFixed(2));
  $('#totalx').text(totalcal.toFixed(2));
  }
$(document).on('keyup change','.qantity, .check',function(){
    Calculation();
});
function SendData(){
    x=0;
    product=[];
    qantity=[];
    fuser=$('#fuser').val();
    $("input[name='price[]']")
  .map(function(){
      checkbox=$(this).parent().next().next().next().next().children("input[name='check[]']").is(':checked');
      console.log(checkbox);
      if(checkbox){
        product.push($(this).parent().prev().prev().prev().children("input[name='product[]']").val());
        console.log(product)
        qantity.push($(this).parent().prev().children("input[name='qantity[]']").val());
      }
      x=x+1;
    }).get();
    if(product.length<1 || qantity.length<1  || fuser==null){
      alert('Please fill up the form correctly');
      return false;
    }
    axios.post("{{URL::to('user/invoice')}}",{product:product,qantity:qantity,fuser:fuser})
    .then(response=>{
      console.log(response);
      if(response.data.message){
        window.toastr.success(response.data.message);
        $("input[name='qantity[]']")
          .map(function(){
            $(this).val('');
          }).get();
          Calculation();
      }
      if(response.data.error){
        window.toastr.error(response.data.error);
      }
    })
    }
    $('#fuser').select2({
    theme:'bootstrap4',
    placeholder:'select',
    allowClear:true,
    ajax:{
      url:"{{URL::to('admin/get_refarral')}}",
      type:'post',
      dataType:'json',
      delay:20,
      data:function(params){
        return {
          searchTerm:params.term,
          _token:"{{csrf_token()}}",
          }
      },
      processResults:function(response){
        return {
          results:response,
        }
      },
      cache:true,
    }
  })

  $('#invoice_page').on('select2:select',"select[name='fuser']", function (e){
  id=e.params.data.id;
  this_cat=$(this);
 axios.get('user/fuser_name/'+id)
      .then(function(response){
            $('#name').text(response.data);
            $('.name').removeClass('d-none');
          })
          .catch(function(error){
          console.log(error.request);
        })
 })
</script>
@endsection