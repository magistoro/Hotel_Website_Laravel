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
        <div class="float-right">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Свободные даты</span>
            </div>
            <input type="text" class="form-control daterange-input" />
          </div>
        </div>
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
      @if(isset($availableRooms) && $availableRooms->isNotEmpty())
        @foreach($availableRooms as $room)
          <tr class="odd" onclick="window.location='{{ route('admin.room.show', $room->id) }}';" style="cursor: pointer">
            <td>{{$room->title}}</td>
            <td>{{$room->price_per_night}}</td>
            <td>{{$room->category->title}}</td>
            <td>{{$room->people_count}}</td>
            <td>{{ $room->status->title }}</td>
          </tr>
        @endforeach
      @else
        @foreach($rooms as $room)
          <tr class="odd" onclick="window.location='{{ route('admin.room.show', $room->id) }}';" style="cursor: pointer">
            <td>{{$room->title}}</td>
            <td>{{$room->price_per_night}}</td>
            <td>{{$room->category->title}}</td>
            <td>{{$room->people_count}}</td>
            <td>{{ $room->status->title }}</td>
          </tr>
        @endforeach
      @endif
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

  <script>
  document.addEventListener("DOMContentLoaded", function() {
    $('.daterange-input').daterangepicker({
      locale: {
        format: 'YYYY-MM-DD'
      }
    });
  
    $('.daterange-input').on('apply.daterangepicker', function(ev, picker) {
      // alert("gdfg");
    var startDate = picker.startDate.format('YYYY-MM-DD');
    var endDate = picker.endDate.format('YYYY-MM-DD');

    // Показываем анимацию загрузки
    $('#example1_wrapper').addClass('loading');

        $.ajax({
            url: '{{ route("admin.room.filter") }}',
            data: {
                start_date: startDate,
                end_date: endDate
            },
            success: function(response) {
             
                if (response.availableRooms.length > 0) {
                  var html = '';
                  $.each(response.availableRooms, function(index, room) {
                      html += '<tr class="odd" onclick="window.location=\'' + '{{ route('admin.room.show', '') }}' + '/' + room.id + '\';" style="cursor: pointer">';
                      html += '<td>' + room.title + '</td>';
                      html += '<td>' + room.price_per_night + '</td>';
                      html += '<td>' + room.category.title + '</td>';
                      html += '<td>' + room.people_count + '</td>';
                      html += '<td>' + room.status.title + '</td>';
                      html += '</tr>';
                  });
                  // alert(html);
                  $('#example1 tbody').html(html);
              } else {
                  // Если нет отфильтрованных комнат, выводим сообщение
                  $('#example1 tbody').html('<tr><td colspan="5" class="text-center">No rooms available for the selected date range.</td></tr>');
              }
          }
        });
    });

  });
  
  
</script>
  
@endsection