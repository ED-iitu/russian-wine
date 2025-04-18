@extends('layouts.app')
@section('title', 'Где купить российское вино, магазин русское вино, винный магазин Русское Вино')
@section('description', '')
@section('keywords', '')
@section('content')
    <div id="wheretobuy">
        <div id="content">
            <div class="map-wrap">
                <div class="row no-gutters row-eq-height">
                    <div class="hidden-xs col-sm-6 col-md-4 col-lg-3">
                            <input class="form-control search pac-target-input" type="text" placeholder="ВАШ ГОРОД"
                                   autocomplete="off">
                        <div class="addresses">
                            @foreach($contacts as $contact)
                                <div class="address" data-index="{{$loop->iteration}}">
                                    <h2 class="text-white">{{$contact->title}}</h2>
                                    <p class="text-white">{{$contact->address}}</p>
                                    <p class="text-white"> {{$contact->phone}}</p>
                                    <p class="text-white">{{$contact->schedule}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div  id="map" class="col-xs-12 col-sm-6 col-md-8 col-lg-9" style="height: 60vh;">

                    </div>
                </div>
            </div>
            @push('scripts')
                <script>
                    var markers = [];
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 9,
                            center: {lat: 55.8410561, lng: 46.8521622},
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

                        @foreach($contacts as $contact)
                        (function () {
                            var marker = new google.maps.Marker({
                                position: {lat: {{$contact->coordinate_lat}}, lng: {{$contact->coordinate_lon}}},
                                icon: '{{asset('image/map_marker_wine_active.png')}}',
                                map: map
                            });
                            var info_window = new google.maps.InfoWindow({
                                content: '<div class="address">' +
                                    '<h2>{{$contact->title}}</h2>' +
                                    '<p><span class="icon-wrap"><img alt="address_icon" src="/image/address_marker.png" /></span> {{$contact->address}}</p>' +
                                    '<p><span class="icon-wrap"><img alt="phone_icon" src="/image/address_phone.png" /></span> {{$contact->phone}}</p>' +
                                    '<p><span class="icon-wrap"><img alt="time_icon" src="/image/address_time.png" /></span>{{$contact->schedule}}</p>' +
                                    '</div>'
                            });
                            markers.push(marker);
                            marker.addListener('click', function () {
                                info_window.open(map, marker);
                                $('.addresses .address[data-index="{{$loop->index}}"]').click();
                                map.addListener('click', function () {
                                    info_window.close();
                                })
                            });
                        })();
                        @endforeach
                        var addresses = $('.addresses .address');
                        var active_marker = null;
                        addresses.on('click', function () {
                            addresses.removeClass('selected');
                            $(this).addClass('selected');
                            if (active_marker) {
                                active_marker.setIcon('/image/map_marker_wine.png');
                            }
                            active_marker = markers[$(this).attr('data-index') - 1];
                            active_marker.setIcon('/image/map_marker_wine_active.png');
                            map.panTo(active_marker.getPosition());

                        });
                        // first active
                        if (markers.length) {
                            $('.addresses .address[data-index="1"]').click();
                        }
                        // box heights
                        $(window).on('resize', function () {
                            var max = $(window).height() - $('header').height();
                            $('.addresses').css('max-height', max);
                            if ($(window).width() < 767) {
                                $('#map').css('min-height', max);
                            } else {
                                $('#map').css('min-height', 300);
                            }
                        }).trigger('resize');
                        // autocomplete
                        var autocomplete = new google.maps.places.Autocomplete($('#wheretobuy .search')[0]);
                        autocomplete.addListener('place_changed', function () {
                            var place = autocomplete.getPlace();
                            if (!place.geometry) {
                                return false;
                            }
                            map.panTo(place.geometry.location);
                        });
                    }
                </script>

            @endpush
        </div>
    </div>
@endsection
