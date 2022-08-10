@extends('layouts.frontend-master')
@section('link')
<style>
  .title{
    text-align: center;
    font-weight: bold;
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
    padding: 15px;
    color: #fff;
    border-radius: 50px;
    margin-bottom: 30px;
  }
  
.row_color_1{
  background: #C4E538 !important;

}
.row_color_2{
  background: #1289A7 !important;
}
</style>
@endsection
@section('content')
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
              <div class="card">
                <div class="card-body" style="background: #009432">
                  <h3 class="title">GENERATION INFORMATION</h3>
                  <table class="table table-borderless table1 text-center table-striped">
                    <tbody>
                    <tr>
                        <th>Generation</th>
                        <th>Total Member</th>
                        <th>Total Income</th>
                    </tr>
                    {{-- {{dd($data['gen13']['count'])}} --}}
                    <tr  class="row_color_1">
                      <th>Generation 1:</th>
                      <th>{{$data['gen1']['count']}}</th>
                      <th>{{$data['gen1']['ammount']}}</th>
                    </tr>
                    <tr  class="row_color_2">
                      <th>Generation 2:</th>
                      <th>{{$data['gen2']['count']}}</th>
                      <th>{{$data['gen2']['ammount']}}</th>
                    </tr>
                    <tr  class="row_color_1">
                      <th>Generation 3:</th>
                      <th>{{$data['gen3']['count']}}</th>
                      <th>{{$data['gen3']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_2">
                      <th>Generation 4:</th>
                      <th>{{$data['gen4']['count']}}</th>
                      <th>{{$data['gen4']['ammount']}}</th>
                    </tr>
                    <tr  class="row_color_1">
                      <th>Generation 5:</th>
                      <th>{{$data['gen5']['count']}}</th>
                      <th>{{$data['gen5']['ammount']}}</th>
                    </tr>
                    <tr  class="row_color_2">
                      <th>Generation 6:</th>
                      <th>{{$data['gen6']['count']}}</th>
                      <th>{{$data['gen6']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_1">
                      <th>Generation 7:</th>
                      <th>{{$data['gen7']['count']}}</th>
                      <th>{{$data['gen7']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_2">
                      <th>Generation 8:</th>
                      <th>{{$data['gen8']['count']}}</th>
                      <th>{{$data['gen8']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_1">
                      <th>Generation 9:</th>
                      <th>{{$data['gen9']['count']}}</th>
                      <th>{{$data['gen9']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_2">
                      <th>Generation 10:</th>
                      <th>{{$data['gen10']['count']}}</th>
                      <th>{{$data['gen10']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_1">
                      <th>Generation 11:</th>
                      <th>{{$data['gen11']['count']}}</th>
                      <th>{{$data['gen11']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_2">
                      <th>Generation 12:</th>
                      <th>{{$data['gen12']['count']}}</th>
                      <th>{{$data['gen12']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_1">
                      <th>Generation 13:</th>
                      <th>{{$data['gen13']['count']}}</th>
                      <th>{{$data['gen13']['ammount']}}</th>
                    </tr>
                     <tr class="row_color_2">
                      <th>Generation 14:</th>
                      <th>{{$data['gen14']['count']}}</th>
                      <th>{{$data['gen14']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_2">
                      <th>Generation 15:</th>
                      <th>{{$data['gen15']['count']}}</th>
                      <th>{{$data['gen15']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_1">
                      <th>Generation 16:</th>
                      <th>{{$data['gen16']['count']}}</th>
                      <th>{{$data['gen16']['ammount']}}</th>
                    </tr>
                    <tr class="row_color_2">
                      <th>Generation 17:</th>
                      <th>{{$data['gen17']['count']}}</th>
                      <th>{{$data['gen17']['ammount']}}</th>
                    </tr>
                    </tbody>
                    <tfoot>
                      <tr style="background: #ff4757">
                        <th>Total:</th>
                        <th></th>
                        <th>{{$data['total']}}</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    @endsection