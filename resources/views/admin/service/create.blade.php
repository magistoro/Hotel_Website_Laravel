@extends('layouts.admin')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Добавить услугу</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Главная</a></li>
          <li class="breadcrumb-item active">Добавить услугу</li>
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
      <form action="{{ route('admin.service.store')}}" method="post" enctype="multipart/form-data">
        @csrf 

        <div class="form-group">
          <input type="text" name="title" class="form-control" placeholder="Наименование">
        </div>

        <div class="form-group">
          <input type="number" name="price" min="0" max="999999999" step="0.01" class="form-control" placeholder="Цена" oninput="validity.valid || (value = '');">
        </div>

        <div class="form-group">
          <textarea id="description" name="description" class="form-control autosize" rows="3" maxlength="1024" placeholder="Описание" style="min-height: 200px; max-height: 1000px;"></textarea>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Добавить">
        </div>
      </form>
    </div>
  </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
@endsection