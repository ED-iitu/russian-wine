@extends('layouts.app')
@section('title', 'Регионы Виноделия России')
@section('description', '')
@section('keywords', '')
@section('content')
    <div id="information-information" class="information-wine-regions">
        <div id="content" class="">
            <div class="container container-lg">
                <div class="row">
                    <div class="heading-wrap">
                        <h1>Регионы Виноделия</h1>
                    </div>
                    <div class="col-xs-12">
                        <ul class="nav nav-pills">
                            @foreach($regions as $region)
                                <li id="presentation-{{$region->id}}" class="active_li {{ $loop->first ? 'active' : '' }}">
                                    <a href="#pane-{{$region->id}}" data-target="#pane-{{$region->id}}"
                                       data-toggle="tab" class="active_link">{{$region->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="map">
                 <div id="map" style="position: relative; overflow: hidden;">
                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                        <div class="gm-err-container">
                            <div class="gm-err-content">
                                <div class="gm-err-icon">
                                    <img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" draggable="false" style="user-select: none;">
                                </div>
                                <div class="gm-err-title">Ошибка</div>
                                <div class="gm-err-message">При загрузке Google Карт на этой странице возникла проблема. Подробности вы найдете в консоли JavaScript.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                @foreach($regions as $region)
                    <div id="pane-{{$region->id}}" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                        <div class="container container-lg">
                            <div class="row">
                                <div class="col-lg-6 region-description">
                                    <h2>{{$region->title}}</h2>
                                    <p style="padding: 0; line-height: 1.8;">{!! $region->description !!}</p>
                                    <p style="padding: 50px 0"><a href="{{route('region', $region->slug)}}" class="btn-white">Подробнее о
                                            регионе</a>
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <div
                                        class="col-lg-offset-2 col-lg-10 col-md-6 col-md-offset-6 region-info background-grey">
                                        <div class="row">
                                            <div class="col-lg-9 col-lg-offset-3 wine-species">
                                                <div>
                                                    <div class="col-xs-12 background-white">
                                                        <div class="col-xs-3 text-right">
                                                            <span class="icon-icon_wine_species"></span>
                                                        </div>
                                                        <div class="col-xs-9 wine-species-text">
                                                            <h4>Сорта винограда:</h4>
                                                            @foreach($region->sorts as $sort)
                                                                {{$sort->title}}@if(!$loop->last),@endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-lg-10 col-md-9 region-image">
                                            <img alt="main_image" src="{{Voyager::image($region->main_image)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <br><br><br>
                                    <h3 class="text-center p-b-30">Винодельни региона</h3>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-30 p-b-30" style="overflow: hidden">
                            <div class="region-wineries">
                                <div class="col-xs-12">
                                    <div class="row auto-height">
                                        <!-- slide start -->
                                        @foreach($region->wineries as $wineries)
                                            <div class="col-xs-6 col-sm-3 col-md-2 text-center image-border">
                                                <div style="height: 260px;">
                                                    <a href="{{route('winery', $wineries->slug)}}"
                                                       class="p-t-60 p-b-60">
                                                    <span class="middle-box">
                                                        <img alt="{{$wineries->title}}"
                                                             src="{{Voyager::image($wineries->logo_image)}}">
                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                    @endforeach
                                    <!-- slide end -->
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>


                    </div>
                @endforeach
            </div>


            

    
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

            <script>
                var markers = [];

                var showActiveMarkers = function (region) {
                    for (var i = 0; i < markers.length; i++) {
                        if (markers[i].region == region) {
                            markers[i].setOpacity(1);
                        } else {
                            markers[i].setOpacity(0.55);
                        }
                    }
                }

                $(function () {
                    $('#content a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                        var region = $(e.target).text();
                        showActiveMarkers(region);
                    });
                });



                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 6,
                        center: {lat: 46.3287957, lng: 43.1502572},
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
                    @foreach($regions as $region)
                    (function () {
                        var marker = new google.maps.Marker({
                            region: '{{$region->title}}',
                            position: {lat: {{$region->coordinate_lat}}, lng: {{$region->	coordinate_lon}}},
                            icon: '{{asset('image/map_marker.png')}}',
                            map: map
                        });
                        markers.push(marker);
                        marker.addListener('click', function () {
                            $('#content a[data-toggle="tab"][data-target="#pane-{{$region->id}}"]').click();
                        });
                    })();
                    @endforeach
                    showActiveMarkers("Кубань");
                }
            </script>
           <script>
                $('.active_link').on('click', function () {
                    var click_id =$(this).data("target");
                    click_id = click_id.replace('#pane-', '')
                    $('.active_li').removeClass('active');
                    $('#presentation-'+ click_id).addClass('active');
                })
            </script>
        </div>
    </div>
@endsection
