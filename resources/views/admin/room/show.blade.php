@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Номер</h1>
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
                <a href="{{route('admin.room.edit', $room->id)}}" class="btn btn-primary">Редактировать</a>
              </div>
                <form action="{{route('admin.room.destroy', $room->id)}}" method="post">
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
                <td>{{$room->id}}</td>
            </tr>
            <tr>
              <td>Наименование</td>
              <td>{{$room->title}}</td>
            </tr>

            <tr>
              <td>Описание</td>
              <td class="text-wrap">{{ $room->description }}</td>
            </tr>

            <tr>
              <td>Цена за ночь</td>
              <td>{{$room->price_per_night}}</td>
            </tr>

            <tr>
              <td>Максимальное количество людей в номере</td>
              <td>{{$room->people_count}}</td>  
            </tr>

            <tr>
              <td>Категория</td>
              <td>{{$room->category->title}}</td>
            </tr>

            <tr>
              <td>Ключи доступа (ещё не работает)</td>
              @if ($room->user)
                <td onclick="window.location='{{ route('admin.user.show', $room->user->id) }}';">{{$room->user->name}}</td>
              @else
              <td>Владельца нет</td>
              @endif
            </tr>

            <tr>
              <td>Удобства</td>
              <td>
                  <ul>
                      @foreach ($roomAmenities as $amenity)
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
                {{-- <img src="/Content/room/thumbnails/{{$room->thumbnail}}" alt="{{$room->thumbnail}}" style="max-width: 30%"> --}}
                {{-- <img src="/Content/room/thumbnails/{{$room->thumbnail}}" alt="{{$room->thumbnail}}" style="max-width: 30%"> --}}
              </td>
            </tr>

           
            </tbody>
            </table>
            </div>
            
            </div>
            
            </div>
      </div>



      <div class="row"> 
        
        <div class="date-inputs d-flex">
          <input type="text" id="startDateInput" class="form-control ml-2" placeholder="Дата начала" readonly>
          <input type="text" id="endDateInput" class="form-control ml-3" placeholder="Дата окончания" readonly>
        </div>

          <div id="calendar"></div>
        
       
        
      </div>

        
    </div><!-- /.container-fluid -->

    

   <style>
    /* Изменённая тема AdminLTE для FullCalendar */

    .fc-unthemed .fc-day-header {
      background-color: #212529;
      color: #c2c7d0;
    }

    .fc-unthemed .fc-toolbar .fc-button {
      background-color: #007bff;
      border-color: none;
      color: #040c13;
    }


    .fc-unthemed .fc-toolbar .fc-button.fc-state-disabled {
      background-color: #6c757d;
      border-color: #6c757d;
      color: #fff;
    }

    .fc-today {
      background-color: #43464b !important;
    }

   </style>
  
    
<script>
    document.addEventListener("DOMContentLoaded", function() {

      var events = [];
      // Обрабатываем забронированные билеты
      @foreach($bookedTickets as $ticket)
                    events.push({
                        title: 'Забронировано',
                        start: '{{ $ticket['arrived_date'] }}',
                        end: '{{ $ticket['depart_date'] }}',
                        color: 'blue',
                        url: '{{ route('admin.order.show', $ticket['order_id']) }}'
                    });
      @endforeach

      // Обрабатываем заселенные билеты
      @foreach($settledTickets as $ticket)
          events.push({
              title: 'Заселено',
              start: '{{ $ticket['arrived_date'] }}',
              end: '{{ $ticket['depart_date'] }}',
              color: 'green',
              url: '{{ route('admin.order.show', $ticket['order_id']) }}'
          });
      @endforeach

      // Обрабатываем незаселенные билеты
      




var startDate, endDate;


$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    defaultView: 'month',
    events: events,
    selectable: true,
    selectOverlap: function(event) {
        return event.rendering === 'background';
    },
    dayClick: function(date, jsEvent, view) {
        if (jsEvent.type === 'dblclick') {
            resetDateSelection();
        } else {
            if (!startDate && isDateAvailable(date)) {
                startDate = date;
                updateInputFields();
            } else if (startDate && !endDate) {
                endDate = date;
                swapDatesIfNeeded();
                updateInputFields();
                if (isDateRangeAvailable(startDate, endDate)) {
                    $bookButton.show();
                } else {
                    alert('В этом диапазоне дат есть забронированные даты.');
                    resetDateSelection();
                }
            } else {
                if (isDateAvailable(date)) {
                    resetDateSelection();
                    startDate = date;
                    updateInputFields();
                } else {
                    alert('Эта дата уже забронирована.');
                }
            }
        }
    },
    eventRender: function(event, element) {
        element.popover({
            title: event.title,
            content: 'Начало: ' + event.start.format('DD.MM.YYYY') + '<br>' +
                     'Конец: ' + event.end.format('DD.MM.YYYY'),
            trigger: 'hover',
            placement: 'top',
            container: 'body'
        });
    },
    viewRender: function(view, element) {
        if (startDate && !endDate) {
            $('#calendar').fullCalendar('renderSelection', startDate, startDate);
        } else if (startDate && endDate) {
            $('#calendar').fullCalendar('renderSelection', startDate, endDate);
        } else {
            $('#calendar').fullCalendar('unselect');
        }
    }
});

function isDateAvailable(date) {
    for (var i = 0; i < events.length; i++) {
        var event = events[i];
        if (date.isSameOrAfter(event.start) && date.isBefore(event.end)) {
            return false;
        }
    }
    return true;
}

function isDateRangeAvailable(start, end) {
    var currentDate = moment(start);
    while (currentDate.isSameOrBefore(end, 'day')) {
        if (!isDateAvailable(currentDate)) {
            return false;
        }
        currentDate.add(1, 'days');
    }
    return true;
}

function swapDatesIfNeeded() {
    if (endDate.isBefore(startDate)) {
        var temp = startDate;
        startDate = endDate;
        endDate = temp;
    }
}

function updateInputFields() {
    if (startDate) {
        $('#startDateInput').val(startDate.format('DD.MM.YYYY'));
    } else {
        $('#startDateInput').val('');
    }

    if (endDate) {
        $('#endDateInput').val(endDate.format('DD.MM.YYYY'));
    } else {
        $('#endDateInput').val('');
    }
}

function resetDateSelection() {
    $('#calendar').fullCalendar('unselect');
    $('#calendar').fullCalendar('renderSelection', null, null);
    startDate = null;
    endDate = null;
    updateInputFields();

    $bookButton.hide();
}


// var $resetButton = $('<button class="btn btn-danger">Стереть</button>');
// $resetButton.on('click', resetDateSelection);
// $('.fc-today-button').after($resetButton);


var $bookButton = $('<button class="btn btn-success">Забронировать</button>').hide();
$bookButton.on('click', function() {
    window.location.href = '{{ route('admin.order.create') }}?start_date=' + startDate.format('YYYY-MM-DD') + '&end_date=' + endDate.format('YYYY-MM-DD') + '&room=' + '{{ $room->id }}';
    resetDateSelection();
});
$('.fc-today-button').after($bookButton);



      var footer = document.querySelector('.main-footer');

      // Если элемент существует
      if (footer) {
        // Устанавливаем его стиль display на none, чтобы скрыть
        footer.style.display = 'none';
      }
    });
</script>
    
  </section>
  <!-- /.content -->

  @extends('layouts.statusPopUp')
@endsection