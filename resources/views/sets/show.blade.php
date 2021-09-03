@extends('layouts.app')
@section('title', $set->seo_title)
@section('description', $set->meta_description)
@section('keywords', $set->meta_keywords)
@section('body_class', 'set-page footer-hide other-page')
@section('content')
    <div id="desktop-product">
        <div class="other-page" id="other-page">
            <div class="product-page">
                <div id="spec-cont" class="col-sp-15">
                    <div class="inner-image">
                        <div class="image-set">
                            @switch($wine_count)
                                @case(1)
                                @for ($i = 0; $i < 6; $i++)
                                    <a data-bottle="{{$set->wines[0]->id}}">
                                        <img alt="{{$set->wines[0]->title}}"
                                             src="{{Voyager::image($set->wines[0]->image)}}">
                                    </a>
                                @endfor
                                @break
                                @case(2)
                                @for ($i = 0; $i < 3; $i++)
                                    <a data-bottle="{{$set->wines[0]->id}}">
                                        <img alt="{{$set->wines[0]->title}}"
                                             src="{{Voyager::image($set->wines[0]->image)}}">
                                    </a>
                                    <a data-bottle="{{$set->wines[1]->id}}">
                                        <img alt="{{$set->wines[1]->title}}"
                                             src="{{Voyager::image($set->wines[1]->image)}}">
                                    </a>
                                @endfor
                                @break
                                @case(3)
                                @for ($i = 0; $i < 2; $i++)
                                    <a data-bottle="{{$set->wines[0]->id}}">
                                        <img alt="{{$set->wines[0]->title}}"
                                             src="{{Voyager::image($set->wines[0]->image)}}">
                                    </a>
                                    <a data-bottle="{{$set->wines[1]->id}}">
                                        <img alt="{{$set->wines[1]->title}}"
                                             src="{{Voyager::image($set->wines[1]->image)}}">
                                    </a>
                                    <a data-bottle="{{$set->wines[2]->id}}">
                                        <img alt="{{$set->wines[2]->title}}"
                                             src="{{Voyager::image($set->wines[2]->image)}}">
                                    </a>
                                @endfor
                                @break
                                @default
                                @foreach($set->wines as $wine)
                                    <a data-bottle="{{$wine->id}}">
                                        <img alt="{{$wine->title}}" src="{{Voyager::image($wine->image)}}">
                                    </a>
                                @endforeach
                                @break
                            @endswitch
                            {{--                            @foreach($set->wines as $wine)--}}
                            {{--                                <a data-bottle="{{$wine->id}}">--}}
                            {{--                                    <img alt="{{$wine->title}}" src="{{Voyager::image($wine->image)}}">--}}
                            {{--                                </a>--}}
                            {{--                            @endforeach--}}
                        </div>
                    </div>
                    @if($page_type == 'subscription')
                    <a class="other-product"
                       href="{{ isset($set->prevSet) ? route('set', $set->prevSet->slug.'?type=subscription')  : '/?type=subscription' }}">
                        <img alt="prev_image" src="{{asset('image/prev.png')}}">
                    </a>
                    <a class="other-product"
                       href="{{isset($set->nextSet) ? route('set', $set->nextSet->slug.'?type=subscription' ) : '/?type=subscription'}}">
                        <img alt="next_image" src="{{asset('image/next.png')}}">
                    </a>
                    @else
                        <a class="other-product"
                           href="{{ isset($set->prevSet) ? route('set', $set->prevSet->slug)  : '/' }}">
                            <img alt="prev_image" src="{{asset('image/prev.png')}}">
                        </a>
                        <a class="other-product"
                           href="{{isset($set->nextSet) ? route('set', $set->nextSet->slug ) : '/'}}">
                            <img alt="next_image" src="{{asset('image/next.png')}}">
                        </a>
                    @endif
                </div>
                <div class="col-sp-7">
                    <div class="description-set">
                        <h1>{{$set->title}}</h1>
                        <div class="nooverflow">
                            {!! $set->description!!}
                            @if(!$set->sale)
                                <div class="quantity_quickorder" id="sety-calc">
                                    @if($page_type == 'subscription')
                                        <p>Количество месяцев</p>
                                    @else
                                        <p>Количество сетов</p>
                                    @endif
                                    <span id="qminus">
                                        @if($page_type == 'subscription')
                                            <input type="button"
                                                   onclick="update_set_price({{$set->id}}, 'minus', true);">
                                        @else
                                            <input type="button" onclick="update_set_price({{$set->id}}, 'minus');">
                                        @endif
                                        <img alt="minus_image" src="{{asset('image/white_minus.png')}}">
                                    </span>
                                    <input type="text" data-quantity="1" class="qty_quickorder" name="quantity"
                                           id="set_qua" size="2" value="1">
                                    <span id="qplus">
                                        @if($page_type == 'subscription')
                                            <input type="button"
                                                   onclick="update_set_price({{$set->id}}, 'plus', true);">
                                        @else
                                            <input type="button" onclick="update_set_price({{$set->id}}, 'plus');">
                                        @endif
                                    <img alt="plus_image" src="{{asset('image/white_plus.png')}}"></span>
                                </div>
                                <span class="set-price">{{$set->price}} <span>о</span>
                               <div id="skidka">
                                   @if($set->sale)
                                       -{{ $set->sale }}%
                                   @endif
		                        </div>
	                        </span>
                            <div style="float: left; width: 100%;">
                                <button class="add-cart  set-buy-btn btn-danger" style="padding: .75vw 3.5vw;"
                                        onclick="cart_add('{{$set->id}}', 1, 'set');$(this).addClass('active'); $(this).text('В корзине')">
                                    в
                                    корзину
                                </button>
                            </div>
                            @else
                                <span class="sale-set-price">{{$set->price}} <span>о</span>
                                   <div id="skidka">
                                       @if($set->sale)
                                           -{{ $set->sale }}%
                                       @endif
                                   </div>
	                            </span>
                                <button class="add-cart set-buy-btn btn-danger"
                                        onclick="cart_add('{{$set->id}}', 1, 'set');$(this).addClass('active'); $(this).text('В корзине')">
                                    в
                                    корзину
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-instructions">
                Нажмите на бутылку,<br>Чтобы почитать о вине
            </div>
        </div>
        <div id="mobile-price">
          <span class="price" id="calculatingprice">{{$set->price}} <span>о</span>
          <div id="skidka">
          @if($set->sale)
                  -{{ $set->sale }}%
              @endif
          </div>
        	</span>
            <button id="podpisatsa" onclick="cart_add('{{$set->id}}', 1, 'set');$(this).addClass('active'); $(this).text('В корзине');$(this).css({'backgroundColor' : '#261F30'})">
                в
                корзину
            </button>
        </div>
    </div>
    <div id="bottle-container">
        <div id="bottle">
            <div class="close"
                 onclick="$('#bottle-container').removeClass('show'); $('#other-page').removeClass('nooverflow');$('body').removeClass('nooverflow');$('body').addClass('other-page');$('body').attr('style', '');$('#desktop-product').removeClass('nooverflow');">
                <img alt="close_img" src="{{asset('image/closeicon.png')}}"></div>
            <ul class="otherbottles">
                @foreach($set->wines as $wine)
                    <li class="bottle_list" data-bottle="{{$wine->id}}">
                        <img alt="{{$wine->id}}" src="{{Voyager::image($wine->image)}}">
                    </li>
                @endforeach
            </ul>
            @foreach($set->wines as $wine)
                <div class="bottle_info" id="bottle{{$wine->id}}">
                    <div class="col-sp-12">
                        <img src="{{Voyager::image($wine->image)}}" class="main_img">
                        <div class="bottle-image">
                            <div class="attributes proizvoditelwc" style="padding-left: 0 !important; text-align: center;">{{$wine->winery->title}}</div>
                            <div class="attributes colorwc">
                                <img src="{{Voyager::image($wine->color->image)}}">
                                {{$wine->color->title}}
                            </div>
                            <div class="attributes vyderzhkawc">
                                <span>Выдержка</span>
                                <img alt="excerpt_image" src="{{asset('image/vyderjka.png')}}">
                                <p>{{isset($wine->excerpt) ? $wine->excerpt->title : ''}}<br></p>
                            </div>
                            <div class="attributes sort-vinogradawc">
                                <span>Сорт винограда</span>
                                {{$wine->sort->title}}
                            </div>
                            <div class="attributes tirajwc">
                                <span>Тираж</span>
                                {{$wine->edition}} <sup>БУТЫЛОК</sup>
                            </div>
                            <div class="attributes graduswc">
                                <img src="{{asset('image/gradus.png')}}">{{$wine->fortress}}%
                            </div>
                            <div class="attributes volumewc">{{$wine->volume}}</div>
                            <div class="attributes yearwc">{{$wine->year}}</div>
                        </div>
                    </div>
                    <div class="col-sp-12">
                        <h2>{{$wine->title}}</h2>
                        <h2 id="bottle-main-title">{{$wine->title}}</h2>
                        <div class="description-1">
                            <span>Особенности производства</span>
                            {!!  $wine->production_feature!!}
                        </div>
                        <div class="description-2">
                            <span>Дегустационные характеристики</span>
                            {!! $wine->feature!!}
                        </div>
                        <div class="description-3">
                            <span>Гастрономическое сочетание</span>
                            {!! $wine->combination!!}
                        </div>
                        <div class="description-4">
                            <span>Подача</span>
                            {!! $wine->innings!!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @push('scripts')

        <script type="text/javascript"><!--
            function update_set_price(set_id, currency_type, page_type = null) {
                var set_qua = $('#set_qua'),
                    currency_symbol = (currency_type === 'minus') ? -1 : 1,
                    input_val = parseInt(set_qua.val()) + currency_symbol,
                    total = (parseInt({{$set->price}}) * input_val),
                    set_price_class = $('.set-price'),
                    add_cart_class = $('.add-cart');
                if (page_type) {
                    if (input_val > 0 && input_val < 13) {
                        set_qua.val(input_val)
                        set_price_class.html(total + ' <span>о</span>');
                        add_cart_class.attr("onclick", "cart_add('" + set_id + "', '" + input_val + "', 'set'); $(this).addClass('active'); $(this).text('В корзине')");
                        add_cart_class.removeClass('active')
                        add_cart_class.html('В корзину');
                        if(input_val === 12) {
                            var totalPrice = total * 0.8
                            set_price_class.html(totalPrice + ' <span>о</span> <div id="skidka">-20%</div>');
                        }
                    }
                } else {

                    if (input_val > 0) {
                        set_qua.val(input_val)
                        @if($set->sale)
                        set_price_class.html(total + ' <span>о</span> <div id="skidka">-{{$set->sale}}%</div>');
                        @else
                        set_price_class.html(total + ' <span>о</span>');
                        @endif
                        add_cart_class.attr("onclick", "cart_add('" + set_id + "', '" + input_val + "', 'set'); $(this).addClass('active'); $(this).text('В корзине')");
                        add_cart_class.removeClass('active')
                        add_cart_class.html('В корзину');
                    }
                }
            }

            //--></script>
        <script>
            $(".image-set a").click(function () {
                var bottle = $(this).attr('data-bottle');
                $('#bottle-container').addClass('show');
                $('.bottle_info').removeClass('active');
                var activeid = '#bottle' + bottle;
                $(activeid).addClass('active');
                var liactive = $('.otherbottles li[data-bottle=' + bottle + ']');
                $(liactive).addClass('active');
            });
            $(".bottle_list").click(function () {

                var bottle = $(this).attr('data-bottle');
                $('#bottle-container').addClass('show');
                $('.bottle_list').removeClass('active');
                $('.bottle_info').removeClass('active');
                var activeid = '#bottle' + bottle;
                $(activeid).addClass('active');
                var liactive = $('.otherbottles li[data-bottle=' + bottle + ']');
                $(liactive).addClass('active');
            });

        </script>
    @endpush

@endsection
