
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

<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Детали заказа</h2>
                </div>
                <div class="card-body">
                    <p>Айди заказа: {{ $order->id }}</p>
                    <p>Номер: {{ $order->tickets()->first()->room()->first()->title }}</p>
                
                    <p>Общая цена: {{ $order->total_amount }}</p>
                    <p>Дата прибытия: {{ $order->arrived_date }}</p>
                    <p>Дата выезда: {{ $order->depart_date }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>QR Code</h2>
                </div>
                <div class="card-body d-flex justify-content-center">
                    {!! $qrCode !!}
                </div>
            </div>
        </div>
    </div>
</div>


@include('API.Hotel.layouts.footer')

@endsection