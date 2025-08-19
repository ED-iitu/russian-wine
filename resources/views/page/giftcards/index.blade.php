@extends('layouts.app')
@section('title', '🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!')
@section('content')
    <style>
        .pageHeader {
            font: 3vw ProximaNova-Bold;
            text-transform: none;
            left: 12.500vw;
            top: 6.250vw;
            right: 66.667vw;
            text-align: left;
            /* letter-spacing: 0; */
            line-height: 1;
            color: white;
        }
    </style>
    <div id="blur_cont">
        <div id="blur-cont" class="sety-category">
            <div id="sety-banner">
                <h1 class="pageHeader">🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!</h1>
                <p>Идеальный подарок для ценителей вина — от 5 000 до 20 000 рублей.</p>
            </div>
            <div id="sety-section">
                @foreach($amounts as $key => $amount)
                    <div class="product_cont">
                        <div class="product_info">
                            <h4>Карта № {{$key + 1}}</h4>
                            <span>{{$amount}} <b>п</b></span>
                        </div>
                        <a href="">
                            <img alt="" src="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection