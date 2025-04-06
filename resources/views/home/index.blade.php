@extends('layouts.app')
@section('content')

    <!-- SLIDER -->
    <div id="home_slid">
        <div class="text-center video-slider">
            <video autoplay="" muted="" loop="" id="myVideo">
                <source src="{{ asset ('video/wineclub.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="swiper-viewport">
            <div id="home_slider" class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center">
                        <a href="{{route('wine_shop')}}">
                            <img alt="Subscribe Bg" src="{{ asset ('image/background_podpiska.png') }}">
                            <span>Вино</span>
                            <p>
                                Мы собрали для Вас самую полную коллекцию Русских Вин, как крупных заводов, так
                                авторских микровиноделен.
                            </p>
                        </a>
                        <a href="{{route('wine_shop')}}" class="home_btn">Все вина</a>
                    </div>
                    <div class="swiper-slide text-center">
                        <a href="{{route('sets')}}">
                            <img alt="Sets Bg" src="{{ asset ('image/background_sety.png') }}">
                            <span>Сеты</span>
                            <p>
                                Мы объехали все винодельни нашей страны и отобрали лучшие и самые интересные вина.
                                Собрали из них сеты на любой случай.
                            </p>
                        </a><a href="{{route('sets')}}" class="home_btn">Выбрать Сет</a>

                    </div>
                    <div class="swiper-slide text-center"><a href="{{route('tastings')}}">
                            <img alt="Club Bg" src="{{ asset ('image/background_club.png') }}">
                            <span>Дегустации</span>
                            <p>
                                Обладая опытом проведения дегустаций различного уровня, берёмся за форматы любой
                                сложности, как для профессионалов, так и для новичков в мире вина.
                            </p>
                        </a><a href="{{route('tastings')}}" class="home_btn">Записаться</a>

                    </div>
                    <div class="swiper-slide text-center">
                        <a href="{{route('personal-wine')}}">
                            <img alt="Personal wine" src="{{ asset ('image/background_imennoe.png') }}">
                            <span>Именное вино</span>
                            <p>
                                Создайте семейную традицию – заложите свою бочку вина. По окончании выдержки, вино
                                разливается в бутылки с Вашей именной этикеткой.
                            </p>
                        </a>
                        <a class="home_btn" href="{{route('personal-wine')}}">Узнать больше</a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination home-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next "></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <!-- /.flat-slider -->
    <div class="main-homepage-1">
        <!-- Ниже по хорошему нужна отдельная вьюха под слайдер продуктов слайдер позже сделаю -->
        <section id="content_top">
            <div class="featured_cont">
                <!-- slider here -->
                <!-- Swiper -->
                <h4>{{trans('home.popular')}}</h4>
                <div class="prevslide0" id="prevslide" tabindex="0" role="button" aria-label="Previous slide"><img
                        src="{{ asset ('image/slidearrow.png') }}" style="transform: rotate(180deg);"></div>
                <div class="nextslide0" id="nextslide" tabindex="0" role="button" aria-label="Next slide"><img
                        src="{{ asset ('image/slidearrow.png') }}"></div>
                <div class="swiper-container" id="featured_slide0">
                    <div class="swiper-wrapper">
                        @foreach($popular_wines as $wine)
                            @if ($wine->featured)
                                <div class="swiper-slide">
                                    <div class="wine">
                                        <div class="image">
{{--                                            <p onclick="add_delete_favorite({{$wine->id}}, 'delete')" class="likeSlider unlike-{{$wine->id}}"--}}
{{--                                               id="{{$wine->id}}"--}}
{{--                                               style="display: {{in_array($wine->id, $favorite) ? '' : 'none'}}">--}}
{{--                                                <img src="{{ asset ('image/un_like.svg') }}" alt="unlike for this wine">--}}
{{--                                            </p>--}}
{{--                                            <p onclick="add_delete_favorite({{$wine->id}}, 'add')" class="likeSlider like-{{$wine->id}}" id="{{$wine->id}}"--}}
{{--                                               style="display: {{in_array($wine->id, $favorite) ? 'none' : ''}}">--}}
{{--                                                <img src="{{ asset ('image/like.svg') }}" alt="like for this wine">--}}
{{--                                            </p>--}}
                                            <a href="{{route('wine_or_winery', $wine->slug)}}" class="preview">
                                                <img alt="{{$wine->title}}" src="{{ Voyager::image($wine->image) }}">
                                                <span class="attributes"></span>
                                            </a>
                                        </div>
                                        <h2><a href="{{route('wine_or_winery', $wine->slug)}}"
                                               class="preview">{{$wine->title}}</a></h2>

                                        <p>@if(isset($wine->winery))
                                                {{$wine->winery->title}}
                                            @else
                                                {{$wine->manufacture->title}}
                                            @endif
                                        </p>
                                        <div class="meta">
                                            <span class="color">{{$wine->color->title}} </span><span
                                                class="sep"> | </span>
                                            <span
                                                class="hardness">{{isset($wine->sugar) ? $wine->sugar->title : ''}} </span><span
                                                class="sep"> | </span>
                                            <span class="year"> {{$wine->year}}</span>
                                            <div class="price-vinoteka">
                                                <a href="{{route('wine_or_winery', $wine->slug)}}"
                                                   class="preview">{{$wine->price}} <span>п</span></a>
                                            </div>
                                            <div class="button_cont">
                                                <div class="prod_quantity">
                                                    <span class="qua_mins" onclick="update_count({{$wine->id}}, 'minus', null, 'popular')"></span>
                                                    <input type="number" class="quantity popular-{{$wine->id}}" id="wine-{{$wine->id}}"
                                                           value="1">
                                                    <span class="qua_plus" onclick="update_count({{$wine->id}}, 'plus', null, 'popular')"></span>
                                                </div>
                                                <button id="button-carts" class="cart-btn-{{$wine->id}}"
                                                        onclick="cart_add('{{$wine->id}}', 1, 'wine');">
                                                    <span>В корзину</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <!-- Add Arrows -->
                </div>
                <!-- Swiper JS -->
                <div class="swiper-pagination feat-pagination0"></div>
            </div>
            <a class="all_wines" href="{{route('wine_shop')}}">Все вина</a>
        </section>

        <section id="specials">
            <div id="specials-cont">
                <div class="col-md-4 bannerstitle"
                     onclick="$('#degustacii_modal').css('display', 'block');$('body').addClass('nooverflow');">
                    <img src="{{ asset ('image/degustag-main.png') }}">
                    <h6>дегустации <span>{{$home_tasting->title}}</span></h6>
                    <button>ЗАПИСАТЬСЯ</button>
                    <div id="bannerdate">
                        <span> {{date('d', strtotime($home_tasting->start_date))}}</span>
                        {{date('M', strtotime($home_tasting->start_date))}}
                    </div>
                </div>
                <div class="col-md-4 bannerstitle">
                    <a href="{{route('set', $home_set->slug)}}">
                        <img alt="{{$home_set->title}}" src="{{ Voyager::image($home_set->home_image) }}">
                        <h6>сет месяца <span>{{$home_set->title}}</span></h6>
                        <button>ЗАКАЗАТЬ СЕТ</button>
                    </a>
                </div>
            </div>
            <div class="col-md-4 cwp">
                <h2>Нам важно, какое вино Вы выбираете</h2>
                <ul class="special-list">
                    <li class="youtube_icon">
                        <a href="https://www.youtube.com/channel/UCN-RcIaaNGUmZBYg9HJtoKg" target="_blank">
                            <svg width="52" height="36" viewBox="0 0 52 36" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M46.3078 1.10118C48.5333 1.69412 50.2881 3.43059 50.8872 5.63294C52 9.65647 51.9572 18.0424 51.9572 18.0424C51.9572 18.0424 51.9572 26.3859 50.8872 30.4094C50.2881 32.6118 48.5333 34.3482 46.3078 34.9412C42.242 36 25.9786 36 25.9786 36C25.9786 36 9.75802 36 5.64938 34.8988C3.42387 34.3059 1.66914 32.5694 1.06996 30.3671C0 26.3859 0 18 0 18C0 18 0 9.65647 1.06996 5.63294C1.66914 3.43059 3.46667 1.65176 5.64938 1.05882C9.71523 0 25.9786 0 25.9786 0C25.9786 0 42.242 0 46.3078 1.10118ZM34.3242 18L20.8 25.7082V10.2917L34.3242 18Z"
                                      fill="#DA224D"></path>
                            </svg>
                            Смотрите все о русском вине на нашем youtube-канале <span>«Негоциант»</span>
                        </a>
                    </li>
                    <li class="inst_icon">
                        <a href="https://instagram.com/russianvine.ru?igshid=1kot521x7b8l" target="_blank">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M36.3915 11.2473C36.3915 12.7046 35.2088 13.8873 33.7515 13.8873C32.2907 13.8873 31.1098 12.7046 31.1098 11.2473C31.1098 9.78999 32.2907 8.60727 33.7515 8.60727C35.2088 8.60727 36.3915 9.78999 36.3915 11.2473ZM22.0035 30.3239C17.952 30.3239 14.6696 27.0415 14.6696 22.99C14.6696 18.9402 17.952 15.6578 22.0035 15.6578C26.055 15.6578 29.341 18.9402 29.341 22.99C29.341 27.0415 26.055 30.3239 22.0035 30.3239ZM22.0035 11.6925C15.7626 11.6925 10.7043 16.7508 10.7043 22.99C10.7043 29.2309 15.7626 34.2874 22.0035 34.2874C28.2462 34.2874 33.3045 29.2309 33.3045 22.99C33.3045 16.7508 28.2462 11.6925 22.0035 11.6925ZM22.0035 4.95527C27.8802 4.95527 28.5754 4.97815 30.895 5.08375C33.0422 5.18231 34.2074 5.53783 34.9818 5.84055C36.0096 6.24007 36.7418 6.71703 37.5162 7.48615C38.2853 8.25703 38.7587 8.98919 39.1582 10.0153C39.461 10.7932 39.8182 11.9565 39.9168 14.102C40.0242 16.4217 40.0453 17.1186 40.0453 22.9917C40.0453 28.8649 40.0242 29.5618 39.9168 31.8815C39.8182 34.027 39.461 35.1903 39.1582 35.9682C38.7587 36.9925 38.2853 37.7265 37.5162 38.4938C36.7435 39.2665 36.0114 39.7417 34.9818 40.143C34.2074 40.4439 33.0422 40.7994 30.895 40.8997C28.5754 41.0036 27.8802 41.0282 22.0035 41.0282C16.1269 41.0282 15.4317 41.0036 13.1138 40.8997C10.9648 40.7994 9.80144 40.4439 9.02704 40.143C7.99744 39.7417 7.26704 39.2665 6.49616 38.4938C5.72704 37.7265 5.24832 36.9925 4.8488 35.9682C4.54784 35.1903 4.1888 34.027 4.09024 31.8815C3.9864 29.5618 3.96352 28.8649 3.96352 22.9917C3.96352 17.1186 3.9864 16.4217 4.09024 14.102C4.1888 11.9565 4.54784 10.7932 4.8488 10.0153C5.24832 8.98919 5.72704 8.25703 6.49616 7.48615C7.26704 6.71703 7.99744 6.24007 9.02704 5.84055C9.80144 5.53959 10.9648 5.18231 13.1138 5.08375C15.4317 4.97815 16.1286 4.95527 22.0035 4.95527ZM22.0035 0.98999C16.0301 0.98999 15.2803 1.01639 12.9325 1.12199C10.5899 1.22935 8.99008 1.60247 7.59088 2.14631C6.1424 2.70775 4.91392 3.46103 3.69248 4.68247C2.46928 5.90567 1.71776 7.13239 1.15456 8.58087C0.60896 9.98007 0.23936 11.5799 0.132 13.9207C0.02288 16.2668 0 17.0166 0 22.99C0 28.9652 0.02288 29.7132 0.132 32.0628C0.23936 34.4036 0.60896 36.0017 1.15456 37.4009C1.71776 38.8476 2.46928 40.0761 3.69248 41.2993C4.91392 42.5225 6.1424 43.274 7.59088 43.8354C8.99008 44.3793 10.5899 44.7506 12.9325 44.858C15.2803 44.9654 16.0301 44.9918 22.0035 44.9918C27.9822 44.9918 28.732 44.9654 31.0781 44.858C33.4189 44.7506 35.0187 44.3793 36.4214 43.8354C37.8664 43.274 39.0949 42.5225 40.3163 41.2993C41.5413 40.0761 42.291 38.8476 42.856 37.4009C43.3998 36.0017 43.7712 34.4036 43.8786 32.0628C43.9842 29.7132 44.0106 28.9652 44.0106 22.99C44.0106 17.0166 43.9842 16.2668 43.8786 13.9207C43.7712 11.5799 43.3998 9.98007 42.856 8.58087C42.291 7.13239 41.5413 5.90567 40.3163 4.68247C39.0949 3.46103 37.8664 2.70775 36.4214 2.14631C35.0187 1.60247 33.4189 1.22935 31.0781 1.12199C28.732 1.01639 27.9822 0.98999 22.0035 0.98999Z"
                                      fill="#DA224D"></path>
                            </svg>
                            Подписывайтесь на <span>инстаграм</span>, чтобы быть в курсе всех дегустаций, которые мы
                            проводим
                        </a>
                    </li>
                    <li class="bag_icon">
                        <a href="{{route('sets')}}">
                            <svg width="57" height="62" viewBox="0 0 57 62" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M37.8017 20.3343V11.696C37.8017 6.4073 33.4287 2 28.1812 2C22.9337 2 18.5607 6.4073 18.5607 11.696V20.1581M6.1416 13.9878H49.871C51.0954 13.9878 52.1449 15.0456 52.1449 16.2796L54.5937 57.7082C54.5937 58.9423 53.5442 60 52.3198 60H3.86768C2.64325 60 1.59375 58.9423 1.59375 57.7082L3.86768 16.2796C4.04259 15.0456 4.91718 13.9878 6.1416 13.9878ZM18.2109 18.924C19.7852 18.924 21.0096 20.1581 21.0096 21.7447C21.0096 23.3313 19.7852 24.5654 18.2109 24.5654C16.6367 24.5654 15.4122 23.3313 15.4122 21.7447C15.4122 20.1581 16.6367 18.924 18.2109 18.924ZM37.9766 18.924C39.5508 18.924 40.7753 20.1581 40.7753 21.7447C40.7753 23.3313 39.5508 24.5654 37.9766 24.5654C36.4023 24.5654 35.1779 23.3313 35.1779 21.7447C35.1779 20.1581 36.4023 18.924 37.9766 18.924Z"
                                    stroke="#DA224D" stroke-width="3" stroke-miterlimit="22.9256"></path>
                            </svg>
                            Оформляйте <span class="podpis">подписку</span> на вино, покупайте <span
                                class="forset">сеты</span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Еще один слайдер + вьюха под него т.к. идет сортировка по новизне -->
        <section id="content_bottom">
            <!-- 2nd slider here -->
            <div class="featured_cont">
                <!-- slider here -->
                <!-- Swiper -->
                <h4>{{trans('home.new')}} </h4>
                <div class="prevslide1" id="prevslide" tabindex="0" role="button" aria-label="Previous slide"><img
                        src="{{ asset ('image/slidearrow.png') }}" style="transform: rotate(180deg);"></div>
                <div class="nextslide1" id="nextslide" tabindex="0" role="button" aria-label="Next slide"><img
                        src="{{ asset ('image/slidearrow.png') }}"></div>
                <div class="swiper-container" id="featured_slide1">
                    <div class="swiper-wrapper">
                        @foreach($new_wines as $wine)
                            <div class="swiper-slide">
                                <div class="wine">
                                    <div class="image">
{{--                                        <p onclick="add_delete_favorite({{$wine->id}}, 'delete')" class=" likeSlider unlike-{{$wine->id}}" id="{{$wine->id}}"--}}
{{--                                           style="display: {{in_array($wine->id, $favorite) ? '' : 'none'}}">--}}
{{--                                            <img src="{{ asset ('image/un_like.svg') }}" alt="unlike for this wine">--}}
{{--                                        </p>--}}
{{--                                        <p onclick="add_delete_favorite({{$wine->id}}, 'add')"  class="likeSlider like-{{$wine->id}}" id="{{$wine->id}}"--}}
{{--                                           style="display: {{in_array($wine->id, $favorite) ? 'none' : ''}}">--}}
{{--                                            <img src="{{ asset ('image/like.svg') }}" alt="like for this wine">--}}
{{--                                        </p>--}}
                                        <a href="{{route('wine_or_winery', $wine->slug)}}" class="preview">
                                            <img alt="{{$wine->title}}" src="{{ Voyager::image($wine->image) }}">
                                            <span class="attributes"></span>
                                        </a>
                                    </div>
                                    <h2><a href="{{route('wine_or_winery', $wine->slug)}}" class="preview">{{$wine->title}}</a>
                                    </h2>
                                    <p>
                                        @if(isset($wine->winery) && $wine->winery->title)
                                            {{$wine->winery->title}}
                                        @else
                                            {{$wine->manufacture->title ?? ""}}
                                        @endif
                                    </p>
                                    <div class="meta">
                                        <span
                                            class="color">{{isset($wine->color) ? $wine->color->title : '' }} </span><span
                                            class="sep"> | </span>
                                        <span
                                            class="hardness">{{isset($wine->sugar) ? $wine->sugar->title : ''}} </span><span
                                            class="sep"> | </span>
                                        <span class="year"> {{$wine->year}}</span>
                                        <div class="price-vinoteka">
                                            <a href="{{route('wine_or_winery', $wine->slug)}}" class="preview">{{$wine->price}}
                                                <span>п</span></a>
                                        </div>
                                        <div class="button_cont">
                                            <div class="prod_quantity">
                                                <span class="qua_mins" onclick="update_count({{$wine->id}}, 'minus',  null, 'new')"></span>
                                                <input type="number" class="quantity new-{{$wine->id}}" id="wine-{{$wine->id}}"
                                                       value="1">
                                                <span class="qua_plus" onclick="update_count({{$wine->id}}, 'plus', null, 'new')"></span>
                                            </div>
                                            <button id="button-carts" class="cart-btn-{{$wine->id}}"
                                                    onclick="cart_add('{{$wine->id}}', 1, 'wine', null, 'new');">
                                                <span>В корзину</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Pagination -->
                    <!-- Add Arrows -->
                </div>
                <div class="swiper-pagination feat-pagination1"></div>
                <!-- Swiper JS -->
            </div>
        </section>
        <section class="swp" id="swineries">
            <div class="scol col-rs-8">
                <h5><a href="{{route('wineries')}}">Русские винодельни</a></h5>
                <p>За последние десятилетия в русском виноделии совершён качественный рывок. В России появились
                    винодельни мирового уровня.</p>
                <a href="{{route('wineries')}}"></a>
            </div>
            <div class="scol col-rs-6">
                <h5><a href="{{route('micro_winery')}}">Микровинодельни</a></h5>
                <p>Новое и самое интересное в современном виноделии России. Небольшие фермерские хозяйства, а также
                    семейные винодельни. </p>
                <a href="{{route('micro_winery')}}"></a>
            </div>
        </section>

        <!-- слайдер + вьюха под него т.к. идет сортировка по виноделам -->
        <section id="swinemakers" class="">
            <div class="col-md-12">
                <h4>Русские виноделы</h4>
                <a href="{{route('winemakers')}}">Все виноделы</a>
                <!-- 3rd slider here -->
                <div  id="winemakers_slider" class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($winemakers as $winemaker)
                            <div class="swiper-slide">
                                <div class="slide-inner">
                                    <div>
                                        <a href="{{route('winemakers')}}?id={{$winemaker->id}}">
                                            <img alt="{{$winemaker->seo_title}}"
                                                 src="{{ Voyager::image($winemaker->main_image) }}"></a>
                                    </div>
                                    <h6>
                                        <a href="{{route('winemakers')}}?id={{$winemaker->id}}">
                                            {{$winemaker->full_name}}
                                        </a>
                                    </h6>
                                    <ul>
                                        <li>
                                            @if($winemaker->winery)
                                                <p><a class="text-black" href="{{route('wine_or_winery', $winemaker->winery->slug)}}">{{$winemaker->winery->title}}</a> </p>
                                            @endif
                                        </li>
                                        <li>
                                            @if($winemaker->region)
                                                <p><a class="text-black" href="{{route('region', $winemaker->region->slug)}}">{{$winemaker->region->title}}</a> </p>
                                            @endif
                                        <li><p>Вина:
                                                @foreach($winemaker->wines as $wine)
                                                    <a href="{{route('wine_shop')}}?sort[]={{$wine->sort->id}}&winery[]={{($winemaker->winery) ? $winemaker->winery->id : ''}}"
                                                       class="text-black">
                                                        {{$wine->title}}@if(!$loop->last),@endif
                                                    </a>
                                                @endforeach
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @push('scripts')
            <script src="{{ asset('js/favorite.js') }}"></script>
    @endpush
@endsection
