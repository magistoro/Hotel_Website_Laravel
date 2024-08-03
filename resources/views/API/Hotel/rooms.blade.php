
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
                <img src="{{asset('Hotel/img/flag.jpg ')}}" alt="">
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
                <li class="active"><a href="{{route('home')}}">Home</a></li>
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
                        <h2>Номера</h2>
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

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                
                @foreach ($rooms as $room)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{asset('Hotel/img/room/room-1.jpg')}}" alt="">
                        <div class="ri-text">
                            <h4>{{ $room->title }}</h4>
                            <h3>{{ number_format($room->price_per_night, 0, ',', ' ')}}$<span>/Ночь</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Вместимость:</td>
                                        <td>{{ $room->people_count }} (чел.)</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Удобства:</td>
                                        <td>
                                            @php
                                                $amenities = $room->amenities->pluck('title')->toArray();
                                                $amenitiesString = implode(', ', array_slice($amenities, 0, 3));
                                                if (count($amenities) > 3) {
                                                    $amenitiesString .= '...';
                                                }
                                            @endphp
                                            {{ $amenitiesString }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('rooms.show', $room->id) }}" class="primary-btn">Показать больше</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="room-pagination">
                        @if ($rooms->currentPage() > 1)
                        <a href="{{ $rooms->previousPageUrl() }}">Назад</a>
                    @endif
            
                    @for ($i = max(1, $rooms->currentPage() - 4); $i <= min($rooms->lastPage(), $rooms->currentPage() + 4); $i++)
                        <a href="{{ $rooms->url($i) }}" class="{{ $rooms->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                    @endfor
            
                    @if ($rooms->hasMorePages())
                        <a href="{{ $rooms->nextPageUrl() }}">Далее</a>
                    @endif
                    </div>

                    <div class="room-pagination">
                        Показано с {{ $rooms->firstItem() }} по {{ $rooms->lastItem() }} из {{ $rooms->total() }} результатов
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Footer Section Begin -->
    @include('API.Hotel.layouts.footer')
    <!-- Footer Section End -->

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

@endsection