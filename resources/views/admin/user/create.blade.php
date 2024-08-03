@extends('layouts.admin')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Добавить пользователя</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Главная</a></li>
          <li class="breadcrumb-item active">Добаление пользователя</li>
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
        <form action="{{ route('admin.user.store')}}" method="post" class="row"  enctype="multipart/form-data">
            @csrf 
            
            <div class="form-group col-md-6">
                <label>Имя</label>
                <input type="text" name="name" class="form-control" placeholder="Имя">
            </div>

            <div class="form-group col-md-6">
                <label>Фамилия</label>
                <input type="text" name="surname" class="form-control" placeholder="Фамилия">
            </div>

            <div class="form-group col-md-6">
                <label>Отчество</label>
                <input type="text" name="patronymic" class="form-control" placeholder="Отчество">
            </div>

            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>

            <div class="form-group col-md-6">
                <label>Телефон</label>
                <input type="phone" name="phone" class="form-control phone" placeholder="Телефон">
            </div>

            <div class="form-group col-md-6">
              <label>Дата рождения</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input id="daterangepicker" type="text" class="form-control" name="birth_date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" data-last-active-input="">
              </div>
            </div>
                          

            <div class="form-group col-md-12">
                <label>Комментарий</label>
                <textarea id="description" name="comment" class="form-control autosize" rows="3" maxlength="1024" placeholder="Комментарии" style="min-height: 100px; max-height: 1000px;"></textarea>
            </div>


            <div class="form-group col-md-6">
                <label>Роль</label>
                <select name="role_id" class="form-control category type select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" disabled data-select2-id="">Выберите роль</option>
                    @foreach($roles as $role_)
                    <option value="{{$role_->id}}">{{$role_->name}}</option>                
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
              <label>Пароль</label>
              <input name="password" class="form-control" id="password" placeholder="Пароль">

              <div class="form-group mt-2"><input class="btn btn-outline-success" id="generatePassword" value="Сгенерировать пароль"></div>
            </div>

           
            
            <div class="form-group col-md-12">
                <input type="submit" class="btn btn-primary" value="Редактировать">
            </div>
        </form>
    </div>
</div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {

      $('#daterangepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD.MM.YYYY',
            cancelLabel: 'Отмена',
            applyLabel: 'Применить',
            daysOfWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
        },
        isInvalidDate: function(date) {
            var currentDate = moment().startOf('day');

            return date.isAfter(currentDate); // Возвращает true, если выбранная дата позже текущей даты
        }
    });




    $('#generatePassword').click(function() {
        var password = generateRandomPassword();
        $('#password').val(password);
    });

    function generateRandomPassword() {
   
    var passwordLength = 8; // Длина пароля
    var passwordChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; // Допустимые символы
    var password = "";
  
    for (var i = 0; i < passwordLength; i++) {
        var randomChar = Math.floor(Math.random() * passwordChars.length);
        password += passwordChars.charAt(randomChar);
    }
    return password;
  };

  

});


  </script>
@endsection