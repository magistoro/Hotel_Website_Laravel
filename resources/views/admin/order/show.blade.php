@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Заказ</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active">Заказ</li>
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
                <a href="{{route('admin.order.edit', $order->id)}}" class="btn btn-primary">Редактировать</a>
              </div>
                {{-- <form action="{{route('admin.order.destroy', $order->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn btn-danger" value="Удалить">
                </form> --}}
            </div>
            
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">

            <tbody>
            <tr>
                <td>ID</td>
                <td>{{$order->id}}</td>
            </tr>
            <tr>
              <td>Дата прибытия</td>
              <td>{{$order->arrived_date}}</td>
            </tr>

            <tr>
              <td>Дата выезда</td>
              <td>{{$order->depart_date}}</td>
            </tr>

            <tr>
              <td>Комментарий</td>
              <td>{{$order->comment}}</td>
            </tr>

            <tr>
              <td>Общее количество людей</td>
              <td>{{$order->total_amount}}</td>
            </tr>

            </tbody>

            </table>

            </div>
            
            </div>


            <div class="card-body table-responsive p-0">
              
              <div class="card">
                <div class="card-header d-flex p-3" >
                  <div class="mr-3">
                    @if($order->tickets()->whereNull('settled_at')->count() > 0)
                        <a href="{{ route('admin.check_into.settle-all', $order->id) }}" class="btn btn-success">Заселить всех</a>
                    @else
                        <a href="#" class="btn btn-success disabled">Заселить всех</a>
                    @endif
                  </div>

                  <div class="mr-3">
                    @if($order->tickets()->whereNotNull('settled_at')->count() > 0 && $order->tickets()->whereNull('checked_out_at')->count() > 0)
                        <a href="{{ route('admin.check_into.evict-all', $order->id) }}" class="btn btn-danger">Выселить всех</a>
                    @else
                        <a href="#" class="btn btn-danger disabled">Выселить всх</a>
                    @endif
                  </div>
                   
                </div>
                <div class="card-body table-responsive p-0">
                <table class="table table-hover text-center">
                  <table class="table table-hover text-center">
                    <tbody>
                        <tr>
                            <th colspan="4" class="text-center">Билет <br> *  {{  $order->tickets()->with('room')->first()->room->title }}  *</th>
                        </tr>
                        {{-- @foreach($order->tickets as $ticket)
                        <tr>
                          <td class="col-3">
                              <a href="{{ route('admin.ticket.show', $ticket->id) }}">
                                  {{ $ticket->id }}
                              </a>
                          </td>
                          <td class="col-3">
                              <a href="{{ route('admin.user.show', $ticket->user->id) }}">
                                  {{ $ticket->user->name }}
                              </a>
                          </td>
                          <td class="col-3">
                              @if($ticket->settled_at)
                                  Заселен ({{ $ticket->settled_at }})
                              @else
                                  Не заселен
                              @endif
                          </td>
                          <td class="col-3">
                           
                              @if(!$ticket->settled_at)
                                  <a href="{{ route('admin.check_into.settle', $ticket->id) }}">
                                      <i class="fas fa-ticket-alt"></i>
                                  </a>
                              @elseif($ticket->settled_at)

                                <a href="{{ route('admin.check_into.evict', $ticket->id) }}" class="btn btn-danger"> <i class="fas fa-ticket-alt"></i></a>
                           
                              @endif
                          </td>
                      </tr>
                        @endforeach --}}



                        @foreach($order->tickets as $ticket)
                        <tr>
                            <td class="col-2">
                                <a href="{{ route('admin.ticket.show', $ticket->id) }}">
                                    {{ $ticket->id }}
                                </a>
                            </td>
                            <td class="col-2">
                                <a href="{{ route('admin.user.show', $ticket->user->id) }}">
                                    {{ $ticket->user->name }}
                                </a>
                            </td>
                            <td class="col-2">
                                {{-- @if($ticket->settled_at)
                                    Заселен ({{ $ticket->settled_at }})
                                @elseif($ticket->checked_out_at)
                                    Выселен ({{ $ticket->checked_out_at }})
                                @elseif($ticket->canceled_at)
                                    Отменен ({{ $ticket->canceled_at }})
                                @else
                                    Не заселен
                                @endif --}}

                                @if($ticket->canceled_at)
                                Отменен ({{ $ticket->canceled_at }})
                                @elseif($ticket->checked_out_at)
                                Выселен ({{ $ticket->checked_out_at }})
                                @elseif($ticket->settled_at)
                                Заселен ({{ $ticket->settled_at }})
                                @else
                                Не заселен
                                @endif



                            </td>
                            <td class="col-4">
                                <div class="btn-group">
                                    @if(!$ticket->settled_at && !$ticket->checked_out_at && !$ticket->canceled_at)
                                        <a href="{{ route('admin.check_into.settle', $ticket->id) }}" class="btn btn-success">Заселить</a>
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.check_into.cancel', $ticket->id) }}">Отменить</a>
                                        </div>
                                    @elseif($ticket->settled_at && !$ticket->checked_out_at && !$ticket->canceled_at)
                                        <a href="{{ route('admin.check_into.evict', $ticket->id) }}" class="btn btn-danger">Выселить</a>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.check_into.cancel', $ticket->id) }}">Отменить</a>
                                        </div>
                                    @elseif($ticket->checked_out_at && !$ticket->canceled_at)
                                        
                                     
                                            <a class="btn btn-primary" href="{{ route('admin.check_into.cancel', $ticket->id) }}">Отменить</a>
                                       
                                    @elseif($ticket->canceled_at)
                                        <a href="#" class="btn btn-secondary disabled">Отменен</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  @extends('layouts.statusPopUp')
@endsection