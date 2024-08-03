@extends('layouts.admin')

@section('content')

  <!-- Main content -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактировать услугу</h1>
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
        <form action="{{ route('admin.service.update', $service->id)}}" method="post">
          @csrf 
          @method('patch')

          <div class="form-group">
            <label>Наименование</label>
            <input type="text" name="title" class="form-control" value="{{$service->title ?? old('title')}}" placeholder="Наименование">
          </div>

          <div class="form-group">
            <label>Цена</label>
            <input type="number" name="price" min="0" max="999999999" step="0.01" class="form-control" placeholder="Цена" oninput="validity.valid || (value = '');" value="{{$service->price ?? old('price')}}">
          </div>
  
          <div class="form-group">
            <label>Описание</label>
            <textarea id="description" name="description" class="form-control autosize" rows="3" maxlength="1024" placeholder="Описание" style="min-height: 200px; max-height: 1000px;">{{$service->description ?? old('description')}}</textarea>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Редактировать">
          </div>
        </form>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection