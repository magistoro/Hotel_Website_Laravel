@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Номера</h1>
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
      <div class="card-header">
        <a href="{{route('admin.room.create')}}" class="btn btn-primary">Добавить</a>
    </div>
    <div class="card-body">
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <div class="row">
        <div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
    <thead>
    <tr>
      {{-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 17%;">ID</th> --}}
      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 25%;">Наименование</th>
      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Цена</th>
      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Категория</th>
      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Кол-во людей</th>
    
      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 17%;">Статус</th>
    </thead>
    <tbody>
      @foreach($rooms as $room) 
      <tr class="odd" onclick="window.location='{{ route('admin.room.show', $room->id) }}';" style="cursor: pointer">
        <td>{{$room->title}}</td>
        <td>{{$room->price_per_night}}</td>
        <td>{{$room->category->title}}</td>
        <td>{{$room->people_count}}</td>
        <td>{{ $room->status->title }}</td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
    <tr>
      {{-- <th rowspan="1" colspan="1">ID</th> --}}
      <th rowspan="1" colspan="1">Наименование</th>
      <th rowspan="1" colspan="1">Цена</th>
      <th rowspan="1" colspan="1">Категория</th>
      <th rowspan="1" colspan="1">Кол-во людей</th>
      <th rowspan="1" colspan="1">Статус</th>
    </tr>
    </tfoot>
    </table></div></div></div></div></div></div></div></div>
    </section>
  <!-- /.content -->

  @extends('layouts.statusPopUp')
@endsection