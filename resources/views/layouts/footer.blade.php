<footer class="nav-folderized">
    <div class="container container-lg">
        <div class="row ">
            <div class="ftr__list nav col-sm-3 col-md-4 col-lg-3 col-lg-push-3">
                <h5 onclick="$('#footer1').toggleClass('footerUl');">Клиентам <i class="fa fa-chevron-down"></i></h5>
                <ul class="list-unstyled" id="footer1">
                    <li><a href="{{route('wine-shop')}}">{{trans('header.wine')}}</a></li>
                    <li><a href="{{route('sets')}}">{{trans('footer.sets')}}</a></li>
                    <li><a href="{{route('subscription')}}">{{trans('header.subscription')}}</a></li>
                    <li><a href="{{route('personal-wine')}}">{{trans('header.personal-wine')}}</a></li>
                    <li><a href="{{route('tastings')}}">{{trans('header.testing')}}</a></li>
                </ul>
            </div>
            <div class="ftr__list nav col-sm-3 col-md-4 col-lg-3 col-lg-push-3">
                <h5 onclick="$('#footer2').toggleClass('footerUl');">Информация <i class="fa fa-chevron-down"></i></h5>
                <ul class="list-unstyled" id="footer2">
                    <li><a href="/winemaking-regions">Регионы виноделия</a></li>
                    <li><a href="/wineries">Винодельни</a></li>
                    <li><a href="/winemakers">Виноделы</a></li>
                    <li><a href="/where-to-buy">Где купить</a></li>
                    <li><a href="{{route('simple_page','agreement')}}">{{trans('footer.agreement')}}</a></li>
                </ul>
            </div>
            <div class="ftr__list nav col-sm-3 col-md-3 col-lg-2 col-lg-push-3">
                <h5 onclick="$('#footer3').toggleClass('footerUl');">Партнерам <i class="fa fa-chevron-down"></i></h5>
                <ul class="list-unstyled" id="footer3">
                    <li><a href="{{route('simple_page','distributors')}}">{{trans('footer.distributors')}}</a></li>
                    <li><a href="{{route('franchise')}}">{{trans('header.franchise')}}</a></li>
                    <li><a href="{{route('wine-tour')}}">{{trans('footer.tour')}}</a></li>
                </ul>
            </div>
            <div class="footer-contact col-sm-5 col-md-5 col-lg-3 col-lg-push-3">
                <div class="phone"><a href="tel:+7 (915) 457-60-81">+7 (915) 457-60-81</a></div>
                <div class="email"><a href="mailto:info@russianvine.ru">info@russianvine.ru</a></div>
                <div class="social">
                    <a href="https://instagram.com/russianvine.ru?igshid=1kot521x7b8l">
                      <img alt='instagram-icon' src="{{ asset ('image/iconInst.png') }}"></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCN-RcIaaNGUmZBYg9HJtoKg">
                        <img alt="youtube-icon" src="{{ asset ('image/youtube.png') }}">
                    </a>
                    <a href="https://zen.yandex.ru/id/5cdfc1be0a0d8b00b24d0819 ">
                        <img alt="yandexzen-icon" src="{{ asset ('image/zen-icon.svg') }}"></a>
                </div>
            </div>
            <div class="footer-logo col-sm-12 col-md-12 col-lg-3 col-lg-pull-8">
                <h5>
                    <a href="{{route('home')}}" id="footer_logo">
                        <img title="{{Voyager::setting('site.title')}}" alt="{{Voyager::setting('site.title')}}"
                             src="{{ Voyager::image(setting('site.logo'))}}">
                    </a>
                </h5>
                <p class="about">
                    Сайт о Русском Вине, виноделах <br>
                    и винодельнях. Все права защищены
                </p>
                <div class="eighteenplus">18+</div>
            </div>
        </div>
    </div>
</footer>
