@extends('layouts.admin')

@section('content')

  <!-- Main content -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактировать номер</h1>
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
  <form action="{{ route('admin.room.update', $room->id)}}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('patch')
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label>Название</label>
            <input type="text" name="title" class="form-control" placeholder="Наименование" value="{{$room->title ?? old('title')}}" onchange="highlightElement(this)">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>Цена</label>
            <input type="number"  min="0" max="9999999999" name="price_per_night" class="form-control" placeholder="Цена" value="{{$room->price_per_night ?? old('price_per_night')}}" onchange="highlightElement(this)">
          </div>
        </div>
      </div>
  
      <div class="row">
        <div class="form-group col-md-5">
          <label>Описание</label>
          <textarea id="description" name="description" class="form-control autosize" rows="3" maxlength="1024" placeholder="Описание" style="min-height: 210px; max-height: 1000px;" onchange="highlightElement(this)">{{$room->description ?? old('description')}}</textarea>
        </div>

        <div class="col-md-5">
          <div class="form-group">
            <label>Категория</label>
            <select name="category_id" class="form-control category type select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" onchange="highlightElement(this)">
              <option selected disabled>Выберите категорию</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}" {{$room->category_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>          
              @endforeach
            </select>
          </div>
            
          <div class="form-group">
            <label>Статус</label>
            <select name="status_id" class="form-control category type select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" onchange="highlightElement(this)">
            <option selected disabled>Выберите статус</option>
            @foreach($statuses as $status)
              <option value="{{$status->id}}" {{$room->status_id == $status->id ? 'selected' : ''}}>{{$status->title}}</option>          
            @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Вместительность</label>
            <input type="number" min="0" name="people_count" class="form-control" placeholder="Цена" value="{{$room->people_count ?? old('people_count')}}" onchange="highlightElement(this)">
          </div>
            
        </div>
      </div>

      <div class="form-group col-md-5">
        <label>Удобства</label>
        <select class="category" name="amenities[]" multiple="multiple" data-placeholder="Выберите удобства" style="width: 100%;" onchange="highlightElement(this)">
          @foreach($amenities as $amenity)
            <option value="{{$amenity->id}}" {{$room->amenities->contains('id', $amenity->id) ? 'selected' : '' }}>
              {{$amenity->title}}
            </option>  
          @endforeach
        </select>
      </div>

      
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Редактировать">
      </div>
    </form>
    </div>
  </section>
  
  <!-- /.content -->

  <script>
   function highlightElement(element) {
    if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
        element.style.borderColor = 'green';
    } else if (element.tagName === 'SELECT') {
      $(element).next(".select2-container").find(".select2-selection").css("border-color", "green");
    }
}
    </script>
@endsection