@extends('layouts.admin')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Заселение</h1>
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
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <form id="order-form" action="{{ route('admin.order.show', 'order_id_placeholder') }}" method="get" enctype="multipart/form-data">
        @csrf
      
        <div class="form-group">
          <label>Выберите заказ</label>
          <select name="order_id" id="order-select" onchange="changeElement(this.value)" class="form-control category type select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option selected disabled>Выберите заказ</option>
            @foreach($orders as $order)
              <option value="{{ $order->id }}">{{ $order->id }}</option>
            @endforeach
          </select>
        </div>
      
        <div class="form-group">
          <input type="submit" id="submit-btn" class="btn btn-primary" value="Найти заказ" disabled>
        </div>
      </form>

    

  </div><!-- /.container-fluid -->
</section>

<script>
  

    function changeElement(valuee){

      const form = document.getElementById('order-form');
      form.action = form.action.replace('order_id_placeholder', valuee);
      document.getElementById('submit-btn').disabled = false;
    }


</script>
  <!-- /.content -->
@endsection