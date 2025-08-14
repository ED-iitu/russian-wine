@extends('layouts.app')
@section('title', $wine->title)
@section('description', $wine->meta_description)
@section('keywords', $wine->meta_keywords)
@section('content')

    <style>
        /* === 3-column wine layout (left specs — bottle — right specs) === */
        .rv-spec {
            display: flex;
            align-items: stretch;               /* растягиваем колонки по высоте бутылки */
            gap: clamp(12px, 4vw, 56px);        /* адаптивный отступ между колонками */
        }

        .rv-col {
            flex: 1 1 0;                        /* колонки поджимаются, но не переносятся */
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;     /* ровно 4 блока распределены по высоте */
            gap: clamp(8px, 1.3vw, 14px);
        }

        .rv-bottle {
            flex: 0 0 auto;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }
        .rv-bottle img {
            display: block;
            width: clamp(140px, 28vw, 420px);
            height: auto;
            max-height: min(72vh, 720px);
        }

        .rv-item { display: flex; flex-direction: column; gap: 6px; }
        .rv-item--border { padding-bottom: 10px; border-bottom: 1px solid #E9E9E9; }

        .rv-label  { color: #8E8E8E; font-size: clamp(12px, 1.7vw, 15px); line-height: 1.2; }
        .rv-value  { font-weight: 700; font-size: clamp(14px, 2vw, 18px); line-height: 1.3; }

        .rv-list { list-style: none; padding: 0; margin: 0; }
        .rv-list li + li { margin-top: 4px; }

        .rv-item.alcohol .rv-value { display: inline-flex; align-items: center; gap: 8px; font-weight: 700; }
        .rv-item.alcohol img { width: clamp(16px, 3vw, 28px); height: auto; }

        .rv-item.species .grape-icon { margin-top: 8px; opacity: .25; width: clamp(50px, 10vw, 100px); height: auto; }

        .rv-item.amount .rv-value b { font-weight: 800; }
        .rv-item.volume .rv-value { opacity: .25; font-size: clamp(22px, 6vw, 56px); font-weight: 800; }

        @media (max-width: 768px) {
            .rv-spec { gap: clamp(8px, 2.5vw, 16px); }
            /* чтобы не дублировать цену на мобилке (ниже есть mobile-price) */
            .rv-col .rv-item.price { display: none; }
        }
        /* === /3-column wine layout === */
    </style>

    <div id="product-product" class="product-temp1">
        <div class="background-white">
            <div id="content" class="single_product_Container">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="toShop">
                            <a href="{{route('wine_shop')}}" class="pageControl">
                                <i class="leftArrowSvg">
                                    <svg width="25" height="12" viewBox="0 0 31 16" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M30 8H1M1 8L8 15M1 8L8 1" stroke="#AFAFAF" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </i>
                                Вернуться в каталог
                            </a>
                        </div>
                        <div class="mobileToShop">
                            <a href="{{route('wine_shop')}}" class="pageControl">
                                <img alt="close_icon" src="{{asset('image/closeicon.png')}}">
                            </a>
                        </div>
                        <div class="showcase">
                            <h2 class="desktopHidden">{{$wine->title}}</h2>

                            <div class="height_90">
                                <!-- ТРИ КОЛОНКИ: слева — центровая бутылка — справа -->
                                <div class="rv-spec">
                                    <!-- Левая колонка (4 блока) -->
                                    <div class="rv-col">
                                        <div class="rv-item rv-item--border type">
                                            <span class="rv-label">Тип</span>
                                            @if(isset($wine->color))
                                                <span class="rv-value bold_font">{{$wine->color->title}}</span>
                                            @else
                                                <span class="rv-value">—</span>
                                            @endif
                                        </div>

                                        <div class="rv-item alcohol">
                                            <span class="rv-label">Крепость</span>
                                            <span class="rv-value">
                        <img src="{{asset('image/gradus.png')}}" alt="">
                        {{$wine->fortress}}%
                    </span>
                                        </div>

                                        <div class="rv-item species">
                                            <span class="rv-label">Виноград</span>
                                            <div class="rv-value">
                                                @if($wine->grapeSorts->isNotEmpty())
                                                    <ul class="rv-list">
                                                        @foreach($wine->grapeSorts as $sort)
                                                            <li>{{ $sort->title }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span>{{ $wine->sort->title ?? '—' }}</span>
                                                @endif
                                            </div>
                                            <img class="grape-icon" src="{{ asset('image/vinograd.png') }}" alt="">
                                        </div>

                                        <div class="rv-item volume">
                                            <span class="rv-label">Объем</span>
                                            <span class="rv-value">{{$wine->volume}}</span>
                                        </div>
                                    </div>

                                    <!-- Центр — бутылка -->
                                    <div class="rv-bottle">
                                        <img src="{{Voyager::image($wine->image)}}" title="{{$wine->title}}" alt="{{$wine->title}}">
                                    </div>

                                    <!-- Правая колонка (4 блока) -->
                                    <div class="rv-col">
                                        <div class="rv-item rv-item--border manufacturer">
                                            <span class="rv-label">Производитель</span>
                                            <span class="rv-value">
                        @if(isset($wine->winery))
                                                    <a href="{{route('wine_or_winery', $wine->winery->slug )}}">
                                {{$wine->manufacture->title}}
                            </a>
                                                @else
                                                    {{$wine->manufacture->title ?? "Отсутствует"}}
                                                @endif
                    </span>
                                        </div>

                                        <div class="rv-item aging">
                                            <span class="rv-label">Выдержка</span>
                                            @if(isset($wine->excerpt))
                                                <span class="rv-value">
                            {{$wine->excerpt->title}}
                                                    @if($wine->excerpt->type == 1)
                                                        <span class="icon-icon_champagne"></span>
                                                    @elseif($wine->excerpt->type == 2)
                                                        <span class="icon-icon_barrel"></span>
                                                    @endif
                        </span>
                                            @else
                                                <span class="rv-value">—</span>
                                            @endif
                                        </div>

                                        <div class="rv-item amount">
                                            <span class="rv-label">Тираж</span>
                                            <span class="rv-value"><b>{{$wine->edition}}</b> бутылок</span>
                                        </div>

                                        <div class="rv-item price">
                                            <span class="rv-label">Цена</span>
                                            <span class="rv-value">
                        @if($wine->price > 0)
                                                    {{$wine->price}}<span style="background: none;">п</span>
                                                @else
                                                    Коллекция
                                                @endif
                    </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Блоки ниже оставил как у тебя (виден только на мобилке / desktopHidden) -->
                                <div class="additional-info desktopHidden" style="margin-top: 30px">
                                    <div class="price-vinoteka col-md-12">
                                        <a href="#" class="preview wine_show_price">
                                            @if($wine->price > 0)
                                                {{$wine->price}}
                                                <span style="background: none;">п</span>
                                            @else
                                                Коллекция
                                            @endif
                                        </a>
                                        <input type="hidden" value="{{$wine->price}}" class="wine_price">
                                    </div>

                                    <div class="similar-wines">
                                        <a href="https://russianvine.ru/wineshop?winery[]={{$wine->winery->id ?? 76}}">
                                            <h3 class="hover_red" style="text-transform: uppercase; font-size: 4vw;">
                                                Другие вина винодельни ➔
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button_cont desktopHidden">
                            <div class="prod_quantity">
                                <span class="qua_mins" onclick="update_count({{$wine->id}},'minus')"></span>
                                <input type="number" class="quantity" id="wine-{{$wine->id}}" value="1">
                                <span class="qua_plus" onclick="update_count({{$wine->id}},'plus')"></span>
                            </div>
                            <button id="button-carts" class="cart-btn-{{$wine->id}}"
                                    onclick="cart_add('{{$wine->id}}', 1, 'wine'); $(this).addClass('active')">
                                <span>В корзину</span></button>
                        </div>
                    </div>
                    <div class="col-md-6 decsRightSide">
                        <div class="product_page_Controls">
                            <ul class="breadcrumb">
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('wine_shop')}}">Вино</a></li>
                                @if(isset($bread_crumbs))
                                    @foreach($bread_crumbs as $bread_crumb)
                                        <li>
                                            <a href="{{route('wine_shop')}}?{{$bread_crumb['type']}}={{$bread_crumb['id']}}">{{$bread_crumb['title']}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="social">
{{--                            <a onclick="add_delete_favorite({{$wine->id}}, 'add')" class="one-social like-{{$wine->id}}"--}}
{{--                               id="{{$wine->id}}"--}}
{{--                               style="display: {{($is_favorite) ? 'none' : 'block'}}">--}}
{{--                                <img src="{{asset('image/like_wine.svg')}}">--}}
{{--                            </a>--}}
{{--                            <a onclick="add_delete_favorite({{$wine->id}}, 'delete')"--}}
{{--                               class="one-social unlike-{{$wine->id}}" id="{{$wine->id}}"--}}
{{--                               style="display: {{($is_favorite) ? 'block' : 'none'}}">--}}
{{--                                <img src="{{asset('image/unlike_wine.svg')}}">--}}
{{--                            </a>--}}
                        </div>
                        <h1>{{$wine->title}}</h1>
                        @if(isset($wine->region))
                            <h2 class="region">{{$wine->region->title}}</h2>
                        @endif
                        <div class="col-12">
                            <h4 class="wineSubtype">Винтаж</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @if($vintages)
                                    @foreach($vintages as $vintage)
                                        <label
                                            class="btn btn-secondary {{($vintage->id == $wine->id) ? 'active' : '' }}">
                                            <input type="radio" name="vintage" checked="" value="{{$vintage->slug}}">
                                            <span>{{$vintage->year}} г. </span><i class="priceDefice"></i>
                                            <span>{{$vintage->price}} р.</span>
                                        </label>
                                    @endforeach
                                @else
                                    <label
                                        class="btn btn-secondary active ">
                                        <input type="radio" name="vintage" checked>
                                        <span>{{$wine->year}} г. </span>
                                        <i class="priceDefice"></i>
                                        <span>
                                            @if($wine->price > 0)
                                                {{$wine->price}} р.
                                            @else
                                                Коллекция
                                            @endif
                                        </span>
                                    </label>
                                @endif
                            </div>
                        </div>
                        <div id="product">
                            <div id="priceBlock" class="form-group">
                                <div class="priceContainer">
                                    <div class="button_cont">
                                        <div class="col-md-6">
                                            <div class="price-vinoteka col-md-12">
                                                <a href="#" class="preview wine_show_price">
                                                    @if($wine->price > 0)
                                                        {{$wine->price}}
                                                        <span style="background: none;">п</span>
                                                    @else
                                                        Коллекция
                                                    @endif

                                                </a>
                                                <input type="hidden" value="{{$wine->price}}" class="wine_price">

                                            </div>

                                            <div class="col-md-12">
                                                <button id="button-carts" class="cart-btn-{{$wine->id}}"
                                                        onclick="cart_add('{{$wine->id}}', 1, 'wine');">
                                                    <span>Добавить в корзину</span>
                                                </button>
                                            </div>
                                        </div>
                                        @if($wine->price > 0)
                                            <div class="prod_quantity col-md-cstm">
                                            <span class="qua_plus"
                                                  onclick="update_count({{$wine->id}},'plus', 'wine-show')"></span>
                                                <input type="number" class="quantity" id="wine-{{$wine->id}}"
                                                       value="1">
                                                <span class="qua_mins"
                                                      onclick="update_count({{$wine->id}}, 'minus', 'wine-show')"></span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row bigDesc">
                            <div class="col-md-6">
                                <a href="#description-info">
                                    <h3 class="hover_red" style="text-transform: uppercase; font-size: 0.9vw;">
                                        Характеристики
                                        <svg class="icon-red" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">

                                            <path d="M12 5V19" stroke="black" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                            <path d="M19 12L12 19L5 12" stroke="black" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </h3>
                                </a>
                            </div>
                            <div class="col-md-6">
                                @if(isset($wine->winery))
                                    <a href="{{route('wine_shop')}}?winery[]={{$wine->winery->id}}"><h3
                                            class="hover_red" style="text-transform: uppercase; font-size: 0.9vw;">
                                            Другие вина
                                            винодельни</h3></a>
                                @else
                                    <a href="#"><h3 class="hover_red"
                                                    style="text-transform: uppercase; font-size: 0.9vw;">Другие вина
                                            винодельни</h3></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row secondDesc">
                    <div class="col-md-6 description" id="description-info">
                        <h4>Особенности производства</h4>
                        {!! $wine->production_feature !!}
                        <h4>Дегустационные характеристики</h4>
                        {!! $wine->combination !!}
                        <h4>Гастрономическое сочетание</h4>
                        {!! $wine->feature !!}
                        <h4>Подача</h4>
                        {!! $wine->innings !!}
                    </div>
                    @if(isset($wine->winery))
                        <div class="col-md-6 pl-12 row">
                            <div class="col-md-4">
                                <img src="{{Voyager::image($wine->winery->logo_image)}}" alt="" class="companyLogo">
                            </div>
                            <div class="col-md-8 companyDesc">
                                <h3 class="companyTitle">{{$wine->winery->title}}</h3>
                                {!! $wine->winery->description !!}
                                <a href="{{route('wine_or_winery', $wine->winery->slug)}}" class="btn btn-secondary toCompany">
                                    Подробнее о винодельне
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <section id="content_bottom">
                    <!-- 2nd slider here -->
                    <div class="featured_cont" style="padding-bottom: 1vw;">
                        <!-- slider here -->
                        <!-- Swiper -->
                        <h4>Рекомендуем также</h4>
                        <div class="prevslide1" id="prevslide" tabindex="0" role="button" aria-label="Previous slide">
                            <img
                                src="{{ asset ('image/slidearrow.png') }}" style="transform: rotate(180deg);"></div>
                        <div class="nextslide1" id="nextslide" tabindex="0" role="button" aria-label="Next slide"><img
                                src="{{ asset ('image/slidearrow.png') }}"></div>
                        <div class="swiper-container" id="featured_slide1">
                            <div class="swiper-wrapper">
                                @foreach($wines as $feature_wine)
                                    @if ($feature_wine->id !=  $wine->id)
                                        <div class="swiper-slide">
                                            <div class="wine new_wine">
                                                <div class="slider_image">
                                                    <a href="{{route('wine_or_winery', $feature_wine->slug)}}" class="preview">
                                                        <img alt="{{$wine->title}}"
                                                             src="{{ Voyager::image($feature_wine->image) }}">
                                                        <span class="attributes"></span>
                                                    </a>
                                                </div>
                                                <h2><a href="{{route('wine_or_winery', $feature_wine->slug)}}"
                                                       class="preview">{{$feature_wine->title}}</a>
                                                </h2>
                                                <p>{{isset($feature_wine->winery) ? $feature_wine->winery->title : ''}}</p>
                                                <div class="meta">
                                        <span
                                            class="color">{{isset($feature_wine->color) ? $feature_wine->color->title : '' }} </span><span
                                                        class="sep"> | </span>
                                                    <span
                                                        class="hardness">{{isset($feature_wine->sugar) ? $feature_wine->sugar->title : ''}} </span><span
                                                        class="sep"> | </span>
                                                    <span class=""> {{$feature_wine->year}}</span>
                                                    <div class="price-vinoteka">
                                                        <a href="{{route('wine_or_winery', $feature_wine->slug)}}"
                                                           class="preview">{{$feature_wine->price}}
                                                            <span>п</span></a>
                                                    </div>
                                                    <div class="button_cont">
                                                        <div class="prod_quantity">
                                                            <span class="qua_mins"
                                                                  onclick="update_count({{$feature_wine->id}}, 'minus')"></span>
                                                            <input type="number" class="quantity"
                                                                   id="wine-{{$feature_wine->id}}"
                                                                   value="1">
                                                            <span class="qua_plus"
                                                                  onclick="update_count({{$feature_wine->id}}, 'plus')"></span>
                                                        </div>
                                                        <button id="button-carts" class="cart-btn-{{$feature_wine->id}}"
                                                                onclick="cart_add('{{$feature_wine->id}}', 1, 'wine');">
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
                        <div class="swiper-pagination feat-pagination1"></div>
                        <!-- Swiper JS -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/favorite.js') }}"></script>
        <script>
            $("input[name='vintage']").on('change', function () {
                window.location.href = $(this).val();
            });
        </script>
        <script>
            $(document).on('click', 'a[href^="#"]', function (event) {
                event.preventDefault();

                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top
                }, 1500);
            });
        </script>
    @endpush
@endsection
