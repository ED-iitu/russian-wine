@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endpush
@section('body_class', 'footer-hide')
@section('content')
    <div id="profile">
        <div id="content">
            <div class="row">
                @include('profile.layouts.left-side-menu')
                <div class="col-md-8 bg_white">
                    <div class=" subscription-block">
                        <div class="tab">
                            <h1>Подписки</h1>
                            <button class="tab_links active" onclick="openSubWines(event, 'current')">Действующие
                            </button>
                            <button class="tab_links" onclick="openSubWines(event,'past')">Прошедшие</button>
                        </div>
                        <div id="current" class="tab_content">
                            <hr>
                            @if($active_count == 0)
                                <div class="mt-lg text-center">
                                    <h3 style="color: black; font-size: 20px">У вас нет действующих подписок</h3>
                                    <a href={{route('subscription')}}>
                                        <button class="btn-danger">Оформить
                                            подписку
                                        </button>
                                    </a>
                                </div>
                            @else
                                @foreach($subscriptions as $subscription)
                                    @if ($subscription->status == 'ACTIVE')
                                        <h2>{{$subscription->set->title}}</h2>
                                        <div>
                                            <span>{{$subscription->set->duration}} месяца</span><span> | </span>
                                            @if($subscription->set->duration)
                                                <span>до {{$subscription->created_at->modify('+ '.$subscription->set->duration.'month')->format('d.m.y') }}</span>
                                            @endif
                                        </div>
                                        <div class="delivery_images">
                                            @for ($i = 0; $i < $subscription->set->duration; $i++)
                                                @if(isset($subscription->delivery[$i]))
                                                    @if($subscription->delivery[$i]->status)
                                                        <img src="{{asset('image/winepot_active.svg')}}"
                                                             alt="delivery-done">
                                                    @else
                                                        <img src="{{asset('image/winepot.svg')}}" alt="delivery-done">
                                                    @endif
                                                @else
                                                    <img src="{{asset('image/winepot.svg')}}" alt="delivery-done">
                                                @endif
                                            @endfor
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div id="past" class="tab_content" style="display: none">
                            @if($inactive_count == 0)
                                <div class="mt-lg text-center">
                                    <h3 style="color: black; font-size: 20px">У Вас нету прошедших подписок</h3>
                                    <a href={{route('subscription')}}>
                                        <button class="btn-danger">Оформить
                                            подписку
                                        </button>
                                    </a>
                                </div>
                            @else
                                @foreach($subscriptions as $subscription)
                                    @if ($subscription->status == 'INACTIVE')
                                        <h2>{{$subscription->set->title}} </h2>
                                        <div>
                                            <span>{{$subscription->set->duration}} месяца</span><span> | </span>
                                            @if($subscription->set->duration)
                                                <span>до {{$subscription->created_at->modify('+ '.$subscription->set->duration.'month')->format('d.m.y') }}</span>

                                            @endif
                                        </div>
                                        <div class="delivery_images">
                                            @for ($i = 0; $i < $subscription->set->duration; $i++)
                                                @if(isset($subscription->delivery[$i]))
                                                    @if($subscription->delivery[$i]->status)
                                                        <img src="{{asset('image/winepot_active.svg')}}"
                                                             alt="delivery-done">
                                                    @else
                                                        <img src="{{asset('image/winepot.svg')}}" alt="delivery-done">
                                                    @endif
                                                @else
                                                    <img src="{{asset('image/winepot.svg')}}" alt="delivery-done">
                                                @endif
                                            @endfor
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openSubWines(evt, subTime) {
            var i, tab_content, tab_links;
            tab_content = document.getElementsByClassName("tab_content");
            for (i = 0; i < tab_content.length; i++) {
                tab_content[i].style.display = "none";
            }
            tab_links = document.getElementsByClassName("tab_links");
            for (i = 0; i < tab_links.length; i++) {
                tab_links[i].className = tab_links[i].className.replace(" active", "");
            }
            document.getElementById(subTime).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
