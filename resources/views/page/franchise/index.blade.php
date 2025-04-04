@extends('layouts.app')
@section('title', $page->meta_title)
@section('description', $page->meta_description)
@section('keywords', $page->meta_keywords)
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/franchise.css') }}">
@endpush
@section('content')
    <div id="franchise">
        <div id="content">
            <div class="heading-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Хотите открыть винный магазин<br/>в своём городе?</h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <h2 class="title-shop">Русское Вино</h2>
                </div>
                <div class="container-fluid cont-center">
                    <div class="row">
                        <div class="col-xs-12 col-md-4 mb-md px-3 pl-6">
                            <div class="header-image-box">
                                <img alt='header_image' src="{{asset('image/page/franchise/header_slider_1.png')}}">
                                <div class="text-block">
                                    <h2>Винотека<br>редких вин</h2>
                                    <p>Вина отобраны из топовых виноделен и небольших фермерских хозяйств России </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 mb-md pl-6 pr-6">
                            <div class="header-image-box">
                                <img alt='header_image' src="{{asset('image/page/franchise/header_slider_2.png')}}">
                                <div class="text-block">
                                    <h2>Более 400 видов<br>Русских Вин</h2>
                                    <p>Это эксклюзивная и самая полная коллекция лучших Русских Вин</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 mb-md px-3 pr-6">
                            <div class="header-image-box">
                                <img alt='header_image' src="{{asset('image/page/franchise/header_slider_3.png')}}">
                                <div class="text-block">
                                    <h2>Лучшая цена</h2>
                                    <p>Лучшая цена гарантирована прямыми поставками от производителя</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="background-white">
                <div class="container px-0">
                    <div class="row">
                        <div class="col-md-7 pl-8">
                            <div class="searching">
                                <p id="searching">Мы ищем партнера, который готов открыть мир Русского Вина для своих
                                    клиентов,<br>при этом организовать собственный успешный бизнес проект</p>
                            </div>
                        </div>
                        <div class="col-md-3 px-3 col-md-offset-1 searching-result">
                            <p>Окупаемость</p>
                            <h4>14 <b>mec.</b></h4>
                            <p>Рентабельность</p>
                            <h4>50 <b>%</b></h4>
                            <p>Роялти</p>
                            <h4>7 <b>%</b></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 background-dark-purple get-partner-block">
                    <h3>Что вы получаете как партнер:</h3>
                </div>
            </section>
            <!-- end degustation -->
            <div class="background-dark-purple partner-result-container py-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Успешный и уникальный бизнес</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Фирменый и стиль</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Мы предоставляем консультации
                                    и сопровождение проекта </h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Обучение персонала
                                    и кавистов </h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Персональное сопровождение партнера
                                    при открытии магазина </h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Сервисы сайта Русское Вино: подписка на вино, сеты, именное вино</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Уникальная коллекция Русских вин лучших виноделен страны</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="get-partner-result-block">
                                <h4>Прямая логистика алкогольной продукции
                                    со склада г. Москвы </h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container requirement">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-9 pr-8 pl">
                        <div class="col-md-12 mb-sm pl-0">
                            <h2>Необходимые требования к партнеру:</h2>
                        </div>
                        <div class="col-md-12 partner-requirement">
                            <div class="col-md-8">Минимальная площадь под магазин</div>
                            <div class="col-md-4"> 50 кв.м.</div>
                        </div>
                        <div class="col-md-12  partner-requirement">
                            <div class="col-md-8">
                                Первоначальные инвестиции в ремонт, оборудование, лицензию и т.п.
                            </div>
                            <div class="col-md-4">
                                1 000 000 рублей
                            </div>
                        </div>
                        <div class="col-md-12 partner-requirement">
                            <div class="col-md-8">Оборотные средства</div>
                            <div class="col-md-4">1 000 000</div>
                        </div>
                        <div class="col-md-12 partner-requirement">
                            <div class="col-md-8">Необходимое количество сотрудников</div>
                            <div class="col-md-4">3 человек</div>
                        </div>
                        <div class="col-md-12 partner-requirement">
                            <div class="col-md-8">Условия по франшизе</div>
                            <div class="col-md-4">5% от общего товарооборота</div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 requirement-right-box">
                        <div class="">
                            <h2>Так же необходимо</h2>
                            <p>Расположение магазина в оживленном месте, наличие трафика</p>
                            <p> Соответствие помещения требованиям федерального закона для получения алкогольной
                                лицензии</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid contact-block">
                <div class="row">
                    <div class="col-xs-12 col-md-4  pl-8">
                        <div class="contact">
                            <h2>Если Вас заинтересовал наш проект,<br>свяжитесь с нами</h2>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-offset-1 col-md-6 bg-gray">
                        <div class="col-md-10">
                            <div class="contact">
                                <form method="post" class="form-common" action="{{route('franchise-order')}}">
                                    @csrf
                                    <div class="p-t-0">
                                        <input name="name" class="form-control" type="text"
                                               placeholder="Имя" required>
                                    </div>
                                    <div class="p-t-0">
                                        <input name="phone" class="form-control" type="text"
                                               placeholder="Телефон" required>
                                    </div>
                                    <div class="p-t-1">
                                        <img src="{{ captcha_src() }}" alt="captcha" style="width: 190px; height: 70px;">
                                    </div>
                                    <div class="p-t-0">
                                        <input class="form-control" type="text" name="captcha" placeholder="Введите капчу" required>
                                    </div>
                                    <div class="p-t-1">
                                        {{-- Обновить капчу без перезагрузки --}}
                                        <button class="form-control" type="button" onclick="refreshCaptcha()">Обновить капчу</button>
                                    </div>
                                    <div class="text-left p-t-0">
                                        <input type="submit" class="btn-danger"
                                               value="Оставить заявку" style="font-size: 2.4rem">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function refreshCaptcha() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('img[alt=captcha]').src = data.captcha;
                });
        }
    </script>

    <script type="text/javascript"><!--
        var mySwiper = new Swiper('.swiper-container', {
            slidesPerView: 'auto',
            spaceBetween: 0,

            loop: true,
            initialSlide: 4,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
        $(window).resize(function () {
            var ww = $(window).width()
            if (ww > 1000) mySwiper.params.loopFillGroupWithBlank = true;
            if (ww > 1000) mySwiper.params.centeredSlides = true;
            if (ww > 1000) mySwiper.params.center = true;
            if (ww > 1000) mySwiper.params.spaceBetween = 30;
        })
        $(window).trigger('resize')
        --></script>
@endpush
