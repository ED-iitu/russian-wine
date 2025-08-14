@extends('layouts.app')
@section('title', '🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!')
@section('content')
    <div id="blur_cont">
        <div id="blur-cont" class="sety-category">
            <div id="sety-banner">
                <h1 class="">🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!</h1>
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