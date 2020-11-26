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
                    <div class="sets-block" >
                        <h1>Сеты</h1>
                        @if(count($sets) > 0)
                        <table class="table text-center" id="sets_table">
                            <tbody>
                            @foreach($sets as $set)

                                <tr>
                                    <td width="20%">
                                        <a href="{{route('set', $set->slug)}}"><img src="{{Voyager::image($set->image)}}"
                                             alt="{{$set->title}}"></a>
                                    </td>
                                    <td class="text-center"><b>{{$set->title}}</b></td>
                                    <td class="text-center">
                                        <b>{{$set->price}}</b>
                                        <span class="currency">о</span><b></b>
                                    </td>
                                        <td>
                                            <form method="post" action="{{route('profile-set-order')}}">
                                                <input type="hidden" value="{{$set->id}}" name="sets[]">
                                                @csrf
                                                <input class="btn-danger" type="submit" id="form-send-btn" value='Повторить заказ'>
                                            </form>
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="mt-lg text-center">
                                <h3>Вы не заказали ни одного сета</h3>
                                <a href={{route('wine_shop')}}>
                                    <button class="btn-danger">Перейти в Винотеку</button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
