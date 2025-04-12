@extends('layouts.app')
@section('content')
    <div id="winemakers">
        <div id="content">
            <div class="heading-wrap">
                <h1>Виноделы</h1>
                <div class="container container-lg">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <p>Вы должны знать их в лицо, это профессионалы своего дела. Вино стало для них новым
                                вызовов, а главное отдушиной. </p>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($winemakers as $winemaker)
                <div class="winemaker-details winemaker-details-{{$winemaker->id}}">
                    <div class="close_block"></div>
                    <div class="float-right">
                        <div class="background-white">
                            <div class="container container-lg">
                                <div class="row">
                                    <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-3">
                                        <h1>{{$winemaker->full_name}}</h1>
                                        <div class="icon-icon_x text-right close-icon"></div>
                                        <div id="in_par" class="text-center">
                                            <p>
                                                @if(isset($winemaker->winery))
                                                    <a href="{{route('wine_or_winery', $winemaker->winery->slug)}}">
                                                        {{$winemaker->winery->title}}
                                                    </a>  |
                                                @endif
                                            </p>
                                            <p><a href="{{route('region', $winemaker->region->slug)}}">
                                                    {{$winemaker->region->title}}
                                                </a>
                                            </p>
                                        </div>
                                        <img src="{{Voyager::image($winemaker->modal_image)}}"
                                             alt="{{$winemaker->full_name}}"
                                             class="img-responsive">
                                        <div class="description" style="text-align: left;">
                                            {!!  $winemaker->description !!}
                                        </div>
                                        <div class="winery-link">

                                            <a href="{{ isset($winemaker->winery) ? route('wine_or_winery', $winemaker->winery->slug) : '#'}}">
                                                <p>{{isset($winemaker->winery) ? $winemaker->winery->title : ''}}</p>
                                                <span class="icon-icon_arrow_right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="container container-lg mt-md">
                <div class="row">
                    @foreach($winemakers as $winemaker)
                        <div id="winemaker{{$winemaker->id}}" class="col-sm-6 col-md-4 mt-xs mb-md winemaker-cont">
                            <div class="winemaker">
                                <div class="image">
                                    <a class="preview" data-target=".winemaker-details-{{$winemaker->id}}"><img
                                            src="{{Voyager::image($winemaker->image)}}"
                                            alt="{{$winemaker->seo_title}}" class="img-responsive" style="width: 100%; margin: 0;"></a>
                                </div>
                                <div class="description-wrap">
                                    <h2>{{$winemaker->full_name}}</h2>
                                    <div class="description">
                                        <ul>
                                            <li>
                                                <p>
                                                    @if(isset($winemaker->winery))
                                                        <a class="text-black"
                                                           href="{{route('wine_or_winery', $winemaker->winery->slug)}}">
                                                            {{$winemaker->winery->title}}
                                                        </a>
                                                    @endif
                                                </p>
                                            </li>
                                            <li>
                                                <p><a class="text-black"
                                                      href="{{route('region', $winemaker->region->slug)}}">
                                                        {{$winemaker->region->title}}
                                                    </a></p></li>
                                            <li><p>Вина:
                                                    @foreach($winemaker->wines as $wine)
                                                        <a class="text-black"
                                                           href="{{route('wine_or_winery', $wine->slug)}}"> {{$wine->title}}</a>
                                                        @if(!$loop->last)
                                                            ,@endif
                                                    @endforeach
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        body {
            background: #F5F5F5;
        }

        .description ul {
            list-style: disc !important;
        }

        .description ul li {
            margin-left: -20px;
        }
    </style>
    @push('scripts')
        <script>
            $(document).ready(function () {
                let searchParams = new URLSearchParams(window.location.search)
                let id = searchParams.get('id')
                $('.winemaker-details-' + id).show()
                $('.winemaker-details-' + id).addClass('product-preview')

            });
            $('.preview').on('click', function () {
                var id = $(this).data('target');
                $(id).show()
                $(id).addClass('product-preview')
            })
            $('.close-icon').on('click', function () {
                $('.winemaker-details').hide()
            })
            $('.close_block').on('click', function () {
                $('.winemaker-details').hide()
            })
        </script>
    @endpush
@endsection
