@extends('layouts.admin')

@section('content')

  <!-- Main content -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактировать продукт</h1>
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
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Название</label>
        <input type="text" name="name" class="form-control" placeholder="Наименование" value="{{$penthouse->title ?? old('title')}}" onchange="highlightElement(this)">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Цена</label>
        <input type="number" min="0" name="price" class="form-control" placeholder="Цена" value="{{$penthouse->price ?? old('price')}}" onchange="highlightElement(this)">
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label>Описание</label>
    <textarea id="description" name="description" class="form-control autosize" rows="3" maxlength="1024" placeholder="Описание" style="min-height: 200px; max-height: 1000px;" onchange="highlightElement(this)">{{$penthouse->description ?? old('description')}}</textarea>
  </div>
  
  <div class="form-group">
    <div class="row">
      <div class="col-md-6">
        <label>Категория</label>
        <select name="category_id" class="form-control category type select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" onchange="highlightElement(this)">
          <option selected disabled>Выберите категорию</option>
          @foreach($categories as $category)
            <option value="{{$category->id}}" {{$penthouse->category_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>          
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label>Владелец</label>
        <select name="owner" class="form-control select2-hidden-accessible" style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" onchange="highlightElement(this)">
          <option selected disabled>Выберите владельца</option>
          @foreach($users as $user)
            <option value="{{$user->id}}" {{$penthouse->user_id == $user->id ? 'selected' : ''}}>{{$user->name . " " . $user->surname . " " . $user->patronymic . " + 4 цифры паспорта"}}</option>          
          @endforeach
        </select>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label>Удобства</label>
    <select class="category" name="amenities[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;" onchange="highlightElement(this)">
      @foreach($amenities as $amenity)
        <option value="{{$amenity->id}}" {{$penthouse->amenities->contains('id', $amenity->id) ? 'selected' : '' }}>
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
    </div><!-- /.container-fluid -->
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