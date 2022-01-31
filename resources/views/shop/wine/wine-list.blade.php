<div class="shopSearch col-md-9">
    <div class="row featured_cont">
        @foreach($wines as $wine)
            <div class="col-md-4 col-xs-6">
                <div class="swiper-slide">
                    <div class="wine">
                        <div class="image">
{{--                            <p onclick="add_delete_favorite({{$wine->id}}, 'delete')" class="likeSlider unlike-{{$wine->id}}" id="{{$wine->id}}"--}}
{{--                               style="display: {{in_array($wine->id, $favorite) ? '' : 'none'}}">--}}
{{--                                <img src="{{ asset ('image/un_like.svg') }}" alt="unlike for this wine" loading="lazy">--}}
{{--                            </p>--}}
{{--                            <p onclick="add_delete_favorite({{$wine->id}}, 'add')" class="likeSlider like-{{$wine->id}}" id="{{$wine->id}}"--}}
{{--                               style="display: {{in_array($wine->id, $favorite) ? 'none' : ''}}">--}}
{{--                                <img src="{{ asset ('image/like.svg') }}" alt="like for this wine" loading="lazy">--}}
{{--                            </p>--}}
                            <a href="{{route('wine-bread', $wine->slug)}}" class="preview">
                                <img alt="{{$wine->title}}" src="{{ Voyager::image($wine->image) }}" loading="lazy">
                                <span class="attributes"></span>
                            </a>
                        </div>
                        <h2><a href="{{route('wine-bread', $wine->slug)}}" class="preview">{{$wine->title}}</a>
                        </h2>
                        <p>{{isset($wine->winery) ? $wine->winery->title : ''}}</p>
                        <div class="meta">
                                        <span
                                            class="color">{{isset($wine->color) ? $wine->color->title : ''}}</span><span
                                class="sep"> | </span>
                            <span class="hardness">{{isset($wine->sugar) ? $wine->sugar->title : ''}}</span><span
                                class="sep"> | </span>
                            <span class="year"> {{$wine->year}}</span>
                            <div class="price-vinoteka">

                                <a href="{{route('wine-bread', $wine->slug)}}" class="preview">
                                    @if($wine->price > 0)
                                    {{$wine->price}}
                                    <span>п</span>
                                    @else
                                        Коллекция
                                    @endif

                                </a>


                            </div>
                            <div class="button_cont">
                                <div class="prod_quantity">
                                    <span class="qua_mins" onclick="update_count({{$wine->id}}, 'minus')"></span>
                                    <input type="number" class="quantity" id="wine-{{$wine->id}}"
                                           value="1">
                                    <span class="qua_plus" onclick="update_count({{$wine->id}}, 'plus')"></span>
                                </div>
                                <button id="button-carts" class="cart-btn-{{$wine->id}}"
                                        onclick="cart_add('{{$wine->id}}', 1, 'wine');$(this).addClass('active')">
                                    <span>В корзину</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if(count($wines) == 0)
            <div class="text-center">
                <h2>По вашему фильтру ничего не найдено</h2>
            </div>
        @endif
        <div class="col-md-12 col-xs-12 mt-lg text-center" onclick="return scroll_up();">
            {{$wines->appends(request()->input())->links()}}
        </div>
        @push('scripts')

            <script>
                $(".page-link").on("click", function () {
                    scroll_up()
                })
                function scroll_up() {
                    $('html, body').animate({scrollTop: 0}, 2000);
                }
            </script>
        @endpush
    </div>
</div>
