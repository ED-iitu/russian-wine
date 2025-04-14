<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>@yield('title', Voyager::setting('site.title'))</title>
    <meta name="description" content="@yield('description', Voyager::setting('site.description'))">
    <meta name="keywords" content="@yield('keywords', Voyager::setting('site.keywords'))"/>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Owl carousel  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Swiper.js  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('swiperJs/swiper.min.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors/color1.css') }}" id="colors">
    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css"/>
    <!-- Favicon and touch icons  -->
    <link href="{{asset('icon/favicon.png')}}" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="{{asset('icon/favicon.png')}}" rel="apple-touch-icon-precomposed">
    <link href="{{asset('icon/favicon.png')}}" rel="shortcut icon">
    <!-- Font Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.css') }}">
    <!-- Old style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Custom/old-site.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Custom/custom.css') }}">
    @stack('styles')
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(101038499, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/101038499" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body class="@yield('body_class', '')">
<div id="loading-overlay">
    <div class="loader"></div>
</div>
<!-- /.loading-overlay -->
@include('layouts.header')
@yield('content')
@include('layouts.footer')

{{--<a id="scroll-top"><i class="fa fa-angle-right" aria-hidden="true"></i></a> <!-- /#scroll-top -->--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        countItem();
        cart_table_update();
        $('#search').val('')

});
</script>
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery/jquery-countTo.js') }}"></script>
<script src="{{ asset('js/jquery/jquery-waypoints.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery/jquery.easing.js') }}"></script>
<!-- <script src="{{ asset('swiperJs/swiper.min.js') }}"></script> -->
<script src="https://unpkg.com/swiper@6/swiper-bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/header_cart.js') }}"></script>
@stack('scripts')
<script>
    @php
        $route = Request::route()->getName();
    @endphp
    @if($route == 'home' or $route == 'tastings' or $route == 'sets' )
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll <= 300) {
            $("#head_f").removeClass("darkHeader");
        }
        if (scroll >= 300) {
            $("#head_f").addClass("darkHeader");
        }
    });
    @else
    $('#head_f').addClass("darkHeader")
    @endif
</script>


<script type="text/javascript">
    $('#search').on('keyup', function () {
        if ($(this).val().length >= 2) {
            var value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{URL::to('search')}}',
                data: {'title': value},
                success: function (data) {
                    $('.overlay-results').show();
                    var res = [],
                        wines = data.wines;
                    if (wines.length > 0) {
                        for (var i = 0; i < 3; i++) {
                            var wine_desc = ((wines[i].production_feature.substring(1, 40)).replace('p>', '')).replace('</p>', '')
                            res[i] = "<ul><li><a class='text-danger' href='/wine/" + wines[i].slug + "'><img id='search' src='/storage/" + wines[i].image + "' class='xs-thumb'>" + wines[i].title + ' ' + wine_desc + '...' + "</a></li></ul>"
                        }
                        $("#searchResult").html(res)
                        $(".allResults").attr("href", "{{route('wine_shop')}}?" + data.link)
                        $('.allResults').show();
                    } else {
                        $("#searchResult").html("<div class='col-md-12' style='padding: 1.5rem; font-size: 2.5rem; font-weight: bold;'>По вашему запросу ничего не найдено</div>")
                    }
                }

            });
        }
    })
</script>
<script>
    function login_modal() {
        $('.auth_register_modal').addClass('hide')
        $('#login_modal').removeClass('hide')
    }

    function email_send_success_modal() {
        var token = '{{ csrf_token() }}'
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var email = document.getElementById('restore-email').value

        console.log(email)

        $.ajax({
            url: '{{url("password/email")}}',
            type: "POST",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            data: {_token: token, email: email},
            success: function (response) {
                console.log(response)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

        $('.auth_register_modal').addClass('hide')
        $('#email_modal').removeClass('hide')
    }

    function restore_password_modal() {
        $('.auth_register_modal').addClass('hide')
        $('#restore_password_modal').removeClass('hide')
    }

    function register_modal() {
        $('.auth_register_modal').addClass('hide')
        $('#register_modal').removeClass('hide')
    }

    function close_modal() {
        $('.auth_register_modal').addClass('hide')
    }
</script>


@include('layouts.modal')
@if (session()->get('success') or session()->get('error') or session()->get('warning') or session()->get('info') or session()->get('status') or $errors->any())
    <script>
        (function ($) {
            $(function () {
                $('#messageModal').removeClass('hide');
                setTimeout(function () {
                    $('#messageModal').addClass('hide')
                }, 5000);
            });
        })(jQuery);
    </script>
@endif
@if($route == 'where_to_by' or $route == 'regions' or $route == 'winery' )
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMRFUCD3ip1GgDjklyxp2K_watXsQJopI&callback=initMap&libraries=places&language=ru" async defer></script>
@endif
</body>
</html>
