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
                        <div class="favorite_block">
                            <h1>Избранное</h1>
                            @if($favorites->isEmpty())
                                <div class="mt-lg text-center" id="favorite_zero">
                                    <h3 style="color: black; font-size: 20px">В избраном пока ничего нет <br> но вы можете их добавить из винотеки</h3>
                                    <a href={{route('wine_shop')}}>
                                        <button class="btn-danger">Перейти в Винотеку</button>
                                    </a>
                                </div>
                            @else
                            <table class="table" id="favorite_table">
                                @foreach($favorites as $favorite)
                                    <tbody>
                                    <tr id="fav-tr-{{$favorite->id}}">
                                        <td>
                                            <div class="form-group-checkbox">
                                                <input type="checkbox" form="favorite_order" id="favorite-{{$favorite->id}}" value="{{$favorite->id}}" name="wines[]">
                                                <label for="favorite-{{$favorite->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ Voyager::image($favorite->image) }}" width="30px"
                                                 height="100px" alt="">'
                                        </td>
                                        <td>
                                            <b>{{$favorite->title}}</b>

                                            <div style="margin-top: 8px;">
                                                <span>{{$favorite->color->title}} </span> |
                                                <span>{{$favorite->sugar->title}} </span> |
                                                <span>{{$favorite->year}}</span>
                                            </div>
                                        </td>
                                        <td>
                                        <td>
                                            <b>{{$favorite->price}}</b>
                                            <span class="currency">о</span>
                                        </td>
{{--                                        <td>--}}
{{--                                            <button type="submit" onclick="add_delete_favorite({{$favorite->id}}, 'delete')" class="delete_favorite" id="{{$favorite->id}}"><i--}}
{{--                                                    class="fa fa-trash" aria-hidden="true"></i></button>--}}
{{--                                        </td>--}}
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            @endif
                            <form method="post" id="favorite_order" action="{{route('profile-favorite-order')}}">
                                @csrf
                                <input class="btn-danger" type="submit" id="form-send-btn" value='Сделать заказ' style="display: none">
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/favorite.js') }}"></script>
    @endpush
@endsection
