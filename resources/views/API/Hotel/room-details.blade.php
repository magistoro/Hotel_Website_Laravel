
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

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Комната</h2>
                        <div class="bt-option">
                            <a href="{{route('home')}}">Главная</a>
                            <span>Комнаты</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="room-details-item">
                        {{-- Картинка --}}
                        <img src="{{asset('Hotel/img/room/room-details.jpg')}}" alt="{{ $room->title }}"> 

                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{ $room->title }}</h3>
                                <div class="rdt-right">
                                    <div class="rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star-half_alt"></i>
                                    </div>
                                    {{-- <a href="#">Booking Now</a> --}}
                                </div>
                            </div>
                            <h2>{{ number_format($room->price_per_night, 0, ',', ' ')}}$<span>/Per night</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Size:</td>
                                        <td>{{ $room->size }} ft</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>Max person {{ $room->people_count }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>{{ $room->bed_type }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>
                                            @foreach ($room->amenities as $amenity)
                                                {{ $amenity->title }},
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="f-para">{{ $room->description }}</p>
                        </div>
                    </div>
                    {{-- Отзывы --}}
                    {{-- <div class="rd-reviews">
                        <h4>Reviews</h4>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="img/room/avatar/avatar-1.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                        <div class="review-item">
                            <div class="ri-pic">
                                <img src="img/room/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="ri-text">
                                <span>27 Aug 2019</span>
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                                    magnam.</p>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="review-add">
                        <h4>Add Review</h4>
                        <form action="#" class="ra-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name*">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email*">
                                </div>
                                <div class="col-lg-12">
                                    <div>
                                        <h5>You Rating:</h5>
                                        <div class="rating">
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star"></i>
                                            <i class="icon_star-half_alt"></i>
                                        </div>
                                    </div>
                                    <textarea placeholder="Your Review"></textarea>
                                    <button type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
                <div class="col-lg-4">
                    <div class="room-booking">
                        <h3>Забронировать</h3>
                        <form action="{{ route('rooms.booking.form') }}" method="GET">
                            <div class="check-date">
                                <label for="date-in">Заселение:</label>
                                <input type="text" class="date-input" id="date-in" name="start_date"  required autocomplete="off">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Выселение:</label>
                                <input type="text" class="date-input" id="date-out" name="end_date"  required autocomplete="off">
                                <i class="icon_calendar"></i>
                            </div>
                            
                            <div class="select-option">
                                <label for="total-price">Общая стоимость:</label>
                                <span id="total-price">0</span>
                            </div>
                            

                            <input type="hidden" name="room_id" value="{{ $room->id }}">

                            <button type="submit">Забронировать</button>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    @include('API.Hotel.layouts.footer')
    

    <script>
     document.addEventListener('DOMContentLoaded', function() {
    // var dateInInput = document.getElementById('date-in');
    // var dateOutInput = document.getElementById('date-out');
  

    // var bookedDates = {!! json_encode($bookedDates->toArray()) !!};

    // 
    var dateInInput = document.getElementById('date-in');
    var dateOutInput = document.getElementById('date-out');;
    var totalPriceElement = document.getElementById('total-price');

    var bookedDates = {!! json_encode($bookedDates->toArray()) !!};
    var roomPrice = {{ $room->price_per_night }};

    function calculateTotalPrice() {
        var dateIn = new Date(dateInInput.value.split('.').reverse().join('-'));
        var dateOut = new Date(dateOutInput.value.split('.').reverse().join('-'));


        if (!isNaN(dateIn) && !isNaN(dateOut)) {
            var dateRange = (dateOut.getTime() - dateIn.getTime()) / (1000 * 3600 * 24);
            var totalPrice = dateRange * roomPrice ;
            totalPriceElement.textContent = totalPrice.toFixed(2);
        } else {
            totalPriceElement.textContent = '0';
        }
    }
    // 

    $(dateInInput).datepicker({
        minDate: 0,
        dateFormat: 'dd.mm.yy',
        beforeShowDay: function(date) {
            var dateString = $.datepicker.formatDate('dd.mm.yy', date);
            return [!isDateInBookedDates(dateString, bookedDates)];
        },
        onSelect: function(dateText) {
            checkDateGap(dateText, dateOutInput.value);
            $(dateOutInput).datepicker('option', 'minDate', dateText);
            calculateTotalPrice();
        }
    });

    $(dateOutInput).datepicker({
        minDate: 0,
        dateFormat: 'dd.mm.yy',
        beforeShowDay: function(date) {
            var dateString = $.datepicker.formatDate('dd.mm.yy', date);
            return [!isDateInBookedDates(dateString, bookedDates)];
        },
        onSelect: function(dateText) {
            checkDateGap(dateInInput.value, dateText);
            calculateTotalPrice();
        }
    });

    function isDateInBookedDates(dateString, bookedDates) {
        return bookedDates.includes(dateString);
    }

    function checkDateGap(dateInText, dateOutText) {
        if (dateInText && dateOutText) {
            var dateIn = new Date(dateInText.split('.').reverse().join('-'));
            var dateOut = new Date(dateOutText.split('.').reverse().join('-'));
            var bookedDatesInRange = getBookedDatesInRange(dateIn, dateOut, bookedDates);
            if (bookedDatesInRange.length > 0) {
                $(dateInInput).val('');
                $(dateOutInput).val('');
              
            }
        }
    }

    function getBookedDatesInRange(dateIn, dateOut, bookedDates) {
        var bookedDatesInRange = [];
        for (var i = 0; i < bookedDates.length; i++) {
            var bookedDate = new Date(bookedDates[i].split('.').reverse().join('-'));
            if (bookedDate >= dateIn && bookedDate < dateOut) {
                bookedDatesInRange.push(bookedDates[i]);
            }
        }
        return bookedDatesInRange;
    }
});


</script>
    @endsection