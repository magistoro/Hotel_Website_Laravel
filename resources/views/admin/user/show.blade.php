@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->



 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Профиль</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Главная</a></li>
          <li class="breadcrumb-item active">Профиль пользователя</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">

              @if(Auth::user() && isset($user->avatar))
                <img class="profile-user-img img-fluid img-circle" src="{{ $user->avatar}}" alt="User profile picture">
              @else
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('Hotel/img/logo_user.jpg')}}" alt="User profile picture">
              @endif

            </div>

            <h3 class="profile-username text-center">{{ $user->name }}</h3>

            <p class="text-muted text-center">{{ $user->role->name }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Фамилия</b> <a class="float-right">{{ $user->surname }}</a>
              </li>
              <li class="list-group-item">
                <b>Отчество</b> <a class="float-right">{{ $user->patronymic }}</a>
              </li>
              <li class="list-group-item">
                <b>Телефон</b> <a class="float-right">{{ $user->phone }}</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Заблокировать</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Обо мне</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            {{-- <strong><i class="fas fa-book mr-1"></i> Education</strong>

            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

            <p class="text-muted">
              <span class="tag tag-danger">UI Design</span>
              <span class="tag tag-success">Coding</span>
              <span class="tag tag-info">Javascript</span>
              <span class="tag tag-warning">PHP</span>
              <span class="tag tag-primary">Node.js</span>
            </p>

            <hr> --}}

            <strong><i class="far fa-file-alt mr-1"></i> Описание</strong>

            <p class="text-muted">{{ $user->comment }}</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Действия</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">История</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
              {{-- <li class="nav-item"><a class="nav-link" href="#points" data-toggle="tab">Баллы (в планах)</a></li> --}}
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('Hotel/img/logo_user.jpg')}}" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('Hotel/img/logo_user.jpg')}}" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" placeholder="Response">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('Hotel/img/logo_user.jpg')}}" alt="User Image">
                    <span class="username">
                      <a href="#">Adam Jones</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-danger">
                      10 Feb. 2014
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-envelope bg-primary"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-user bg-info"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                      <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                    <i class="fas fa-comments bg-warning"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                      </div>
                    </div>
                  </div>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <div class="time-label">
                    <span class="bg-success">
                      {{ $user->created_at->format('d.m.Y') }}
                    </span>
                  </div>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                 
                  <!-- END timeline item -->
                  <div>
                    <i class="far fa-clock bg-gray"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="far fa-clock"></i> {{ $user->time_ago }} </span>
                      <h3 class="timeline-header"><a href="#">{{ $user->name }}</a> теперь с нами, поприветствуем!</h3>
                    </div>
                  </div>
                  
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">

                <form action="{{ route('admin.user.update', $user->id)}}" method="post" class="row">
                  @csrf 
                  @method('patch')
                  <div class="form-group col-md-6">
                      <label>Имя</label>
                      <input type="text" name="name" class="form-control" value="{{$user->name ?? old('name')}}" placeholder="Имя">
                  </div>
  
                  <div class="form-group col-md-6">
                      <label>Фамилия</label>
                      <input type="text" name="surname" class="form-control" value="{{$user->surname ?? old('surname')}}" placeholder="Фамилия">
                  </div>
  
                  <div class="form-group col-md-6">
                      <label>Отчество</label>
                      <input type="text" name="patronymic" class="form-control" value="{{$user->patronymic ?? old('patronymic')}}" placeholder="Отчество">
                  </div>
  
                  <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" value="{{$user->email ?? old('email')}}" placeholder="Email">
                  </div>
  
                  <div class="form-group col-md-6">
                      <label>Телефон</label>
                      <input type="phone" name="phone" class="form-control phone" value="{{$user->phone ?? old('pnone')}}" placeholder="Телефон">
                  </div>
  
                  <div class="form-group col-md-6">
                    <label>Дата рождения</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="{{ $user->birthdate ? '' : 'border-color: yellow;' }}"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input id="daterangepicker" type="date" class="form-control" name="birthdate"  value="{{ $user->birthdate }}" style="{{ $user->birthdate ? '' : 'border-color: yellow;' }}">
                    </div>
                  </div>
                                
  
                  <div class="form-group col-md-12">
                      <label>Комментарий</label>
                      <textarea id="description" name="comment" class="form-control autosize" rows="3" maxlength="1024" placeholder="Комментарии" style="min-height: 100px; max-height: 1000px;">{{$user->comment ?? old('comment')}}</textarea>
                  </div>
  
  
                  <div class="form-group col-md-6">
                      <label>Роль</label>
                      <select name="role_id" class="form-control category type select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                          <option selected="selected" disabled data-select2-id="">Выберите роль</option>
                          @foreach($roles as $role_)
                          <option value="{{$role_->id}}" {{$user->role_id == $role_->id ? 'selected' : ''}}>{{$role_->name}}</option>                
                          @endforeach
                      </select>
                  </div>
  
                  
                  <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-primary" value="Редактировать">
                  </div>
              </form>
              </div>


              <div class="tab-pane" id="points">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Баллы</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" id="inputName" placeholder="Введите кол-во">
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Добавить</button>
                      <button type="submit" class="btn btn-danger ml-2">Удалить</button>
                    </div>
                  </div>
                </form>


                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Опыт</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" class="form-control" id="inputName" placeholder="Введите кол-во">
                    </div>
                  </div>
                
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->







 {{-- <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Пользователь</h1>
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
                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-primary">Редактировать</a>
              </div>
                <form action="{{route('admin.user.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" class="btn btn-danger" value="Удалить">
                </form>
                <a href="{{route('admin.user.edit', $user->id)}}" class="btn btn-success ml-3">Запросить смену пароля</a>
            </div>
            
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">

            <tbody>
            <tr>
                <td>ID</td>
                <td>{{ substr($user->id, 0, 9) . str_repeat('*', strlen($user->id) - 17) . substr($user->id, -8) }}</td>
            </tr>

            <tr>
              <td>Имя</td>
              <td>{{$user->name}}</td>
            </tr>

            <tr>
              <td>Фамилия</td>
              <td>{{$user->surname}}</td>
            </tr>

            <tr>
              <td>Отчество</td>
              <td>{{$user->patronymic}}</td>
            </tr>

            <tr>
              <td>Email</td>
              <td>{{$user->email}}</td>
            </tr>

            <tr>
              <td>Телефон</td>
              <td>{{$user->phone}}</td>
            </tr>

            <tr>
              <td>Дата рождения</td>
              <td>{{$user->birth_date}}</td>
            </tr>

            <tr>
              <td>Комментарий</td>
              <td>{{$user->comment}}</td>
            </tr>

            <tr>
              <td>Уровень допуска</td>
              <td>{{$user->role->name}}</td>
            </tr>

            
            </tbody>
            </table>
            </div>
            
            </div>
            
            </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> --}}
  <!-- /.content -->
@endsection