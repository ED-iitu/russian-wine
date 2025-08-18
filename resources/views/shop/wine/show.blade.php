@extends('layouts.app')
@section('title', $wine->title)
@section('description', $wine->meta_description)
@section('keywords', $wine->meta_keywords)
@section('content')
    <style>
        .wine-layout {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 30px;
        }
        .wine-col {
            display: flex;
            flex-direction: column;
            gap: 145px;
            flex: 1;
            min-width: 120px;
        }

        .wine-block {
            display: flex;
            flex-direction: column;
        }

        .wine-block.left .label {
            padding: 0;
            font-size: 14px;
            color: #777;
            text-align: right;
        }
        .wine-block.right .label {
            padding: 0;
            font-size: 14px;
            color: #777;
            text-align: left;
        }

        .wine-block.left .value {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            font: 0.8333333333333334VW 'ProximaNova-Bold';
        }

        .wine-block.right .value {
            font-weight: bold;
            font-size: 16px;
            text-align: left;
            font: 0.8333333333333334VW 'ProximaNova-Bold';
        }

        .wine-block ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .wine-image {
            display: flex;
            justify-content: center;
        }

        .wine-image img {
            max-width: 180px; /* для десктопа */
            height: auto;
        }

        .alcohol-new {
            color: #DEDDDF;
            font-size: 25px !important;
        }

        .volume-new {
            color: #DEDDDF;
            font-size: 25px !important;
        }

        .alcohol-new img {
            max-width: 10%;
        }

        .vinograd-img {
            margin-left: 125px;
            max-width: 50%;
        }

        @media (max-width: 768px) {
            .close_icon {
                max-width: 70%;
            }

            .wine-image img {
                max-width: 85px; /* для мобилки */
            }

            .wine-layout {
                gap: 30px;
            }
            .wine-col {
                gap: 65px;
            }

            .wine-block.left .label {
                font-size: 12px;
            }
            .wine-block.right .label {
                font-size: 12px;
            }

            .wine-block.left .value {
                font-size: 11px;
            }
            .wine-block.right .value {
                font-size: 11px;
            }
        }
        @media (max-width: 360px) {
            .alcohol-new {
                font-size: 15px !important;
            }
            .volume-new {
                font-size: 15px !important;
            }
            .wine-layout {
                gap: 15px;
            }
            .wine-image img {
                max-width: 75px;
            }
            .wine-block.left .label,
            .wine-block.right .label {
                font-size: 10px;
            }
            .wine-block.left .value,
            .wine-block.right .value {
                font-size: 9px;
            }

            .alcohol-new img {
                max-width: 7%;
            }

            .vinograd-img {
                margin-left: 80px;
                max-width: 50%;
            }
        }

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
                                <img alt="close_icon" class="close_icon" src="{{asset('image/closeicon.png')}}">
                            </a>
                        </div>
                        <div class="showcase">
                            <h2 class="desktopHidden">{{$wine->title}}</h2>

                            <div class="wine-layout">
                                <!-- Левая колонка -->
                                <div class="wine-col">
                                    <div class="wine-block left">
                                        <span class="label">Тип</span>
                                        <span class="value">{{ $wine->color->title ?? '—' }}</span>
                                    </div>
                                    <div class="wine-block left">
                                        <span class="label"></span>
                                        <span class="value alcohol-new"><img src="{{asset('image/gradus.png')}}" alt="">{{ $wine->fortress }}%</span>
                                    </div>
                                    <div class="wine-block left">
                                        <span class="label">Виноград</span>
                                        @if($wine->grapeSorts->isNotEmpty())
                                            <ul class="value">
                                                @foreach($wine->grapeSorts as $sort)
                                                    <li>{{ $sort->title }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="value">{{ $wine->sort->title ?? '—' }}</span>
                                        @endif
                                        <img class="vinograd-img" src="{{ asset('image/vinograd.png') }}" alt="">
                                    </div>
{{--                                    <div class="wine-block left">--}}
{{--                                        <span class="label"></span>--}}
{{--                                        <span class="value volume-new">{{ $wine->volume }}</span>--}}
{{--                                    </div>--}}
                                </div>

                                <!-- Центр с бутылкой -->
                                <div class="wine-image">
                                    <img src="{{Voyager::image($wine->image)}}" title="{{$wine->title}}" alt="{{$wine->title}}">
                                </div>

                                <!-- Правая колонка -->
                                <div class="wine-col">
                                    <div class="wine-block right">
                                        <span class="label">Производитель</span>
                                        <span class="value">
                                            @if ( $wine->manufacture->id == 29)
                                                {{ $wine->winery->title ?? 'Отсутствует' }}
                                            @else
                                                {{ $wine->manufacture->title ?? 'Отсутствует' }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="wine-block right">
                                        <span class="label">Выдержка</span>
                                        <span class="value">{{ $wine->excerpt->title ?? '—' }}</span>
                                    </div>
                                    <div class="wine-block right">
                                        <span class="label">Тираж</span>
                                        <span class="value">{{ $wine->edition }} бутылок</span>
                                    </div>
                                    <div class="wine-block right">
                                        <span class="label"></span>
                                        <span class="value volume-new">{{ $wine->volume }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="price-vinoteka col-md-12">
                                <a href="#" class="preview wine_show_price">
                                    {{$wine->price ?? 0}}
                                    <span style="background: none;">п</span>

                                </a>

                            </div>
                            <div class="similar-wines desktopHidden">
                                <a href="https://russianvine.ru/wineshop?winery[]={{$wine->winery->id ?? 76}}">
                                    <h3 class="hover_red" style="text-transform: uppercase; font-size: 4vw;">
                                        Другие вина винодельни ➔
                                    </h3>
                                </a>
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
