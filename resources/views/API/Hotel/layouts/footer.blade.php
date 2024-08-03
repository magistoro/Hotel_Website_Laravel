<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="#">
                                <img src="{{asset('Hotel/img/footer-logo.png')}}" alt="">
                            </a>
                        </div>
                        <p>Мы вдохновляем миллионы путешественников в 10 странах по всему миру</p>
                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>Контакты</h6>
                        <ul>
                            <li><a href="tel:12345678901">(12) 345 67890</a></li>
                            <li><a href="mailto:magicvision@gmail.com">magicvision@gmail.com</a></li>
                            <li>Тут мог быть адрес, мы работаем по всему миру!</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-newslatter">
                        <h6>Рассылка</h6>
                        <p>Подпишитесь на нашу рассылку.</p>
                        <form action="#" class="fn-form">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul>
                        {{-- <li><a href="{{ route('about-us') }}">Контакты</a></li> --}}
                        <li><a href="#">Политика конфиденциальности</a></li>
                        <li><a href="#">Условия пользования</a></li>
                        <li><a href="#">Инвестиции</a></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="co-text">
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Magic-Vision 
                      <i class="fas fa-hat-wizard"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>