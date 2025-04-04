@extends('layouts.app')
@section('body_class', 'overflow-hidden footer-hide')
@section('content')
    <style>
        .swiper-container {
            width: 100%;
            height: 100vh;
        }

        .swiper-slide {
            min-height: 100vh;
            width: 100%;
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>

    <div id="information-informationwc" class="imennoe">
        <div class="row">
            <div id="content" class="col-sm-12">
                <!-- Swiper -->
                <div class="swiper-container swiper-container-h">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" id="slide-1">
                            <div id="first-slide-d">
                                <h6 class="slide-ht">Именное <br/>вино</h6>
                                <div class="slide-tl">
                                    <p>
                                        Наверное, каждый из нас мечтал<br/>
                                        о личном шато в окружении собственных<br/> виноградников<br/>
                                        на берегу лазурного моря.<br/>
                                    </p>
                                    <p>
                                        Но мы живём в современных городах и<br/> максимум, что можем позволить - это
                                        винный<br/> погреб в своём доме.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" id="slide-2">
                            <div class="slide-mt">
                                Однако идея<br/>
                                выпустить своё<br/>
                                именное вино <br/>
                                нас не покидает...
                            </div>
                        </div>
                        <div class="swiper-slide" id="slide-3">
                            <div class="col-ss-7">

                            </div>
                            <div class="col-ss-5">
                                <h6 class="slide-mt">Проект Негоциант</h6>
                                <div class="slide-tl">
                                    <p>
                                        Проект «Негоциант» предлагает Вам создать коллекцию собственного вина, не выходя
                                        из дома.
                                    </p>
                                    <p>
                                        Мы подберем для Вас вино от лучших российских микровиноделен Крыма, Кубани,
                                        Ростова, Волгограда и Владикавказа.
                                    </p>
                                    <p>
                                        Мы проведём для Вас дегустацию и вместе с Вами выберем то вино, которое вам
                                        подходит.
                                    </p>
                                </div>
                                <div class="slide-m">
                                    Это будут вина, которые виноделы выпускают всего по одной бочке в год.
                                </div>

                            </div>
                        </div>
                        <div class="swiper-slide" id="slide-4">
                            <div class="col-ss-5">
                                <h6 class="slide-mt">Эксклюзив</h6>
                                <p class="slide-tl">
                                    Выбрав в результате приватной дегустации «своё» вино,<br/> мы согласуем с Вами
                                    оформление, тираж и контрактные сроки поставки.
                                </p>
                                <div class="slide-m">
                                    <img alt="slide" src="{{asset('image/page/personal/slide4-2.jpg')}}">
                                    <p>
                                        Общий тираж<br/> Вашего именного вина<br/> составит 300 бутылок
                                    </p>
                                </div>

                            </div>
                            <div class="col-ss-7">

                            </div>
                        </div>
                        <div class="swiper-slide" id="slide-5">
                            <div id="left-side">
                                <h6 class="slide-mt">Именное вино<br/> менее, чем за год</h6>
                                <div class="slide-tr">
                                    <p>
                                        Мы готовим вино для Вас, производим розлив<br/> и оформление вина после выдержки
                                        в<br/> дубовой бочке. Возможен розлив в бутылки <br/>0,75 л и магнумы 1,5
                                        л.<br/>
                                    </p>
                                    <p>
                                        И Вы получаете своё личное вино <br/> через девять месяцев.
                                    </p>
                                </div>
                            </div>
                            <div id="right-side">
                                <h6 class="slide-m">А можно и<br/>через месяц</h6>
                                <p class="slide-tr">
                                    В качестве альтернативы предлагаем оформить контракт на готовую бочку вина. После
                                    согласования оформления этикетки и сроков розлива можно будет получить готовое вино
                                    примерно через 1 месяц.
                                </p>
                            </div>


                        </div>
                        <div class="swiper-slide" id="slide-6">
                            <div class="col-sss-4">
                                <h6 class="slide-mt">Винодельни</h6>
                                <div class="slide-tr">
                                    <p>
                                        Все вина мы персонально отбираем на небольших винодельнях и даём гарантию на
                                        каждую бутылку. Залогом этого являются лучшие терруары страны, зрелые лозы и
                                        высококачественный виноград.
                                    </p>
                                    <p>
                                        Авторские винодельни, владельцы которых являются и виноделами, следят за всеми
                                        процессами персонально и создают вина с высоким потенциалом.
                                    </p>
                                </div>
                            </div>
                            <div class="col-sss-8">
                                <div class="swiper-container swiper-container-v">
                                    <div class="swiper-wrapper">
                                        @foreach($wineries as $winery)
                                            <div class="swiper-slide">
                                                <div class="preview" onclick="preview({{$winery->id}})">
                                                    <img src="{{Voyager::image($winery->nominal_image)}}" alt="image">
                                                    <span>{{$winery->title}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination swiper-pagination-v"></div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-h"></div>
                </div>
                <!-- Swiper JS -->

                <!-- Initialize Swiper -->
                @push('scripts')
                    <script>
                        if ($(window).width() > 992) {
                            var swiperH = new Swiper('.swiper-container-h', {
                                direction: 'vertical',
                                mousewheel: true,
                                speed: 550,
                                slidesPerView: 1,
                                pagination: {
                                    el: '.swiper-pagination-h',
                                    clickable: true,
                                },
                                keyboard: {
                                    enabled: true,
                                },
                            });
                            var swiperV = new Swiper('.swiper-container-v', {
                                slidesPerView: 3,
                                centeredSlides: true,
                                mousewheel: true,
                                loopFillGroupWithBlank: true,
                                loop: true,
                                pagination: {
                                    el: '.swiper-pagination-v',
                                    clickable: true,
                                    type: 'fraction',
                                },
                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev',
                                },
                                keyboard: {
                                    enabled: true,
                                },

                            });
                        } else {
                            var swiperMobileV = new Swiper('.swiper-container-v', {
                                slidesPerView: 1,
                                centeredSlides: false,
                                mousewheel: false,
                                loopFillGroupWithBlank: true,
                                loop: true,
                                pagination: {
                                    el: '.swiper-pagination-v',
                                    clickable: true,
                                    type: 'bullets',
                                },
                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev',
                                },
                                keyboard: {
                                    enabled: true,
                                },

                            });
                        }

                        if ($(window).width() < 992) {
                            $('body').addClass('overflow-auto');
                            $('body').removeClass('overflow-hidden');
                        }
                        if ($(window).width() > 992) {
                            $('body').addClass('overflow-hidden');
                            $('body').removeClass('overflow-auto');
                        }

                    </script>
                    <script>
                        $(document).ready(function () {
                            $('.information-winerywc').hide()
                        });

                        function preview(id) {
                            $('.winery-modal-' + id).show()
                            $('.imennoe').hide()
                            $('.close_click').removeClass('hidden')
                        }

                        function close_winery_modal() {
                            $('.information-winerywc').hide()
                            $('.imennoe').show()
                            $('.close_click').addClass('hidden')
                        }
                    </script>
                    <script>
                        if ($(window).width() < 991) {
                            $('.imennoe .swiper-container-h > .swiper-wrapper').attr('class', '');

                            var section = $('#slide-6');
                            var sectin = $('#slide-6 .col-sss-4').height();
                            var speche = $(section).height() - sectin;

                            var sectionTop = section.offset().top + $(window).height() - $('header').height();
                            var sectionTop1 = section.offset().top + $(window).height() + $('header').height();
                            var section1 = $('.swiper-pagination.swiper-pagination-v');
                            var sectionTop2 = section1.offset().top;
                            $('.imennoe #slide-1 .slide-tl p:first-child').html('Наверное, каждый из нас мечтал<br> о личном шато в окружении<br> собственных виноградников<br> на берегу лазурного моря.<br>');
                            $('#slide-1').append('<img src="{{asset('image/mouse-personal.png')}}   " id="mob-mouse" />');
                            var setion = $('#slide-5');
                            var setionTop = setion.offset().top;
                            // $(window).bind('scroll', function () {
                            //     var windowTop = $(window).scrollTop() + $(window).height();

                            //     if (windowTop > sectionTop) {
                            //         $('#slide-6 .col-sss-4').addClass('fixxed');
                            //         $(section).attr('style', 'height:' + $(section).height() + 'px;padding-top:' + sectin + 'px;');
                            //     }
                            //     if (windowTop < sectionTop1) {
                            //         $('#slide-6 .col-sss-4').removeClass('fixxed')
                            //     }
                            //     if (windowTop > sectionTop2) {
                            //         $('#slide-6 .col-sss-4').addClass('tothetop');
                            //     }
                            //     if (windowTop < sectionTop2) {
                            //         $('#slide-6 .col-sss-4').removeClass('tothetop');

                            //     }
                            //     if (windowTop > setionTop) {
                            //         $('#slide-5').addClass('showbg');

                            //     }
                            //     if (windowTop < setionTop) {
                            //         $('#slide-5').removeClass('showbg');

                            //     }
                            // });
                        }
                    </script>
                @endpush

            </div>
        </div>
    </div>

    @foreach($wineries as $winery)
        <div id="information-winerywc" class="information-winerywc winery-modal-{{$winery->id}}">
            <p class="close_click hidden" onclick="close_winery_modal()">
                <img alt="close_icon" src="{{asset('image/closeicon.png')}}" style="width: 4.5rem; top: 4rem;">
            </p>
            <div class="col-ss-6">
            <h1 class="forwc">{{$winery->title}}</h1>
                <div class="swiper-container swiper-container-winery">
                    <div class="swiper-wrapper">
                        @foreach($winery->images as $block)
                            @if ($block->type_id == 4)
                                <div class="swiper-slide"><img alt="image" src="{{Voyager::image($block->image)}}"/>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="col-ss-6">

                <div class="winery-rt">
                    <h6>{{$winery->region->title}}</h6>
                    {!! $winery->description  !!}
                </div>
                <button id="imennoe" onclick="document.getElementById('modal_sviaz').style.display = 'block';">хочу
                    именное вино
                </button>
            </div>
            @push('scripts')
                <script>
                    var swiper = new Swiper('.swiper-container-winery', {
                        loop: true,
                        slidesPerView: 1,
                        pagination: {
                            el: '.swiper-pagination',
                            type: 'fraction',
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });
                    $(".swiper-container-winery .swiper-pagination-fraction").html("<span class='swiper-pagination-current'>1</span>" +
                        "<span class='swiper-pagination-total'>5</span>");
                </script>
            @endpush
        </div>
    @endforeach
    <div class="modal winery-modal" id="modal_sviaz" style="display:none;">
        <button class="winery-close" type="button" class="close"
                onclick="document.getElementById('modal_sviaz').style.display = 'none';">
        </button>
        <form method="post" action="{{route('personal-wine-order')}}">
            @csrf
            <h2 id="form-title-feedback">Оставить заявку</h2>
            <input type="text" name="name" placeholder="Имя" required="required">
            <input type="text" name="contact" placeholder="Телефон или e-mail"
                   required="required"
                   onclick="$(this).removeClass('wrong');$(this).attr('placeholder', 'Телефон или e-mail');">
            <input type="text" id="text1" name="message" placeholder="Сообщение">
            <img src="{{ captcha_src() }}" alt="captcha" style="width: 190px; height: 70px;">

            <input type="text" name="captcha" placeholder="Введите капчу" required>

            {{-- Обновить капчу без перезагрузки --}}
            <button class="form-control" type="button" onclick="refreshCaptcha()">Обновить капчу</button>
            <button type="submit" id="feedsend" value="Отправить">Хочу именное вино</button>
        </form>
    </div>

    <script>
        function refreshCaptcha() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('img[alt=captcha]').src = data.captcha;
                });
        }
    </script>
@endsection
