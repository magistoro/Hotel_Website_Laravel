@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Пентхаус</h1>
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
        <div class="col-12">
            <div class="card">
            <div class="card-header d-flex p-3" >
              <div class="mr-3">
                <a href="{{route('admin.penthouse.edit', $penthouse->id)}}" class="btn btn-primary">Редактировать</a>
              </div>
                <form action="{{route('admin.penthouse.destroy', $penthouse->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn btn-danger" value="Удалить">
                </form>
            </div>
            
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">

            <tbody>
            <tr>
                <td>ID</td>
                <td>{{$penthouse->id}}</td>
            </tr>
            <tr>
              <td>Наименование</td>
              <td>{{$penthouse->title}}</td>
            </tr>

            <tr>
              <td>Описание</td>
              <td class="text-wrap">{{ $penthouse->description }}</td>
            </tr>

            <tr>
              <td>Цена</td>
              <td>{{$penthouse->price}}</td>
            </tr>

            <tr>
              <td>Категория</td>
              <td>{{$penthouse->category->title}}</td>
            </tr>

            <tr>
              <td>Владелец</td>
              @if ($penthouse->user)
                  <td onclick="window.location='{{ route('admin.user.show', $penthouse->user->id) }}';">{{$penthouse->user->name}}</td>
              @else
                  <td>Владельца нет</td>
              @endif
            </tr>

            <tr>
              <td>Ключи доступа (ещё не работает)</td>
              @if ($penthouse->user)
                <td onclick="window.location='{{ route('admin.user.show', $penthouse->user->id) }}';">{{$penthouse->user->name}}</td>
              @else
              <td>Владельца нет</td>
              @endif
            </tr>

            <tr>
              <td>Удобства</td>
              <td>
                  <ul>
                      @foreach ($penthouseAmenities as $amenity)
                          <li>
                              <a href="{{ route('admin.amenity.show', $amenity->id) }}">{{ $amenity->title }}</a>
                          </li>
                      @endforeach
                  </ul>
              </td>
          </tr>

            <tr>
              <td>Фото</td>
              <td>
                {{-- <img src="/Content/penthouse/thumbnails/{{$penthouse->thumbnail}}" alt="{{$penthouse->thumbnail}}" style="max-width: 30%"> --}}
                <img src="/Content/penthouse/thumbnails/{{$penthouse->thumbnail}}" alt="{{$penthouse->thumbnail}}" style="max-width: 30%">
              </td>
            </tr>

           
            </tbody>
            </table>
            </div>
            
            </div>
            
            </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  @extends('layouts.statusPopUp')
@endsection