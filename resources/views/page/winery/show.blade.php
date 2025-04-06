@extends('layouts.app')
@section('title', $winery->meta_title)
@section('description', $winery->meta_description)
@section('keywords', $winery->meta_keywords)
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/winery-page/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/winery-page/layout-'.$winery->layout_id.'.css') }}">
@endpush
@section('content')
    <div id="information-winery" class="information-winery layout-{{$winery->layout_id}}">
        <div id="content" class="">
            <div id="main_page">
                <div class="main_bg"
                     style="    background: url('{{Voyager::image($winery->header_image)}}'); background-size: cover">
                    <div class="container" style="position:relative;">
                        <div class="row mt-md mb-sm">
                            <div class="col-xs-8 col-xs-offset-2">
                                <div class="logo-wrap" style="background: transparent;">
                                    <img alt="logo_image" class="mt-mdlg mb-mdlg logo"
                                         src="{{Voyager::image($winery->logo_image)}}"
                                         style="padding:0;margin:0; ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="mb-md">{{$winery->title}}</h1>
                            </div>
                        </div>
                        <p class="signature">{{$winery->signature}}</p>
                    </div>
                </div>
                <!-- ABOUT -->
                @include('page.winery.layouts.layout-' . $winery->layout_id)

            </div>
            <div id="information-winery" class="information-winery">
                <div id="inf_winery">
                    <div class="winery-wines">
                        <div class="col-xs-12">
                            <h2>Вина {{$winery->title}}</h2>
                        </div>
                    </div>
                    <div class="swiper-viewport">
                        <div id="wines-carousel"
                             class="swiper-container swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper">
                                @foreach($winery->wines as $wine)
                                    <div class="swiper-slide">
                                        <div class="item-inner">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="no_pad_no_act">
                                                        <div class="image">
                                                            <div class="wine">
                                                                <a href="{{route('wine_or_winery', $wine->slug)}}"
                                                                   class="preview">
                                                                    <img alt="{{$wine->title}}" class="img-responsive"
                                                                         src="{{Voyager::image($wine->image)}}" style="height: 111%; width: auto;">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-sm-offset-1 wine-description">
                                                    <div class="wine">
                                                        <h3>
                                                            <a href="{{route('wine_or_winery', $wine->slug)}}"
                                                               class="preview">
                                                                {{$wine->title}}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="specs">
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-6">
                                                                <b>Крепость:</b>
                                                            </div>
                                                            <div class="col-xs-4 col-sm-6">
                                                                {{$wine->fortress}} %
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-6">
                                                                <b>Цвет:</b>
                                                            </div>
                                                            <div class="col-xs-4 col-sm-6">
                                                                {{$wine->color->title}}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-6">
                                                                <b>Сорт винограда:</b>
                                                            </div>
                                                            <div class="col-xs-4 col-sm-6 sorts_of_v">
                                                                <span>{{$wine->sort->title}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-6">
                                                                <b>Содержание сахара:</b>
                                                            </div>
                                                            <div class="col-xs-4 col-sm-6">

                                                                {{isset($wine->sugar) ? $wine->sugar->title : ''}}
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-8 col-sm-6">
                                                                <b>Год урожая:</b>
                                                            </div>
                                                            <div class="col-xs-4 col-sm-6">
                                                                {{$wine->year}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="special">
                                                        {!! $wine->production_feature !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="dots">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4 text-center">
                                        <div class="carousel-indicators">
                                            <div class="swiper-pagination wines-carousel"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

                        <div class="swiper-pager">
                            <div class="swiper-button-next swiper-button-white swiper-button-white" tabindex="0"
                                 role="button" aria-label="Next slide">
                            </div>
                            <div class="swiper-button-prev swiper-button-white swiper-button-white" tabindex="0"
                                 role="button" aria-label="Previous slide"></div>
                        </div>

                    </div>
                    @push('scripts')
                        <script type="text/javascript">
                            var swiper = new Swiper('.swiper-container', {
                                mode: 'horizontal',
                                slidesPerView: 'auto',
                                centeredSlides: true,
                                center: true,
                                loop: true,
                                loopFillGroupWithBlank: true,
                                pagination: '.wines-carousel',
                                paginationClickable: true,
                                navigation: {
                                    nextEl: '.swiper-button-next',
                                    prevEl: '.swiper-button-prev',
                                },

                            });
                        </script>
                    @endpush
                </div>
                <script>
                    var markers = [];

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 6,
                            center: {lat: {{$winery->coordinate_lat}}, lng: {{$winery->coordinate_lon}}},
                            styles: [
                                {
                                    "featureType": "all",
                                    "elementType": "labels.text.fill",
                                    "stylers": [
                                        {
                                            "saturation": 36
                                        },
                                        {
                                            "color": "#333333"
                                        },
                                        {
                                            "lightness": 40
                                        }
                                    ]
                                },
                                {
                                    "featureType": "all",
                                    "elementType": "labels.text.stroke",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        },
                                        {
                                            "color": "#ffffff"
                                        },
                                        {
                                            "lightness": 16
                                        }
                                    ]
                                },
                                {
                                    "featureType": "all",
                                    "elementType": "labels.icon",
                                    "stylers": [
                                        {
                                            "visibility": "off"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "administrative",
                                    "elementType": "geometry.fill",
                                    "stylers": [
                                        {
                                            "color": "#fefefe"
                                        },
                                        {
                                            "lightness": 20
                                        }
                                    ]
                                },
                                {
                                    "featureType": "administrative",
                                    "elementType": "geometry.stroke",
                                    "stylers": [
                                        {
                                            "color": "#fefefe"
                                        },
                                        {
                                            "lightness": 17
                                        },
                                        {
                                            "weight": 1.2
                                        }
                                    ]
                                },
                                {
                                    "featureType": "administrative",
                                    "elementType": "labels",
                                    "stylers": [
                                        {
                                            "visibility": "on"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "landscape",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "color": "#ffffff"
                                        },
                                        {
                                            "lightness": 20
                                        },
                                        {
                                            "gamma": "0.61"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "color": "#f5f5f5"
                                        },
                                        {
                                            "lightness": 21
                                        }
                                    ]
                                },
                                {
                                    "featureType": "poi.park",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "color": "#ebebeb"
                                        },
                                        {
                                            "lightness": 21
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.highway",
                                    "elementType": "geometry.fill",
                                    "stylers": [
                                        {
                                            "color": "#ffffff"
                                        },
                                        {
                                            "lightness": 17
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.highway",
                                    "elementType": "geometry.stroke",
                                    "stylers": [
                                        {
                                            "color": "#ffffff"
                                        },
                                        {
                                            "lightness": 29
                                        },
                                        {
                                            "weight": 0.2
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.arterial",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "color": "#ffffff"
                                        },
                                        {
                                            "lightness": 18
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.arterial",
                                    "elementType": "geometry.fill",
                                    "stylers": [
                                        {
                                            "gamma": "1"
                                        }
                                    ]
                                },
                                {
                                    "featureType": "road.local",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "color": "#ffffff"
                                        },
                                        {
                                            "lightness": 16
                                        }
                                    ]
                                },
                                {
                                    "featureType": "transit",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "color": "#f2f2f2"
                                        },
                                        {
                                            "lightness": 19
                                        }
                                    ]
                                },
                                {
                                    "featureType": "water",
                                    "elementType": "geometry",
                                    "stylers": [
                                        {
                                            "color": "#e1e1e1"
                                        },
                                        {
                                            "lightness": 17
                                        }
                                    ]
                                }
                            ]
                        });

                        (function () {
                            var marker = new google.maps.Marker({
                                position: {lat: {{$winery->coordinate_lat}}, lng: {{$winery->coordinate_lon}}},
                                icon: '{{asset('image/map_marker.png')}}',
                                map: map
                            });
                            markers.push(marker);
                        })();
                    }
                </script>
             </div>
        </div>
    </div>
@endsection

<style type="text/css">
    
@media (min-width:1600px){
    .mt-md{
        padding-top: 70px !important;
    }
}

@media (min-width:1600px){
    .mt-md{
        padding-top: 95px !important;
    }
}

</style>