@extends('layouts.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Арендовать номер \ Создать билет</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Главная</a></li>
          <li class="breadcrumb-item active">Арендовать</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container">
      <div class="row justify-content-center">
          
          <div class="col-md-8">
            <div class="form-group">
              <label>Номер</label>
              <select name="room_id" class="form-control room type select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" onchange="highlightElement(this)" disabled>
                <option selected disabled>Выберите номер</option>
                @foreach($rooms as $_room)
                  <option value="{{$_room->id}}" {{$_room->id == $room->id ? 'selected' : ''}}>{{$_room->title}}</option>          
                @endforeach
              </select>
            </div>
         
            <div class="form-group">
              <label>Диапазон дат:</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="text" class="form-control" name="daterange" id="daterange" value="" disabled/>
              </div>
            </div>

            <div class="form-group d-flex justify-content-between">
              <button class="btn btn-success" id="add-ticket-btn">Добавить билет</button>
              
              <input type="submit" class="btn btn-primary" id="create-button" value="Создать билеты" disabled>
            </div> 


            <div class="form-group">
              <div id="ticket-container">
                <!-- Здесь будут отображаться добавленные билеты -->
              </div>
            </div>
        
             

          </div>

           

          </div>
  </div>

  
</section>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Обработчик изменения состояния чекбоксов
  



    // Обработчик смены диапазона дат
      var startDate = null;
      var endDate = null;

      @if(isset($startDate) && isset($endDate))
          startDate = moment('{{ $startDate }}');
          endDate = moment('{{ $endDate }}');
      @endif

      $('input[name="daterange"]').daterangepicker({
          opens: 'center',
          startDate: startDate,
          endDate: endDate
      });
 




  // Функция для добавления билета
const addTicketButton = document.getElementById('add-ticket-btn');
addTicketButton.addEventListener('click', addTicket);
let addedTickets = 0;
const peopleCount = {{ $room->people_count }};

function addTicket() {
  if (addedTickets < peopleCount) {
    const ticketContainer = document.getElementById('ticket-container');
    const ticketHTML = `
      <div class="ticket">
        <div class="form-row d-flex justify-content-between mb-2 mt-3">
          <div class="form-group form-check custom-control custom-checkbox mr-3">
            <input class="custom-control-input account-checkbox" type="checkbox" id="existingAccountCheckbox-${addedTickets}" name="existingAccountCheckbox">
            <label for="existingAccountCheckbox-${addedTickets}" class="custom-control-label">Новый аккаунт</label>
          </div>
          <div class="form-group form-check custom-control custom-checkbox">
            <input class="custom-control-input account-checkbox" type="checkbox" id="newAccountCheckbox-${addedTickets}" name="newAccountCheckbox" value="option1">
            <label for="newAccountCheckbox-${addedTickets}" class="custom-control-label">Существующий аккаунт</label>
          </div>
        </div>

        <div id="existingAccountFields-${addedTickets}" style="display: none;">
          <div class="form-row">
            <div class="form-group col-md-4">
              <input type="text" name="name" class="form-control" placeholder="Имя">
            </div>
            <div class="form-group col-md-4">
              <input type="text" name="surname" class="form-control" placeholder="Фамилия">
            </div>
            <div class="form-group col-md-4">
              <input type="text" name="patronymic" class="form-control" placeholder="Отчество">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <input type="date" name="birth_date" class="form-control" placeholder="Дата рождения">
            </div>
            <div class="form-group col-md-4">
              <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
              <input type="tel" name="phone" class="form-control" placeholder="Номер телефона">
            </div>
          </div>
        </div>

        <div id="newAccountFields-${addedTickets}" style="display: none;">
          <div class="form-group">
            <select name="category_id" class="form-control user type  select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" ">
              <option selected="selected" disabled data-select2-id="">Выберите пользователя</option>
              @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <button type="button" class="btn btn-danger remove-ticket-btn">Удалить</button>
      </div>
    `;

    if (ticketContainer) {
      const ticketElement = document.createElement('div');
      ticketElement.innerHTML = ticketHTML;
      ticketContainer.appendChild(ticketElement);

      const removeTicketButton = ticketElement.querySelector('.remove-ticket-btn');
      removeTicketButton.addEventListener('click', () => removeTicket(ticketElement));

      const existingAccountCheckbox = ticketElement.querySelector('#existingAccountCheckbox-' + addedTickets);

      
      const newAccountCheckbox = ticketElement.querySelector('#newAccountCheckbox-' + addedTickets);
      const existingAccountFields = ticketElement.querySelector('#existingAccountFields-' + addedTickets);
      const newAccountFields = ticketElement.querySelector('#newAccountFields-' + addedTickets);

      existingAccountCheckbox.addEventListener('change', () => {
        toggleFields(existingAccountFields, newAccountFields, 'existing');
        validateForm();
      });

      newAccountCheckbox.addEventListener('change', () => {
        toggleFields(newAccountFields, existingAccountFields, 'new');
        validateForm();
      });

      existingAccountCheckbox.addEventListener('change', () => {
        if (existingAccountCheckbox.checked) {
          newAccountCheckbox.checked = false;
        }
      });

      newAccountCheckbox.addEventListener('change', () => {
        if (newAccountCheckbox.checked) {
          existingAccountCheckbox.checked = false;
        }
      });

      addedTickets++;
      updateAddButtonState();
    } else {
      console.error('Элемент ticket-container не найден на странице!');
    }
  }
}

function removeTicket(ticketElement) {
  ticketElement.remove();
  addedTickets--;
  updateAddButtonState();
  validateForm();
}

function toggleFields(showFields, hideFields, type) {
  showFields.style.display = 'block';
  $('.user').select2()
  hideFields.style.display = 'none';
}

function updateAddButtonState() {
  const addTicketButton = document.getElementById('add-ticket-btn');
  if (addTicketButton) {
    addTicketButton.disabled = addedTickets >= peopleCount;
  } else {
    console.error('Элемент add-ticket-btn не найден на странице!');
  }
}

// Функция для получения данных из форм и вывода в консоль
const createButton = document.getElementById('create-button');
createButton.addEventListener('click', getFormData);

function getFormData() {
  const ticketContainers = document.querySelectorAll('.ticket');
  const formData = [];

  var room_id_select = document.querySelector('select[name="room_id"]');
  var room_id = room_id_select.value;

  var daterange =   $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD') + ' - ' + $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');

  let isFormValid = true;

  ticketContainers.forEach((ticketContainer) => {
    const accountType = getAccountType(ticketContainer);
    const ticketData = {};

    if (accountType === 'new') {
      const nameInput = ticketContainer.querySelector('input[name="name"]');
      const surnameInput = ticketContainer.querySelector('input[name="surname"]');
      const patronymicInput = ticketContainer.querySelector('input[name="patronymic"]');
      const birthDateInput = ticketContainer.querySelector('input[name="birth_date"]');
      const emailInput = ticketContainer.querySelector('input[name="email"]');
      const phoneInput = ticketContainer.querySelector('input[name="phone"]');

      const isTicketValid = validateTicket(nameInput, surnameInput, patronymicInput, birthDateInput, emailInput, phoneInput);

      if (isTicketValid) {
        ticketData.name = nameInput.value;
        ticketData.surname = surnameInput.value;
        ticketData.patronymic = patronymicInput.value;
        ticketData.birth_date = birthDateInput.value;
        ticketData.email = emailInput.value;
        ticketData.phone = phoneInput.value;
        ticketData.account_type = 'new';
        formData.push(ticketData);
      } else {
        isFormValid = false;
      }
    } else if (accountType === 'existing') {
      const categorySelect = ticketContainer.querySelector('select[name="category_id"]');
      const isTicketValid = validateExistingAccount(categorySelect);

      if (isTicketValid) {
        ticketData.user_id = categorySelect.value;
        ticketData.account_type = 'existing';
        formData.push(ticketData);
      } else {
        isFormValid = false;
      }
    } else {
      isFormValid = false;

    }
  });

  if (isFormValid) {
    
    formData.push({
      room_id: room_id,
      daterange: daterange
    });
    // console.log(formData);
        // Отправляем данные формы на сервер с помощью fetch
     fetch('/admin/order/', {
       method: 'POST',
       body: JSON.stringify(formData),
       headers: {
        'Content-Type': 'application/json',
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      }
     })
     .then(response => response.json())
     .then(data => {
        console.log('Success:', data);
       window.location.href = '/admin/order/' + data.order;
       // Здесь вы можете обработать успешный ответ сервера
     })
     .catch((error) => {
       console.error('Error:', error);
       // Здесь вы можете обработать ошибку
     });
  } else {
    console.log('Пожалуйста, заполните все поля формы.');
  }
}

function getAccountType(ticketContainer) {
  const existingAccountCheckbox = ticketContainer.querySelector('input[name="existingAccountCheckbox"]');
  const newAccountCheckbox = ticketContainer.querySelector('input[name="newAccountCheckbox"]');

  if (existingAccountCheckbox.checked) {
    return 'new';
  } else if (newAccountCheckbox.checked) {
    return 'existing';
  }

  return null;
}

function validateTicket(nameInput, surnameInput, birthDateInput, emailInput, phoneInput) {
  return (
    nameInput.value.trim() !== '' &&
    surnameInput.value.trim() !== '' &&
   
    birthDateInput.value.trim() !== '' &&
    emailInput.value.trim() !== '' &&
    phoneInput.value.trim() !== ''
  );
}

function validateExistingAccount(categorySelect) {
  // alert(categorySelect.value);
  return categorySelect.value !== '';
}


function validateForm() {
  const ticketContainers = document.querySelectorAll('.ticket');
  let isFormValid = false;

  ticketContainers.forEach((ticketContainer) => {
    const existingAccountCheckbox = ticketContainer.querySelector('input[name="existingAccountCheckbox"]');
    const newAccountCheckbox = ticketContainer.querySelector('input[name="newAccountCheckbox"]');

    // 1. Обязательно должен быть один checkbox на строке
    if (!existingAccountCheckbox.checked && !newAccountCheckbox.checked) {
      isFormValid = false;
      return;
    }

    const accountType = getAccountType(ticketContainer);

    if (accountType === 'new') {
      const nameInput = ticketContainer.querySelector('input[name="name"]');
      const surnameInput = ticketContainer.querySelector('input[name="surname"]');
      const birthDateInput = ticketContainer.querySelector('input[name="birth_date"]');
      const emailInput = ticketContainer.querySelector('input[name="email"]');
      const phoneInput = ticketContainer.querySelector('input[name="phone"]');

      const isTicketValid = validateTicket(nameInput, surnameInput, birthDateInput, emailInput, phoneInput);

      if (!isTicketValid) {
        isFormValid = false;
      } else {
        isFormValid = true;
      }

      // 2. После заполнения хотя бы одного поля из полей "Новый аккаунт" проверка вызывалась бы снова
      nameInput.addEventListener('input', validateForm);
      surnameInput.addEventListener('input', validateForm);
      birthDateInput.addEventListener('input', validateForm);
      emailInput.addEventListener('input', validateForm);
      phoneInput.addEventListener('input', validateForm);
    } else if (accountType === 'existing') {
      const categorySelect = ticketContainer.querySelector('select[name="category_id"]');
     
      const isTicketValid = validateExistingAccount(categorySelect);

      if (!isTicketValid) {
        isFormValid = false;
      } else {
        isFormValid = true;
      }

    
    }
  });

  const createButton = document.getElementById('create-button');
  createButton.disabled = !isFormValid;
}







  });





  



</script>


@endsection