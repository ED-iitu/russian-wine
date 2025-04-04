@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/page/subscription.css')}}">
@endpush
@section('content')
    <div id="product-category" class="container">
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="row">
                    <div class="col-sm-10">
                        <div id="top_podpiska">
                            <div id="bannertitle">
                                <div id="title">
                                    Подписка<br> на вино
                                </div>
                                <div class="inner f26pl">
                                    <p class="mobileHidden">Как же порой трудно ориентироваться в мире вина, особенно
                                        Русского! Чтобы
                                        облегчить Вам решение этой непростой задачи, мы сами отобрали лучшие вина и
                                        скомпоновали их в сеты. Оформите подписку на вино, и Вы станете обладателем
                                        редких вин, тираж которых может быть ограничен всего одной бочкой в год!
                                    </p>
                                    <p class="desktopHidden">Как же порой трудно ориентироваться в мире вина, особенно
                                        Русского! Чтобы
                                        облегчить Вам решение этой непростой задачи, мы сами отобрали лучшие вина и
                                        скомпоновали их в сеты.
                                    </p>
                                    @foreach($sets as $set)
                                        <a href="{{route('set', $set->slug)}}?type=subscription">
                                            <button id="podpiska" class="btn btn-danger desktopHidden" data-toggle="modal" data-target="#modal_podpiska">
                                                Оформить подписку
                                            </button>
                                        </a>
                                        @break
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="firstblock">
                            <div class="col-sp-11">
                                <img alt="" class="visible-xs" src="{{asset('image/page/subscription/first_img_mb.png')}}">
                                <div class="text_s_s">
                                    <p>
                                        При оформлении подписки, Вы станете ежемесячно получать сет из 6 бутылок
                                        вина с описанием что это за вино, винодельни где эти вина произведены, и кто
                                        винодел. Сет будет обновляться каждый месяц.

                                    </p>
                                    <p class="mobile-hide">
                                        Более того, при оформлении подписки Вы будете гарантированно получать вина,
                                        которые нельзя будет купить в винотеках.
                                    </p>
                                    @foreach($sets as $set)
                                        <a href="{{route('set', $set->slug)}}?type=subscription">
                                            <button id="podpiska" data-toggle="modal" data-target="#modal_podpiska">
                                                оформить подписку
                                            </button>
                                        </a>
                                        @break
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sp-13">
                                <img alt="" class="image_s_s" src="{{asset('image/page/subscription/first_img.png')}}">
                            </div>
                            <h2 id="sety-title">СЕТЫ</h2>
                        </div>
                        <div id="secondblock">
                            <h3 class="visible-xs subscription-title">Выберите сет и оформите подписку</h3>
                            @foreach($sets as $set)
                                <div class="col-sp-8">
                                    <div class="podpiska-thumb">
                                        <a href="{{route('set', $set->slug)}}?type=subscription"></a>
                                        <img alt="{{$set->title}}"
                                             class="subscription-image" src="{{Voyager::image($set->subscription_image)}}">
                                        <div class="desc-mask">
                                            <h4>{{$set->title}}</h4>
                                            <div class="description subscription">
                                                {!! $set->description !!}
                                                <img alt="icon_pluc" class="fordesc"
                                                     src="{{asset('image/page/subscription/plus.png')}}">
                                                <img alt="link_icon" src="{{asset('image/hlink-bg.png')}}"
                                                     class="visible-xs mt-md">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="thirdblock">
                            <div class="col-sp-13">
                                <div class="newsletter">
                                    <h4>Годовая подписка</h4>
                                    <img alt="subscription_last" class="visible-xs" src="{{asset('image/page/subscription/lastimg.jpg')}}">
                                    <p>
                                        Особое предложение для тех кто любит вино, постоянно экспериментирует и
                                        находится в активном поиске редких вин.
                                    </p>
                                    <p>
                                        Оформив годовую подписку на вино, Вам гарантирован приоритет в получении
                                        особо редких вин, специальные предложения и эксклюзивная скидка 20% на все
                                        вина, которые вы будете получать в течении года.
                                    </p>
                                    <a href="{{route('set', $sale_set->slug)}}">
                                        <button id="podpiska-god">Оформить годовую подписку</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sp-11">
                                <img alt="subscription_last" src="{{asset('image/page/subscription/lastimg.jpg')}}">
                                <img alt="subscription_last" src="{{asset('image/page/subscription/lastimg.jpg')}}"
                                     class="abs_img">
                            </div>
                        </div>
                        <div id="pod_lastblock">
                            <div class="col-sp-24">
                                <img alt="bokal" class="bokal" src="{{asset('image/page/subscription/bokal.png')}}">
                                <h2>-20%</h2>
                            </div>
                            <div class="col-sp-12">
                                <button id="question"
                                        onclick="document.getElementById('modal_sviaz').style.display = 'block';$('#blur_cont').attr('class','show');$('body').attr('class','nooverflow');">
                                    задать вопрос
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal winery-modal" id="modal_sviaz" style="display:none;">
        <button class="winery-close" type="button"
                onclick="document.getElementById('modal_sviaz').style.display = 'none'; $('body').removeClass('nooverflow')">
        </button>
        <form method="post" action="{{route('ask-question')}}">
            @csrf
            <h2 id="form-title-feedback" class="text-center">Задать вопрос</h2>
            <input type="text" name="name" placeholder="Имя" required="required">
            <input type="text" name="contact" placeholder="Телефон или e-mail"
                   required="required"
                   onclick="$(this).removeClass('wrong');$(this).attr('placeholder', 'Телефон или e-mail');">
            <input type="text" id="text1" name="message" placeholder="Сообщение">
            <img src="{{ captcha_src() }}" alt="captcha" style="width: 190px; height: 70px;">

            <input type="text" name="captcha" placeholder="Введите капчу" required>

            {{-- Обновить капчу без перезагрузки --}}
            <button class="form-control" type="button" onclick="refreshCaptcha()">Обновить капчу</button>
            <button type="submit" id="feedsend" value="Отправить">Отправить сообщение</button>
        </form>
    </div>
@endsection
