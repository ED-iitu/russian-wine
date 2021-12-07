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
                    <div class="order-table-block">
                        <h1>Мои заказы</h1>
                        @if(count($orders) > 0)

                            <table class="table" id="order_table">
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td><b>Заказ #{{ $order['id'] }}</b></td>
                                        <td>{{$order['date_created']}}</td>
                                        <td>
                                            <b>{{$order['total_price']}}</b>
                                            <span class="currency">о</span>
                                        </td>
                                        <td>
                                            <button type="submit" id="order-{{ $order['id']}}" class="show-details">
                                                <i class="fa fa-align-justify" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
                @if(count($orders) == 0)
                    <div class="mt-lg text-center">
                        <h3>Вы не сделали ни одного заказа</h3>
                        <a href={{route('wine_shop')}}>
                            <button class="btn-danger">Перейти в Винотеку</button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('.show-details').on('click', function () {
                var order_id = $(this).attr('id');
                order_id = order_id.replace('order-', '')

                $('input[name="orders"]').val(order_id)

                $.ajax({
                    url: '/profile/order/' + order_id,
                    success: function (data) {
                        document.getElementById("order-products").innerHTML = "";
                        $.each(data.products, function (key, value) {
                            if(value['class'] === 'wine') {
                                $('#order-products').append("<div class='order-product col-md-12'>" +
                                    "<div class='col-md-4'><img class='" + value['class'] + "' alt='" + value['title'] + "' " +
                                    "src='" + value['image'] + "'></div>\n" +
                                    "<div class='col-md-8'><b>" + value['title'] + "</b>" +
                                    "<div class='product-info'><span>" + value['color'] + " </span> | " +
                                    "<span> " + value['sugar'] + " </span> | <span>" + value['year'] + "</span></div>" +
                                    "<b>" + value['price'] + "</b><span class='currency'>о</span>\n" +
                                    "</div></div>")
                            } else if (value['class'] === 'set') {
                                $('#order-products').append("<div class='order-product col-md-12'>" +
                                    "<div class='col-md-4'><img class='" + value['class'] + "' alt='" + value['title'] + "' " +
                                    "src='" + value['image'] + "'></div>\n" +
                                    "<div class='col-md-8'><b>" + value['title'] + "</b>" +
                                    "<div class='product-info'></div>" +
                                    "<b>" + value['price'] + "</b><span class='currency'>о</span>\n" +
                                    "</div></div>")
                            }

                        })
                        $('#order_price').text(data.total_sum);
                        $('#order_date').text(data.date_created);
                        $('#order_title').text('Заказ ' + order_id);
                    },
                    complete: function () {
                        $('#order-show').addClass('open')
                    }
                });
            })
        </script>
    @endpush
    <div id="order-show">
        <div>
            <button id="close-cart"
                    onclick="$('#order-show').removeClass('open');$('body').removeClass('nooverflow1');$('body').removeClass('nooverflow');"></button>
            <div id="close-mask" class="empty_cart_block empty-cart"></div>
            <div id="cart-cart" class="empty_cart_block empty-cart">
                <div class="newcart" id="for_the_scroll">
                    <div id="order_info" class="background-dark-purple text-center ">
                        <h3 id="order_title" class="text-center text-white"></h3>
                        <p id="order_date"></p>
                        <h4><b id="order_price"></b>
                            <span class="currency">о</span>
                        </h4>
                    </div>
                    <div class="order-product-list">
                        <div class="row" id="order-products">

                        </div>
                    </div>
                    <form method="POST" action="{{route('reorder')}}">
                        @csrf
                        <input type="hidden" value="" name="orders" id="ordersModal">
                        <div class="orderBtn" style="margin-top: 30px; bottom: 0">
                            <button type="submit" id="reorder" class="btn-danger">Повторить заказ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
