
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

{{-- @section('content') --}}
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <div>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Выйти из аккаунта') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <h2>Мои билеты</h2>
                </div>
                <div class="mb-3">
                    <button class="btn btn-outline-primary" id="show-current-tickets">Текущие билеты</button>
                    <button class="btn btn-outline-primary" id="show-upcoming-tickets">Забронированные билеты</button>
                    <button class="btn btn-outline-primary" id="show-archived-tickets">Архивные билеты</button>
                </div>
                <div class="current-tickets-slider  owl-carousel owl-theme">
                    @foreach ($currentTickets as $ticket)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->room->title }}</h5>
                            <p class="card-text">Дата заезда: {{ $ticket->order->arrived_date }}</p>
                            <p class="card-text">Дата выезда: {{ $ticket->order->depart_date }}</p>
                            <a href="{{ route('rooms.order', $ticket->order_id) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="upcoming-tickets-slider  owl-carousel owl-theme d-none">
                    @foreach ($upcomingTickets as $ticket)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->room->title }}</h5>
                            <p class="card-text">Дата заезда: {{ $ticket->order->arrived_date }}</p>
                            <p class="card-text">Дата выезда: {{ $ticket->order->depart_date }}</p>
                            <a href="{{ route('rooms.order', $ticket->order_id) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="archived-tickets-slider owl-carousel owl-theme d-none"  data-nav="false">
                    @foreach ($archivedTickets as $ticket)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ticket->room->title }}</h5>
                            <p class="card-text">Дата заезда: {{ $ticket->order->arrived_date }}</p>
                            <p class="card-text">Дата выезда: {{ $ticket->order->depart_date }}</p>
                            <a href="{{ route('rooms.order', $ticket->order_id) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
   
{{-- @endsection --}}


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>




<script>   
  document.addEventListener('DOMContentLoaded', function() {
    
    initOwlCarousel('.current-tickets-slider');
    initOwlCarousel('.upcoming-tickets-slider');
    initOwlCarousel('.archived-tickets-slider');

  $('#show-current-tickets, #show-upcoming-tickets, #show-archived-tickets').on('click', function() {
    var targetSlider = '.' + $(this).attr('id').replace('show-', '') + '-slider';
    $('.slider-container').addClass('d-none');
    $(targetSlider).removeClass('d-none');
  });

  document.getElementById('show-current-tickets').classList.add('active');
});

function initOwlCarousel(selector, options) {
  $(selector).owlCarousel({
    loop: false,
    margin: 10,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      }
    },
  });
}




      document.getElementById('show-current-tickets').addEventListener('click', function() {
        this.classList.add('active');
        document.getElementById('show-upcoming-tickets').classList.remove('active');
        document.getElementById('show-archived-tickets').classList.remove('active');

        document.querySelector('.current-tickets-slider').classList.remove('d-none');
        document.querySelector('.upcoming-tickets-slider').classList.add('d-none');
        document.querySelector('.archived-tickets-slider').classList.add('d-none');
    });

    document.getElementById('show-upcoming-tickets').addEventListener('click', function() {
        this.classList.add('active');
        document.getElementById('show-current-tickets').classList.remove('active');
        document.getElementById('show-archived-tickets').classList.remove('active');

        document.querySelector('.current-tickets-slider').classList.add('d-none');
        document.querySelector('.upcoming-tickets-slider').classList.remove('d-none');
        document.querySelector('.archived-tickets-slider').classList.add('d-none');
    });

    document.getElementById('show-archived-tickets').addEventListener('click', function() {
        this.classList.add('active');
        document.getElementById('show-current-tickets').classList.remove('active');
        document.getElementById('show-upcoming-tickets').classList.remove('active');

        document.querySelector('.current-tickets-slider').classList.add('d-none');
        document.querySelector('.upcoming-tickets-slider').classList.add('d-none');
        document.querySelector('.archived-tickets-slider').classList.remove('d-none');
    });








 
</script>





    




        <div class="map">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4491.308986237985!2d37.53113321167147!3d55.747131953744606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54b0bdc894fb5%3A0xea1dad507941f5be!2z0JDQv9Cw0YDRgi3QvtGC0LXQu9GMINCc0L7RgdC60LLQsC3QodC40YLQuA!5e0!3m2!1sru!2sru!4v1717494900029!5m2!1sru!2sru"
            height="470" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>



@include('API.Hotel.layouts.footer')

@endsection