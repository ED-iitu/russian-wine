@extends('layouts.app')
@section('content')
    <div id="winetours">
        <div id="content">
            <div class="heading-wrap">
                <div class="container container-lg">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Винные туры</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-lg">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="white-box-red-dash tour-aim">
                            <h2>Цель винного тура</h2>
                            <div class="text">
                                <p>Познакомить Вас с особенностями региона, показать как возделываются виноградники,
                                    поучаствовать в сборе винограда и конечно узнать как получается вино. </p>
                                <p>Программа тура может быть от одного дня до недели. Все зависит от вашего свободного
                                    времени и бюджета.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-md-offset-1 tour-order">
                        <p>Заказать тур вы можете <br>
                            по телефону: <a href="tel:+7 (915) 457-60-81" class="text-danger">+7 (915) 457-60-81</a><br>
                            или через онлайн форму</p>
                        <form method="post" class="form-common" action="{{route('tour_order')}}">
                            @csrf
                            <div class="">
                                <input name="name" required class="form-control" type="text" placeholder="Имя">
                            </div>
                            <div class="">
                                <input name="phone" required class="form-control" type="text" placeholder="Телефон">
                            </div>
                            <div class="">
                                <img src="{{ captcha_src() }}" alt="captcha1" style="width: 190px; height: 70px;">
                            </div>
                            <div class="p-t-10">
                                <input class="form-control contact-email" type="text"
                                       placeholder="Введите капчу" value="" name="captcha" required>
                            </div>
                            <div class="p-t-10">
                                <button class="form-control" type="button" onclick="refreshCaptcha1()">Обновить капчу</button>
                            </div>
                            <div class="form-group text-center p-t-10">
                                <button type="submit" class="btn-danger">Отправиться в тур</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="background-white">
                <div class="wine-tour-title"><h2>Винный тур</h2></div>
                <div class="container container-lg">
                    <div class="wine-tour-example">
                        <div class="row background-dark-purple ">
                            <div class="col-xs-12 col-md-offset-1 col-md-11">
                                <h2>Пример винного тура</h2>
                            </div>
                        </div>
                        <div class="row background-dark-purple  p-t-30">
                            <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-3">
                                <p>Пример винного тура на винодельню Усадьба Мысхако, расположенную недалеко от Черного
                                    моря в районе г. Новороссийска. </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-7">
                                <img alt="tour example" src="{{asset('image/page/tour/tour_example.jpg')}}"
                                     class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-lg">
                <div class="row p-t-100">
                    <div class="program">
                        <div class="col-xs-12 col-md-5 col-md-push-7 p-b-60">
                            <h2 class="program-title">Программа тура:</h2>
                            <div class="program-types">
                                <img src="{{asset('image/page/tour/icon_program_fly.png')}}" alt="">
                                <img src="{{asset('image/page/tour/icon_program_plates.png')}}" alt="">
                                <img src="{{asset('image/page/tour/icon_program_grapes.png')}}" alt="">
                                <img src="{{asset('image/page/tour/icon_program_press.png')}}" alt="">
                                <img src="{{asset('image/page/tour/icon_program_drink.png')}}" alt="">
                                <img src="{{asset('image/page/tour/icon_program_taste.png')}}" alt="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-7 col-md-pull-5 p-b-30">
                            <div class="white-box-red-dash day-1">
                                <h2>Первый день</h2>
                                <div class="row">
                                    <div class="col-xs-12 col-md-10">
                                        <div class="text">
                                            <ul>
                                                <li>Вылет из Москвы</li>
                                                <li>Прибытие в г. Анапа, встреча, трансфер в г. Новороссийск –
                                                    размещение в отеле Новороссийск
                                                </li>
                                                <li>Прибытие в пос. Федотовка, посещение винодельческого хозяйства
                                                    «Усадьба Мысхако», осмотр виноградников, дегустация
                                                    вин
                                                </li>
                                                <li>Обед в ресторане на винодельне</li>
                                                <li>Свободное время, трансфер к черноморскому пляжу мкурорта Широкая
                                                    Балка,
                                                </li>
                                                <li>Ужин в ресторане Шато Пино</li>
                                                <li>Трансфер в отель Новороссийск</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-5 col-md-push-7 p-b-30 day-2-column">
                            <div class="day-2-wrap">
                                <div class="white-box-red-dash day-2">
                                    <h2>Второй день</h2>
                                    <div class="text">
                                        <ul>
                                            <li>Завтрак в отеле Новороссийск</li>
                                            <li>Трансфер в аэропорт г. Анапа</li>
                                            <li>Вылет в Москву</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container container-lg">
                <div class="row p-t-60 p-b-100">
                    <div class="col-xs-12 col-md-10 col-md-offset-1 text-center tour-what-title">
                        <h2>Это тур выходного дня с знакомством терруара Мысхако, виноделом и винами, а также местной
                            кухней.
                            Даты поездки и стоимость тура согласовываются с Вами персонально</h2>
                    </div>
                </div>
            </div>
            <div style="overflow: hidden">
                <div class="row p-b-100 background-white">
                    <div class="col-xs-12">
                        <img src="{{asset('image/page/tour/tour_field.jpg')}}" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="background-white">
                <div id="tour-carousel" class="carousel slide" data-ride="carousel">
                    <a href="#tour-carousel" class="carousel-control arrow-left" data-slide="prev"><span
                            class="icon-icon_left"></span></a>
                    <a href="#tour-carousel" class="carousel-control arrow-right" data-slide="next">
                        <span class="icon-icon_right"></span></a>

                    <div class="carousel-inner" role="listbox">
                        <!-- slide start -->
                        <div class="item active">
                            <img src="{{asset('image/page/tour/tour_photo.jpg')}}" class="img-responsive">
                        </div>
                        <div class="item">
                            <img src="{{asset('image/page/tour/tour_photo.jpg')}}" class="img-responsive">
                        </div><!-- slide end -->
                    </div>
                    <div class="dots mt-md">
                        <div class="text-center">
                            <ul class="carousel-indicators">
                                <li data-target="#tour-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#tour-carousel" data-slide-to="1" class=""></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="background-white p-b-100">
                <div class="container container-lg">
                    <div class="row">
                        <div class="col-xs-12 col-md-offset-1 col-md-10">
                            <div class="order">
                                <h2>Заказать тур</h2>
                                <form method="post" class="form-common" action="{{route('tour_order')}}">
                                    @csrf
                                    <div class="">
                                        <input name="name"  required class="form-control" type="text"
                                               placeholder="Имя">
                                    </div>
                                    <div class="p-t-30">
                                        <input name="phone" required class="form-control" type="text"
                                               placeholder="Телефон">
                                    </div>
                                    <div class="">
                                        <img src="{{ captcha_src() }}" alt="captcha2" style="width: 190px; height: 70px;">
                                    </div>
                                    <div class="">
                                        <input class="form-control contact-email" type="text"
                                               placeholder="Введите капчу" value="" name="captcha" required>
                                    </div>
                                    <div class="p-t-10">
                                        <button class="form-control" type="button" onclick="refreshCaptcha()">Обновить капчу</button>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="text-center btn-danger m-t-10">
                                            Оставить заявку
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function refreshCaptcha1() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('img[alt=captcha1]').src = data.captcha;
                });
        }

        function refreshCaptcha2() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('img[alt=captcha2]').src = data.captcha;
                });
        }
    </script>
@endsection
