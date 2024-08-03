@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ближайшие брони</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Главная</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="card">
     
    <div class="card-body">
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <div class="row">
        <div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
    <thead>
    <tr>
      <tr>
        <th>ID заказа</th>
        <th>Дата прибытия</th>
        <th>Дата отъезда</th>
        <th>Цена</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($pendingOrders as $order)
      <tr  onclick="window.location='{{ route('admin.order.show', $order->id) }}';" style="cursor: pointer">
        <td>{{ $order->id }}</td>
        <td>{{ $order->arrived_date }}</td>
        <td>{{ $order->depart_date }}</td>
        <td>{{ $order->total_amount }}</td>
      </tr>
    @endforeach
</tbody>
</table></div></div></div></div></div></div></div></div>
    </section>
  <!-- /.content -->
  @extends('layouts.statusPopUp')
@endsection