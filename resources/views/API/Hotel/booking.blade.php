
@extends('API.Hotel.layouts.app')

@section('content')

 <!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="search-icon search-switch">
        <i class="icon_search"></i>
    </div>
    <div class="header-configure-area">
        <div class="language-option">
            {{-- <img src="img/flag.jpg" alt=""> --}}
            <span>EN <i class="fa fa-angle-down"></i></span>
            <div class="flag-dropdown">
                <ul>
                    <li><a href="#">Zi</a></li>
                    <li><a href="#">Fr</a></li>
                </ul>
            </div>
        </div>
        <a href="#" class="bk-btn">Booking Now</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./rooms.html">Rooms</a></li>
            <li><a href="./about-us.html">About Us</a></li>
            <li><a href="./pages.html">Pages</a>
                <ul class="dropdown">
                    <li><a href="./room-details.html">Room Details</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                    <li><a href="#">Family Room</a></li>
                    <li><a href="#">Premium Room</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">News</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-tripadvisor"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
        <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
    </ul>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
@include('API.Hotel.layouts.header')
<!-- Header End -->

{{-- Страница --}}

<section class="contact-section spad">
    <div class="container">
              
                <div class="container">
                    <div class="mb-3"> <h2>Информация о номере</h2></div>
                   
                
                    <form id="booking-form" method="POST" action="{{ route('rooms.booking.store') }}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $roomId }}">
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Дата заселения</label>
                                    <input type="text" class="form-control datepicker" name="start_date" id="start_date" value="{{ $startDate }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">Дата выселения</label>
                                    <input type="text" class="form-control datepicker" name="end_date" id="end_date" value="{{ $endDate }}" readonly>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room_title">Название</label>
                                    <input type="text" class="form-control" name="room_title" id="room_title" value="{{ $roomTitle }} ({{ $people_count }} чел.) " readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="room_price">Цена за ночь</label>
                                    <input type="text" class="form-control" name="room_price" id="room_price" value="{{ $roomPrice }}" readonly>
                                </div>
                            </div>
                        </div>
                
                        @if (Auth::check()) 
                        <div class="form-group mt-3">
                            <h2>Контактная информация</h2>
                         </div>
                         
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    @if ($user->surname)
                                        <input type="text" class="form-control" name="surname" id="surname" value="{{ $user->surname }}" readonly>
                                    @else
                                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Фамилия">
                                    @endif
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                   @if ($user->phone)
                                    <input type="phone" class="form-control" name="phone" value="{{ $user->phone }}">
                                   @else
                                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="Телефон">
                                   @endif
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_amount">Итоговая сумма</label>
                                    <input type="text" class="form-control" name="total_amount" id="total_amount" value="{{ $totalPrice }}" readonly>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Display the form as before -->
                    
                        <div class="form-group mt-3">
                           <h2>Контактная информация</h2>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="surname">Фамилия</label>
                                    <input type="text" class="form-control" name="surname" id="surname" required>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label for="password">Пароль</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <label for="phone">Телефон</label>
                                <input type="phone" class="form-control" name="phone" id="phone" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_price">Итоговая сумма</label>
                                    <input type="text" class="form-control" name="total_amount" id="total_price" value="{{ $totalPrice }}" readonly>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="total_price"> </label>
                            <button type="submit" class="btn btn-primary form-control">Оплатить</button>
                        </div>
                    </form>
                   
                </div>

<script>
      document.addEventListener("DOMContentLoaded", function() {

        $('#phone').inputmask("+7 (999) 999-99-99");

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0, // Минимальная дата - текущая
            onSelect: function(dateText) {
                calculateTotalPrice();
            }
        });

        calculateTotalPrice();

        function calculateTotalPrice() {
            // var startDate = new Date($('#start_date').val());
            // var endDate = new Date($('#end_date').val());
            // var roomPrice = parseFloat('{{ $roomPrice }}');

            // var diffDays = (endDate - startDate) / (1000 * 60 * 60 * 24);

            var startDateInput = $('#start_date');
            var endDateInput = $('#end_date');
            var roomPrice = parseFloat('{{ $roomPrice }}');
                
            startDateInput.inputmask('99.99.9999', {
              'placeholder': 'dd.mm.yyyy'
            });
        
            endDateInput.inputmask('99.99.9999', {
              'placeholder': 'dd.mm.yyyy'
            });
        
            startDateInput.add(endDateInput).on('input', function() {
              var startDateVal = startDateInput.val();
              var endDateVal = endDateInput.val();
        
              if (startDateVal && endDateVal) {
                var startDate = new Date(startDateVal.split('.').reverse().join('-'));
                var endDate = new Date(endDateVal.split('.').reverse().join('-'));
            
                if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                  var diffDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
                      var totalPrice = diffDays * roomPrice;
            
                      $('#total_price').val(totalPrice.toFixed(2));
                  }
              }
        }         
    )}





            // 
                // $('#phone').inputmask("+7 (999) 999-99-99");
            // 
        // $('.datepicker').datepicker({
            // dateFormat: 'yy-mm-dd',
            // minDate: 0, // Минимальная дата - текущая
            // onSelect: function(dateText) {
                // calculateTotalPrice();
            // }
        // });
        // 
        // calculateTotalPrice();
        // 
        // function calculateTotalPrice() {
            // var startDate = {{$startDate}};
            // var endDate = {{$endDate}};
            // var roomPrice = parseFloat('{{ $roomPrice }}');
        // 
        // 
            // alert(startDate, endDate, roomPrice);
        // 
            // var diffDays = (endDate - startDate) / (1000 * 60 * 60 * 24);
            // var totalPrice = diffDays * roomPrice;
        // 
            // $('#total_price').val(totalPrice.toFixed(2));
            // alert(diffDays);
        // }


        
    });
</script>


                
        

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
       

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.0606825994123!2d-72.8735845851828!3d40.760690042573295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b24c9274c91%3A0xf310d41b791bcb71!2sWilliam%20Floyd%20Pkwy%2C%20Mastic%20Beach%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1578582744646!5m2!1sen!2sbd"
                height="470" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>



@include('API.Hotel.layouts.footer')

@endsection