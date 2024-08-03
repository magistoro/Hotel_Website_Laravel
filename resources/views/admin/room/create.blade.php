@extends('layouts.admin')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Добавить номер</h1>
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
      <form action="{{ route('admin.room.store')}}" method="post" enctype="multipart/form-data">
        @csrf 

        <div class="form-group">
          <input type="text" name="title" class="form-control" placeholder="Наименование">
        </div>

        <div class="form-group">
            <textarea id="description" name="description" class="form-control autosize" rows="3" maxlength="1024" placeholder="Описание" style="min-height: 200px; max-height: 1000px;"></textarea>
        </div>

        <div class="form-group">
            <input type="number" min="0" max="9999999999" name="price_per_night" class="form-control" placeholder="Цена за ночь" step="0.01" oninput="validity.valid || (value = '');">
        </div>

        <div class="form-group">
          <input type="number" min="0" max="99" name="people_count" class="form-control" placeholder="Количество людей" step="1" oninput="validity.valid || (value = '');">
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="custom-file">
              <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Главное изображение</label>
            </div>
          </div>
        </div>

        <div class="form-group">
        <select name="category_id" class="form-control category type  select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
          <option selected="selected" disabled data-select2-id="">Выберите категорию</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->title}}</option>                
          @endforeach
          </select>
        </div>

        <div class="form-group">
          <select name="status_id" class="form-control category type  select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option selected="selected" disabled data-select2-id="">Выберите статус</option>
            @foreach($room_statuses as $room_status)
            <option value="{{$room_status->id}}">{{$room_status->title}}</option>                
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Удобства</label>
          <select class="category" name="amenities[]" multiple="multiple" data-placeholder="Выберите удобства" style="width: 100%;">
            @foreach($amenities as $amenity)
              <option value="{{$amenity->id}}">{{$amenity->title}}</option>                
            @endforeach
          </select>
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