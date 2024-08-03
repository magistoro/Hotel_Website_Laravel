<header class="header-section {{ Request::is('home') ? '' : 'header-normal'}}">
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/">
                            <img src=" {{asset('Hotel/img/logo.png')}} " alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="/">Главная</a></li>
                                <li class="{{ Request::is('rooms*') ? 'active' : '' }}"><a href="/rooms">Номера</a></li>
                                <li class="{{ Request::is('about-us*') ? 'active' : '' }}"><a href="/about-us">О нас</a></li>
                                <li class="{{ Request::is('pages*') ? 'active' : '' }}"><a href="/pages">Услуги</a>
                                    <ul class="dropdown">
                                        <li><a href="./room-details.html">Спа-центр</a></li>
                                        <li><a href="./blog-details.html">Фитнес-центр</a></li>
                                        <li><a href="#">Конференц-залы</a></li>
                                        <li><a href="#">Трансфер</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::is('blog*') ? 'active' : '' }}"><a href="/blog">Блог</a></li>
                                <li class="{{ Request::is('contact*') ? 'active' : '' }}"><a href="/contact">Контакты</a></li>
                            </ul>
                        </nav>
                        <div class="nav-right search-switch">
                            <i class="icon_search"></i>
                        </div>
                        <div class="nav-right">
                            @if(Auth::check())
                            <a href="{{ route('account') }}" class="user-icon">
                                {{ Auth::user()->name }} <i class="fas fa-user"></i>
                              @else
                              <a href="{{ route('login') }}" class="user-icon"> Вход <i class="fas fa-user"></i>
                              @endif
                            </a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
