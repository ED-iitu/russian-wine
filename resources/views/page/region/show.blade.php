@extends('layouts.app')
@section('title', $region->seo_title)
@section('description', $region->meta_description)
@section('keywords', $region->meta_keywords)
@section('body_class', 'body-bg-gray')
@section('content')
    <div id="information-region" class="information-wine-region">
        <div id="content" class="">
            <div>
                <img alt="{{ $region->title  }}" class="img-responsive" src="{{Voyager::image($region->banner_image)}}">
                <!-- style="height: 20vw; object-fit: cover;"  -->
            </div>
            <div class="background-white">
                <div class="container container-lg">
                    <div class="row mt-md">
                        <div class="col-md-6">
                            <h1>{{ $region->title}}</h1>
                            <div class="description-first">
                                <p>
                                    {{$region->body}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img class="img-responsive" style="border: 1px solid #eee;"
                                 src="https://maps.googleapis.com/maps/api/staticmap?center={{$region->coordinate_lat}},{{$region->coordinate_lon}}&amp;zoom=6&amp;size=553x400&amp;maptype=roadmap&amp;language=ru&amp;key={{env('GOOGLE_API_KEY')}}&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x333333%7Clightness%3A40%7C&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Cvisibility%3Aon%7Ccolor%3A0xffffff%7Clightness%3A16%7C&amp;style=feature%3Aall%7Celement%3Alabels.icon%7Cvisibility%3Aoff%7C&amp;style=feature%3Aadministrative%7Celement%3Ageometry.fill%7Ccolor%3A0xfefefe%7Clightness%3A20%7C&amp;style=feature%3Aadministrative%7Celement%3Ageometry.stroke%7Ccolor%3A0xfefefe%7Clightness%3A17%7Cweight%3A1.2%7C&amp;style=feature%3Aadministrative%7Celement%3Alabels%7Cvisibility%3Aon%7C&amp;style=feature%3Alandscape%7Celement%3Ageometry%7Ccolor%3A0xffffff%7Clightness%3A20%7Cgamma%3A0.61%7C&amp;style=feature%3Apoi%7Celement%3Ageometry%7Ccolor%3A0xf5f5f5%7Clightness%3A21%7C&amp;style=feature%3Apoi.park%7Celement%3Ageometry%7Ccolor%3A0xebebeb%7Clightness%3A21%7C&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff%7Clightness%3A17%7C&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffffff%7Clightness%3A29%7Cweight%3A0.2%7C&amp;style=feature%3Aroad.arterial%7Celement%3Ageometry%7Ccolor%3A0xffffff%7Clightness%3A18%7C&amp;style=feature%3Aroad.arterial%7Celement%3Ageometry.fill%7Cgamma%3A1%7C&amp;style=feature%3Aroad.local%7Celement%3Ageometry%7Ccolor%3A0xffffff%7Clightness%3A16%7C&amp;style=feature%3Atransit%7Celement%3Ageometry%7Ccolor%3A0xf2f2f2%7Clightness%3A19%7C&amp;style=feature%3Awater%7Celement%3Ageometry%7Ccolor%3A0xe1e1e1%7Clightness%3A17%7C">
                        </div>
                    </div>
                </div>

                <div class="container container-lg">
                    <div class="row">
                        <div class="col-xs-12 col-md-3 mt-md text-center">
                            <a href="#wineries" class="link-icon">
                                  <span class="icon-circle">
                                    <span class="icon-icon_wineries"></span>
                                  </span>
                                <p>Винодельни</p>
                            </a>
                            <br>
                            <a href="#wines" class="link-icon">
                                <span class="icon-circle">
                                    <span class="icon-icon_wines"></span>
                                </span><br>
                                Лучшие вина
                            </a>
                        </div>
                        <div class="col-xs-12 col-md-9 mt-md">
                            <h2>Терруар</h2>
                            {!! $region->terroir !!}
                            <h2>Виноградники</h2>
                            {!! $region->vineyard_start !!}
                        </div>
                    </div>
                </div>
                <div class="container container-lg mt-md">
                    <div class="row">
                        @foreach (json_decode($region->vineyard_image) as $image)
                            <div class="col-xs-12 col-md-5 mb-xs">
                                <img alt="" class="img-responsive" src="{{Voyager::image($image)}}" style="object-fit: cover; height: 300px;">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container container-lg mt-md">
                    <div class="row">
                        <div class="col-md-12">
                            {!! $region->vineyard_end !!}
                        </div>
                    </div>
                </div>
                <div class="container container-lg mt-md">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-2 text-right text-red">
                                    <div class="description-quote"><span class="icon-icon_quote"></span></div>
                                </div>
                                <div class="col-sm-10 mb-xs">
                                    <div class="description-cite">
                                        <p>{{$region->quote->body}}</p>
                                    </div>
                                    <div class="description-cite-author">
                                        {{$region->quote->full_name}}{{isset($region->quote->profession) ? ',' : ''}}
                                        {{$region->quote->profession}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img class="img-responsive" src="{{Voyager::image($region->quote->image)}}">
                        </div>
                    </div>
                </div>

                <div class="container container-lg mt-md">
                    <div class="row">
                        <div class="col-xs-12 col-md-9">
                            <h2>Виноделие</h2>
                            {!! $region->winemaking !!}
                        </div>
                    </div>
                </div>

                <div class="container container-lg mt-md mb-md">
                    <div class="row">
                        @foreach (json_decode($region->winemaking_image) as $image)
                            <div class="col-xs-12 col-md-6 mb-xs">
                                <img alt="" class="img-responsive" src="{{Voyager::image($image)}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container container-lg wineries">
                <div class="row">
                    <div class="col-xs-12 col-md-12 text-center">
                          <span class="icon-circle">
                            <span class="icon-icon_wineries"></span>
                          </span><br>
                        <h2 id="wineries">Винодельни региона</h2>
                    </div>
                </div>
            </div>
            <div class="p-t-30 p-l-15 p-r-15">
                <div class="row p-b-30">
                    <div class="col-xs-12">
                        <div id="wineries-slider" class="wineries-slider slide">
                            <div class="carousel-inner" role="listbox">
                                <div class="row auto-height">
                                    <!-- slide start -->
                                    @foreach($region->wineries as $winery)
                                        <div
                                            class="col-xs-12 col-md-6 winery-slide item p-b-30 {{($loop->iteration > 6) ? 'hidden': ''}}">
                                            <div class="background-white winery-info-height">
                                                <div class="row p-b-30">
                                                    <div class="col-lg-3 col-sm-3 col-xs-12 text-center">
                                                        <div class="image">
                                                            <a href="{{route('winery', $winery->slug)}}">
                                                                <img alt="{{$winery->title}}"
                                                                     src="{{Voyager::image($winery->logo_image)}}"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-sm-7 col-xs-12">
                                                        <h4>
                                                            <a class="red-link"
                                                               href="{{route('winery', $winery->slug)}}">{{$winery->title}}</a>
                                                        </h4>
                                                        <div class="dash"></div>
                                                        {!!  $winery->description !!}
                                                    </div>
                                                </div>
                                                <div class="next">
                                                    <a href="{{route('winery', $winery->slug)}}" class="" role="button" data-slide="next">
                                                        <img alt="link" src="{{asset('image/icon_arrow_right.png')}}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @if($loop->iteration == 6)
                                            <div class="clearfix"></div>
                                            <div class="show-more text-center">
                                                <input type="button" name="show-all" class="btn-grey" value="Показать еще">
                                            </div>
                                    @endif
                                @endforeach

                                <!-- slide end -->
                                    <div class="p-b-60"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-white">
                <div class="container container-lg mt-md wines">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 text-center">
                            <span class="icon-circle">
                              <span class="icon-icon_wines"></span>
                            </span><br>
                            <h2 id="wines">Вина {{$region->title}}</h2>
                        </div>
                    </div>
                </div>

                <div class="wines p-t-30">

                    <div class="container-fluid">
                        <div class="col-xs-12">
                            <div class="carousel-inner">
                                <div
                                    class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-free-mode"
                                    id="region-carousel">
                                    <div class="swiper-wrapper">
                                        @foreach($region->wines as $wine)
                                            <div class="swiper-slide item text-center">
                                                <div class="wine">
                                                    <a href="{{route('wine', $wine->slug)}}" class="preview">
                                                        <img src="{{Voyager::image($wine->image)}}"
                                                             alt="{{$wine->title}}" style="max-height: 465px">
                                                    </a>
                                                    <div class="hidden-sm hidden-xs">
                                                        <h2>
                                                            <a href="{{route('wine', $wine->slug)}}" class="preview">
                                                                {{$wine->title}}
                                                            </a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @push('scripts')
            <script type="text/javascript">
                var swiper = new Swiper('.swiper-container', {
                    slidesPerView: 6,
                    spaceBetween: 30,
                    loop: true,
                    freeMode: true,
                    speed: 900,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 20
                        },
                        // when window width is >= 480px
                        480: {
                            slidesPerView: 3,
                            spaceBetween: 30
                        },
                        // when window width is >= 640px
                        640: {
                            slidesPerView: 6,
                            spaceBetween: 40
                        }
                    }
                });
                </script>
                <script>
                    $('input[name="show-all"]').on('click', function () {
                        $(this).hide()
                        $('.winery-slide').removeClass('hidden');
                        $('.clearfix').removeClass('clearfix')
                    })
                </script>
            @endpush
            <style>
                .swiper-button-next, .swiper-button-prev {
                    top:50% !important;
                    height: 44px !important;
                    filter: brightness(0%);
                }
            </style>
        </div>
    </div>
@endsection
