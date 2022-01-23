@extends('layouts.app')
@section('body_class', 'footer-hide')
@section('content')
<div id="common-success" class="container-fluid">

    <div class="row">
        <div id="content" class="">
            <h1>Ваша заявка принята</h1>
            <div id="main-text">{!! $message !!}</div>

            <div id="subtext">
                <p>
                    В соответствии с рекомендациями ФС РАР от 25.06.18 уведомляем: <br>
                    алкогольная продукция не продается и не доставляется в ночное время, не продается <br>
                    и не доставляется несовершеннолетним, не продается дистанционно, а может быть приобретена<br>
                    непосредственно в магазине по адресу г. Москва, ул. Расплетина, д. 21.

                </p>
                <p>
                    ООО «Вайн Стори» ИНН 7734360271, лицензия:№ 77 РПА 0013578 от 13.12.18,<br> Москва, улица Расплетина, д. 21, пом. V, комн. 1,2,3,5
                </p>

            </div>
            <div class="buttons">
                <a href="{{route('home')}}" class="btn btn-danger">Продолжить</a>
            </div>
        </div>
    </div>
</div>
@endsection
