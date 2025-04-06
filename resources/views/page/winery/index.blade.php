@extends('layouts.app')
@section('title', 'Лучшие российские винодельни, купить русское вино')
@section('description', '')
@section('keywords', '')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/winery-page/common.css') }}">
@endpush
@section('content')
    <div id="information-information" class="wineries">
        <div class="heading-wrap">
            <h1>{{$page_title}}</h1>
            <p>Мы собрали для Вас самую полную коллекцию Русских Вин, как крупных заводов, так авторских
                микровиноделен.</p>
        </div>
        <div class="container">
            <div class="row">
                <div id="content" class="">
                    <div class="special-tab">
                        <ul>
                            @foreach($regions as $region)
                                <li class="{{ $loop->first ? 'active' : '' }}"
                                    data-region="{{$region->id}}">{{$region->title}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <h3 id="region-name">Кубань</h3>
                    @foreach($regions as $region)
                        <div
                            class="container container-lg p-t-60 p-b-50 elements-grid {{ $loop->first ? 'active' : '' }}"
                            data-region="{{$region->id}}">
                            @foreach($region->wineries  as $winery)
                                @if(isset($winery_type))
                                    @if ($winery->type_id == $winery_type)
                                        <div class="column-win col-md-3 ">
                                            <!-- winery start -->
                                            <div class="winer-cont row m-b-10 p-t-30 p-b-30 ">
                                                <div class="col-xs-12">
                                                    <div class="winery-slide item active">
                                                        <div class="row">
                                                            <div class="image">
                                                                <a href="{{ route('wine_or_winery', ['slug' => $winery->slug]) }}">
                                                                    <img
                                                                            src="{{ Voyager::image($winery->catalog_image) }}"
                                                                            class="back-win" alt="{{ $winery->title }}">
                                                                    <img src="{{ Voyager::image($winery->logo_image) }}"
                                                                         alt="{{ $winery->title }}"
                                                                         class="wine_logo_catalog">
                                                                </a>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                                                <h2>
                                                                    <a href="{{route('wine_or_winery', $winery->slug)}}">{{$winery->title}}</a>
                                                                </h2>
                                                                <div class="dash"></div>
                                                                <div class="desc-container">
                                                                    {!! $winery->description !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- winery end -->
                                        </div>
                                    @endif
                                @else
                                    <div class="column-win col-md-3 ">
                                        <!-- winery start -->
                                        <div class="winer-cont row m-b-10 p-t-30 p-b-30 ">
                                            <div class="col-xs-12">
                                                <div class="winery-slide item active">
                                                    <div class="row">
                                                        <div class="image">
                                                            <a href="{{route('wine_or_winery', $winery->slug)}}">
                                                                <img src="{{Voyager::image($winery->catalog_image)}}"
                                                                     class="back-win" alt="{{$winery->title}}">
                                                                <img src="{{Voyager::image($winery->logo_image)}}"
                                                                     alt="{{$winery->title}}" class="wine_logo_catalog">
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                                            <h2>
                                                                <a href="{{route('wine_or_winery', $winery->slug)}}">{{$winery->title}}</a>
                                                            </h2>
                                                            <div class="dash"></div>
                                                            <div class="desc-container">
                                                                {!! $winery->description !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- winery end -->
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('.special-tab li').click(function () {
                $('.special-tab li').removeClass('active');
                $(this).addClass('active');
                var region = $(this).attr('data-region'),
                    text_title = $(this).text();
                $('#region-name').text(text_title);
                $('.wineries .container .container-lg > .column-win').removeClass('left-side-b right-side-b');
                $('.wineries .container .container-lg').removeClass('active');
                $('.wineries .container .container-lg[data-region=' + region + ']').addClass('active');
                masonry_grid()
            });
            if ($(window).width() < 992) {
                html = '<div class="show-more"><div class="show-click"></div></div>';
                $('.winery-slide .col-lg-12').append(html);
                $('.show-more div').click(function () {
                    $(this).parent().parent().toggleClass('more-shown');
                });
            }
        </script>
        <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
        <script>
            function masonry_grid() {
                $('.elements-grid').masonry({
                    // options
                    itemSelector: '.column-win',
                    horizontalOrder: true
                });
            }

            $(document).ready(function () {
                masonry_grid()
            });
        </script>
    @endpush
@endsection
