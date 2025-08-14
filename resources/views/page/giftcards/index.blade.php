@extends('layouts.app')
@section('title', '🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!')
@section('content')
    <div class="row subHeader">
        <ul class="breadcrumb" id="breadcrumb">
            <li><a href="{{route('home')}}">Главная</a></li>
            <li><a href="{{route('wine_shop')}}">Подарочные карты</a></li>
        </ul>
        <h1 class="pageHeading">🎁 Подарочные карты «Русское Вино» — дарите вкус и эмоции!</h1>
        <p class="pageDesc">Идеальный подарок для ценителей вина — от 5 000 до 20 000 рублей.</p>
    </div>
@endsection