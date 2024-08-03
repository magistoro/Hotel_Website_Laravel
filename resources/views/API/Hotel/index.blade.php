
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
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="{{asset('Hotel/img/flag.jpg') }}" alt="">
                <span>RU <i class="fa fa-angle-down"></i></span>
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
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/rooms">Rooms</a></li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Семейный номер</a></li>
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

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Сердце оазиса</h1>
                        <p>Откройте для себя сказочный уголок природы, где журчащие ручьи и тенистые рощи создают атмосферу безмятежности.</p>
                        <a href="#" class="primary-btn">Узнать больше</a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Забронируй отель</h3>
                        <form form action="{{ route('rooms.search') }}" method="GET">
                            <div class="check-date">
                                <label for="date-in">Заезд:</label>
                                <input type="text" class="date-input" id="date-in"  name="date_in" required autocomplete="off">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Выезд:</label>
                                <input type="text" class="date-input" id="date-out" name="date_out" required autocomplete="off">
                                <i class="icon_calendar"></i>
                            </div>

                            <div class="select-option">
                                <label for="guest">Гостей:</label>
                                <select  name="people_count"  id="guest">
                                    <option value="1">1 Гость</option>
                                    <option value="2">2 Гостя</option>
                                    <option value="3">3 Гостя</option>
                                    <option value="4">Больше 3-х гостей</option>
                                </select>
                            </div>
                          
                            <button type="submit">Поиск номера</button>
                        </form>

                          {{-- <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                    <option value="">2 Room</option>
                                </select>
                            </div> --}}
                            
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{asset('Hotel/img/hero/hero-1.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{asset('Hotel/img/hero/hero-2.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{asset('Hotel/img/hero/hero-3.jpg') }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>О нас</span>
                            <h2>Базграничная <br/>гармония и расслабление</h2>
                        </div>
                        <p class="f-para">Окутайтесь в мягкие объятия уюта и спокойствия. 
                            Ощутите, как тело и разум погружаются в состояние блаженного покоя, 
                            отпуская все волнения и суету повседневности.
                        </p>
                        <p class="s-para">Найдите внутреннюю гармонию вмести с нами.</p>
                        <a href="#" class="primary-btn about-btn">Читать больше</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{asset('Hotel/img/about/about-1.jpg') }}" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset('Hotel/img/about/about-2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>наши услуги</span>
                        <h2>Всё про наш Сервис</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>План путешествия</h4>
                        <p>Мы тщательно продумали маршрут, чтобы вы смогли открыть для себя самые живописные уголки нашего региона. Будьте готовы к незабываемым впечатлениям и ярким эмоциям!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Ресторан</h4>
                        <p>Наш ресторан приглашает вас в кулинарное путешествие по лучшим традициям местной кухни. 
                            Шеф-повар создает поистине изысканные блюда, сохраняя аутентичный вкус и используя только свежие сезонные ингредиенты.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Спальни</h4>
                        <p>Уютные и комфортные номера нашего отеля созданы, чтобы подарить вам ощущение релакса и полноценного отдыха. 
                            Мы позаботились о каждой детали, чтобы вы могли насладиться спокойным и глубоким сном после насыщенного дня.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Прачечная</h4>
                        <p>Мы понимаем, как важно, чтобы ваша одежда всегда была чистой и опрятной во время путешествия. 
                            Наши профессиональные сотрудники с заботой и вниманием выполнят стирку, сушку и глажку ваших вещей, чтобы они были готовы к новым приключениям.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Водитель</h4>
                        <p>Команда опытных и ответственный водителей всегда готовых обеспечить вам комфортные и безопасные перевозки.
                            Он досконально знает местность и может предложить интересные маршруты, чтобы вы в полной мере насладились городскими пейзажами и достопримечательностями.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>Бар</h4>
                        <p>Опытные бармены с радостью помогут вам подобрать идеальный напиток, будь то освежающий коктейль или классический напиток. Продегустируйте местные специалитеты и расслабьтесь в непринужденной атмосфере нашего бара.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{asset('Hotel/img/room/room-b1.jpg') }}">
                            <div class="hr-text">
                                <h3>Двухместный номер</h3>
                                <h2>199$<span>/Ночь </span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Размер:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Вместимость:</td>
                                            <td>5 (чел.)</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Кровать:</td>
                                            <td>Королевская</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Удобства:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">УЗНАТЬ БОЛЬШЕ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{asset('Hotel/img/room/room-b2.jpg') }}">
                            <div class="hr-text">
                                <h3>Номер "Премиум"</h3>
                                <h2>159$<span>/Ночь</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Размер:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Вместимость:</td>
                                            <td>5 (чел.)</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Кровать:</td>
                                            <td>Королевская</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Удобства:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">УЗНАТЬ БОЛЬШЕ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{asset('Hotel/img/room/room-b3.jpg') }}">
                            <div class="hr-text">
                                <h3>Номер "Делюкс"</h3>
                                <h2>198$<span>/Ночь</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Размер:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Вместимость:</td>
                                            <td>5 (чел.)</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Кровать:</td>
                                            <td>Королевская</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Удобства:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">УЗНАТЬ БОЛЬШЕ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{asset('Hotel/img/room/room-b4.jpg') }}">
                            <div class="hr-text">
                                <h3>Семейный номер</h3>
                                <h2>299$<span>/Ночь</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Размер:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Вместимость:</td>
                                            <td>5 (чел.)</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Кровать:</td>
                                            <td>Королевская</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Удобства:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">УЗНАТЬ БОЛЬШЕ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>РЕКОМЕНДАЦИИ</span>
                        <h2>Что говорят клиенты?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                            <p>Великолепный отель с невероятно дружелюбным персоналом! Во время нашего короткого отпуска мы почувствовали себя как дома. Номера были просторными и чистыми, а завтраки - восхитительными. Обязательно вернемся сюда в следующий раз!</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Мария Соколова</h5>
                            </div>
                            <img src="{{asset('Hotel/img/testimonial-logo.png')}}" alt="">
                        </div>
                        <div class="ts-item">
                            <p>Отель превзошел все наши ожидания! Идеальное расположение в самом сердце города, уютная атмосфера и продуманные до мелочей удобства. Персонал всегда был готов помочь и ответить на любые вопросы. Это было одно из лучших наших путешествий!</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Михаил Васильев</h5>
                            </div>
                            <img src="{{asset('Hotel/img/testimonial-logo.png')}}" alt="">
                        </div>
                        <div class="ts-item">
                            <p>Остановившись в этом отеле, мы получили незабываемые впечатления! Современный дизайн, безупречная чистота и комфортабельные номера - все это сделало наш отдых максимально приятным. Кроме того, здесь есть отличный ресторан с восхитительной кухней. Определенно рекомендуем!</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Софья Никитина</h5>
                            </div>
                            <img src="{{asset('Hotel/img/testimonial-logo.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>НОВОСТИ ОТЕЛЯ</span>
                        <h2>Блог & Мероприятия</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{asset('Hotel/img/blog/blog-1.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="#">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{asset('Hotel/img/blog/blog-2.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="#">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg=" {{asset('Hotel/img/blog/blog-3.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-item small-size set-bg" data-setbg=" {{asset('Hotel/img/blog/blog-wide.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Trip To Iqaluit In Nunavut A Canadian Arctic City</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item small-size set-bg" data-setbg=" {{asset('Hotel/img/blog/blog-10.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Travel</span>
                            <h4><a href="#">Traveling To Barcelona</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 12th April, 2019</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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

    <script>
          document.addEventListener('DOMContentLoaded', function() {
          $(".date-input").datepicker({
        minDate: 0,
        dateFormat: 'dd.mm.yy'
    });
});
    </script>
  @endsection