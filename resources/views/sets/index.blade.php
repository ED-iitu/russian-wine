@extends('layouts.app')
@push('styles')
    <style>
        .sety-category #sety-section {
            display: flex;
            flex-wrap: wrap;
            gap: 3rem;
            align-items: stretch;
        }

        .sety-category #sety-section .product_cont {
            float: none;
            width: calc(33.333% - 2rem);
            margin: 0;
        }

        .sety-category #sety-section .product_cont img {
            display: block;
            width: 100%;
            height: auto;
        }

        @media (max-width: 991px) {
            .sety-category #sety-section {
                display: block;
                gap: 0;
            }

            .sety-category #sety-section .product_cont {
                width: 100%;
            }
        }
    </style>
@endpush
@section('content')
    <div id="blur_cont">
        <div id="blur-cont" class="sety-category">
            <div id="sety-banner">
                <h1 class="forwc">Винные сеты</h1>
                <p>Мы объехали все винодельни нашей страны и нашли самые интересные вина, тираж которых может быть
                    ограничен всего одной бочкой в год!</p>
            </div>
            <div id="sety-section">
                @foreach($sets as $set)
                    <div class="product_cont">
                        <div class="product_info">
                            <a href="{{route('set', $set->slug)}}">{{$set->title}}</a>
                            <span>{{$set->price}} <b>п</b></span>
                        </div>
                        <a href="{{route('set', $set->slug)}}">
                            <img alt="{{$set->title}}" loading="lazy" decoding="async" src="{{Voyager::image($set->image)}}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
