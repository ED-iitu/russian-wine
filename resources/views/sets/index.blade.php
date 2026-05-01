@extends('layouts.app')
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
                            <img alt="{{$set->title}}" src="{{Voyager::image($set->image)}}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
