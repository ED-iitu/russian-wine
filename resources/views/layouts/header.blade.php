<header id="head_f"
        class="home_header">
    <div class="container container-lg">
        <div class="row">
            <div class="col-sm-2">
                <div id="logo">
                    <a href="{{route('home')}}">
                        <img src="{{ Voyager::image(setting('site.logo'))}}" id="white-logo"
                             title="{{Voyager::setting('site.title')}}"
                             alt="{{Voyager::setting('site.title')}}" class="img-responsive">
                        <img src="{{asset('image/logo/logo-black.png')}}" id="black-logo"
                             title="{{Voyager::setting('site.title')}}"
                             alt="{{Voyager::setting('site.title')}}" class="img-responsive" style="display: none">
                    </a>
                </div>
            </div>
            <div class="col-sm-1">
                <a target="_blank" href="https://www.youtube.com/channel/UCN-RcIaaNGUmZBYg9HJtoKg">
                    <img alt="youtube-icon" src="{{ asset ('image/youtube.png') }}">
                </a>
                <a target="_blank" href="https://instagram.com/russianvine.ru?igshid=1kot521x7b8l">
                    <img alt="instagram-icon" src="{{ asset ('image/instagram.png') }}">
                </a>
            </div>
            <div class="col-sm-8">
                <!---->
                <nav id="menu" class="navbar navbar-right" style="pointer-events:all">
                    <div class="navbar-header">
                        <button type="button" class="btn btn-navbar navbar-toggle"
                                onclick="$('body').addClass('nooverflow'); $('.desktopHidden').hide()" data-toggle="collapse"
                                data-target=".navbar-ex1-collapse">
                            <div></div>
                            <div></div>
                            <div></div>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <button type="button" class="btn btn-navbar navbar-toggle"
                                onclick="$('body').removeClass('nooverflow'); $('.desktopHidden').show()" data-toggle="collapse"
                                data-target=".navbar-ex1-collapse">
                            <div></div>
                            <div></div>
                        </button>
                        <ul class="nav navbar-nav">
                            <li><a class="{{(\Request::route()->getName() == 'wine-shop') ? 'active_link' : ''}}"
                                   href="{{route('wine_shop')}}">{{trans('header.wine')}}</a>
                            </li>
                            <li><a class="{{(\Request::route()->getName() == 'sets') ? 'active_link' : ''}}"
                                   href="{{route('sets')}}">{{trans('header.sets')}}</a></li>
                            <li><a class="{{(\Request::route()->getName() == 'subscription') ? 'active_link' : ''}}"
                                   href="{{route('subscription')}}">{{trans('header.subscription')}}</a></li>
                            <li><a class="{{(\Request::route()->getName() == 'personal-wine') ? 'active_link' : ''}}"
                                   href="{{route('personal-wine')}}">{{trans('header.personal-wine')}}</a></li>
                            <li><a class="{{(\Request::route()->getName() == 'tastings') ? 'active_link' : ''}}"
                                   href="{{route('tastings')}}">{{trans('header.testing')}}</a></li>
                            <li><a class="{{(\Request::route()->getName() == 'franchise') ? 'active_link' : ''}}"
                                   href="{{route('franchise')}}">{{trans('header.franchise')}}</a></li>
                            <li class="newdrop"><a href="" class="dropdown-toggle" data-toggle="dropdown">Информация</a>
                                <div class="dropdown-menu-custom">
                                    <div class="dropdown-inner">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{route('regions')}}">{{trans('header.regions')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('wineries')}}">{{trans('header.wineries')}}</a>
                                            </li>
                                            <li><a href="{{route('micro_winery')}}">{{trans('header.micro_winery')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('winemakers')}}">{{trans('header.winemakers')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('where_to_by')}}">{{trans('header.where_to_by')}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-2 col-sm-2">
                <div id="navSearch">
                    <a onclick="$('#myOverlay').addClass('open', 1000);  $('#searchResult').show();
                    $('#white-logo').hide(); $('.overlay-results').hide();  $('#black-logo').show()" id="searchStart">
                        <img alt="search icon" src="{{ asset ('image/search.svg') }}">
                    </a>
                </div>
{{--                Hide auth--}}
{{--                <div id="login">--}}
{{--                    @if(Auth::guard('client')->check())--}}
{{--                        <a href="{{route('profile-favorite')}}">--}}
{{--                            <img alt="login icon" src="{{ asset ('image/login.svg') }}">--}}
{{--                        </a>--}}
{{--                    @else--}}
{{--                        <a onclick="login_modal()">--}}
{{--                            <img alt="login icon" src="{{ asset ('image/login.svg') }}">--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
                <div id="cart">
                    <a onclick="$('#cart-cont').addClass('open');$('body').addClass('nooverflow1');$('body').addClass('nooverflow');">
                        <img alt="cart icon" src="{{ asset ('image/cart.png') }}">
                        <b id="cartCount"></b>
                    </a>
                </div>
                <div id="cart-cont">
                    <div>
                        <button id="close-cart"
                                onclick="$('#cart-cont').removeClass('open');$('body').removeClass('nooverflow1');
                                $('body').removeClass('nooverflow');"></button>
                        <div id="close-mask" class="empty_cart_block empty-cart"></div>
                        <div id="cart-cart" class="empty_cart_block empty-cart">
                            <div class="newcart" id="for_the_scroll">
                                <div id="newcart">
                                    <div class="cart-content">
                                        <div class="empty_cart" id="empty_cart"
                                             style="display: none">
                                            <h2 style="color:black">
                                                Ваша корзина ещё пуста
                                            </h2>
                                            <img alt="cart-icon" src="{{ asset ('image/empty.jpg') }}">
                                            <button onclick="window.location.href=' {{route('wine_shop')}} ';">
                                                Выбрать вино
                                            </button>
                                        </div>
                                    </div>
                                    <div class="not_empty_cart"
                                         style="display: block">
                                        <div class="cart-cart">
                                            <h3>Корзина</h3>
                                            <div class="cart-block" id="simplecheckout_cart">
                                                <div class="table-responsive" id="for-cart">
                                                    <table class="ul-cart" id="cart_table">
                                                        <colgroup>
                                                            <col class="image">
                                                            <!-- <col class="name">
                                                            <col class="quantity">
                                                            <col class="total">
                                                            <col class="remove"> -->
                                                        </colgroup>
                                                        <tbody id="product_buy">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="itog">
                                                    <div class="row">
                                                        <div class="col-md-4 first_cl">
                                                            <span>Позиций (<span id="count-prods"></span>) </span>
                                                            <div class=" simplecheckout-cart-total"
                                                                 id="total_sub_total">
                                                                    <span class="simplecheckout-cart-total-value">Итого <span
                                                                            id="total_price"></span> р. </span>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 second_cl">
                                                            <a id="oformlenie" class="btn-danger btn-in-cart"
                                                               href="{{route('checkout')}}">Оформить заявку</a>
                                                        </div>
                                                        <div class="col-md-4 third_cl">
                                                            <p style="font-family: ProximaNova-reg; font-size: 1vw;">Пожалуйста
                                                                <a href="{{route('wine_shop')}}"
                                                                   style="color: #23252b;text-decoration:underline;"
                                                                   id="link_wine">добавьте</a>
                                                                товары в корзину
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myOverlay" class="overlay">
        <a class="closebtn"
           onclick=" $('.allResults').hide(); $('#searchResult').hide(); $('#search').val('');
           $('#myOverlay').removeClass('open'); $('#black-logo').hide(); $('#white-logo').show();"
           title="Close Overlay">
            <img alt="close_icon" src="{{ asset ('image/plus.png') }}" style="transform: rotateZ(45deg); ">
        </a>
        <div class="overlay-content">
            <div class="overlay-form">
                <img alt="search icon" src="{{ asset ('image/search.svg') }}" id="searchInputIcon">
                <input type="text" placeholder="Поиск..." name="search" id="search" style="font-family: Proxima Nova;">
            </div>
        </div>
        <div class="overlay-results">
            <div id="searchResult">
            </div>
            <a href="{{route('wine_shop')}}" class="allResults" style="display: none; padding: 0.85vw 2.25vw">Показать все результаты</a>
        </div>
    </div>
</header>

