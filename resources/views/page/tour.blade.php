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
                        <form method="post" class="form-common" action="{{ route('tour_order') }}">
                            @csrf
                            <input name="name" required class="form-control" type="text" placeholder="Имя">
                            <input name="phone" required class="form-control" type="text" placeholder="Телефон">

                            <img id="captcha-img" src="" alt="captcha" style="width: 190px; height: 70px;" class="p-t-10">
                            <input class="form-control contact-email p-t-10" type="text" placeholder="Введите капчу" name="captcha" required>
                            <button class="form-control p-t-10" type="button" onclick="refreshCaptcha()">Обновить капчу</button>

                            <input type="hidden" name="form_id" value="form1">
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
                        <!-- Твой блок "Пример тура" без изменений -->
                    </div>
                </div>
            </div>

            <div class="container container-lg">
                <!-- Твой блок "Программа тура" без изменений -->
            </div>

            <div class="container container-lg">
                <div class="row p-t-60 p-b-100">
                    <div class="col-xs-12 col-md-10 col-md-offset-1 text-center tour-what-title">
                        <h2>Это тур выходного дня с знакомством терруара Мысхако, виноделом и винами, а также местной кухней. Даты поездки и стоимость тура согласовываются с Вами персонально</h2>
                    </div>
                </div>
            </div>

            <div style="overflow: hidden">
                <div class="row p-b-100 background-white">
                    <div class="col-xs-12">
                        <img src="{{ asset('image/page/tour/tour_field.jpg') }}" class="img-responsive">
                    </div>
                </div>
            </div>

            <div class="background-white">
                <!-- Твой carousel блок без изменений -->
            </div>

            <div class="background-white p-b-100">
                <div class="container container-lg">
                    <div class="row">
                        <div class="col-xs-12 col-md-offset-1 col-md-10">
                            <div class="order">
                                <h2>Заказать тур</h2>
                                <form method="post" class="form-common" action="{{ route('tour_order') }}">
                                    @csrf
                                    <input name="name" required class="form-control" type="text" placeholder="Имя">
                                    <input name="phone" required class="form-control p-t-30" type="text" placeholder="Телефон">

                                    <img id="captcha-img-2" src="" alt="captcha" style="width: 190px; height: 70px;" class="p-t-10">
                                    <input class="form-control contact-email p-t-10" type="text" placeholder="Введите капчу" name="captcha" required>
                                    <button class="form-control p-t-10" type="button" onclick="refreshCaptcha()">Обновить капчу</button>

                                    <input type="hidden" name="form_id" value="form2">
                                    <div class="form-group text-center">
                                        <button type="submit" class="text-center btn-danger m-t-10">Оставить заявку</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function refreshCaptcha() {
                fetch('/refresh-captcha')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('captcha-img').src = data.captcha;
                        document.getElementById('captcha-img-2').src = data.captcha;
                    });
            }

            window.onload = function () {
                refreshCaptcha();
            };
        </script>
    </div>
@endsection