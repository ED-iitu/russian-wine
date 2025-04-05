<div id="login_modal" class="auth_register_modal hide">
    @if($message = session()->get('failed_password'))
        <script>
            login_modal()
        </script>
    @endif

    @if($message_email = session()->get('email_error'))
        <script>
            login_modal()
        </script>
    @endif
    <div class="container login_container auth_modal">
        <div class="close">
            <p class="closeclick" onclick="close_modal()">
                <img alt="close_icon" src="{{asset('image/closeicon.png')}}">
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <h2>Авторизация</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                                       autofocus>

                                {{--@error('email')--}}
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message_email }}</strong>
                                    </span>
                                {{--@enderror--}}
                            </div>
                            <div class="form-group row">
                                <input id="password" type="password"
                                       class="form-control @error('failed_password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password" placeholder="Пароль">

                                {{--@error('failed_password')--}}
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                {{--@enderror--}}
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row mb-0">
                                    <button type="submit" class="btn btn-danger" id="enter">
                                        Войти
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-7 text-light">
                                <div class="forgotdiv">
                                    @if (Route::has('password.request'))
                                        <a class="forgot" onclick="restore_password_modal()">
                                            Забыли пароль ?
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mt-xs">
                                <a class="regist" onclick="register_modal()">
                                    Зарегистрироваться
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="email_modal" class="auth_register_modal hide">
    <div class="container login_container auth_modal">
        <div class="close">
            <p class="closeclick" onclick="close_modal()">
                <img alt="close_icon" src="{{asset('image/closeicon.png')}}">
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <h2>Проверте ваш Email</h2>
                    </div>
                    <div class="card-body">
                        <h3 style="font-size: 20px; color: white">На ваш email отправлена инструкция по восстановлению пароля. Если вы не получили письмо проверте спам</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="restore_password_modal" class="auth_register_modal hide">
    <div class="container login_container auth_modal">
        <div class="close">
            <p class="closeclick" onclick="close_modal()">
                <img alt="close_icon" src="{{asset('image/closeicon.png')}}">
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <h2>Восстановление пароля</h2>
                    </div>

                    <p style="font-size: 20px; color:white;">Для восстановления пароля введите email привязанный к
                        вашему профилю</p>


                    <div class="card-body">
                            <div class="form-group row">
                                <input id="restore-email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                                       autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0 text-center" style="display: flex; justify-content: center">
                                <button class="btn btn-danger" onclick="email_send_success_modal()">
                                    Далее
                                </button>
                            </div>

                            <div class="col-md-12 mt-xs">
                                <a class="regist" onclick="login_modal()">
                                    Войти
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="register_modal" class="auth_register_modal hide">
    <div class="close">
        <p class="closeclick" onclick="close_modal()">
            <img alt="close_icon" src="{{asset('image/closeicon.png')}}">
        </p>
    </div>
    <div class="container login_container auth_modal">
        <div class="row justify-content-center">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <h2>Регистрация</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="first_name"
                                       required autocomplete="first_name" autofocus placeholder="Имя">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       required autocomplete="email" placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password" placeholder="Придумайте пароль">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password"
                                       placeholder="Повторите пароль">
                            </div>
                            <div class="form-group row mb-0 text-center">
                                <button type="submit" class="btn btn-danger auth">
                                    Зарегистрироваться
                                </button>
                            </div>
                            <div class="form-group row mb-0 mt-xs">
                                <a class="regist" onclick="login_modal()">
                                    У меня уже есть аккаунт
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="messageModal" class="message_modal hide">
    <div class="shadow_close"
         onclick="$('#messageModal').css('display', 'none');$('body').removeClass('nooverflow');"></div>
    <div class="message_body">
        <div class="icon_close"
             onclick="$('#messageModal').css('display', 'none');$('body').removeClass('nooverflow');"></div>
        <h2 class="text-center m-b-50" style="color: black">Сообщение</h2>
        @if (session()->get('success'))
            <h3 class="text-center text-success">{!! session('success') !!}</h3>
        @endif
        @if (session('status'))
            <h3 class="text-center text-success">{!! session('status') !!}</h3>
        @endif
        @if (session()->get('error'))
            <h3 class="text-center text-danger">{!! session('error') !!}</h3>
        @endif
        @if (session()->get('warning'))
            <h3 class="text-center text-danger">{!! session('warning') !!}</h3>
        @endif
        @if (session()->get('info'))
            <h3 class="text-center text-danger">{!! session('info') !!}</h3>
        @endif
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <ul class="questions text-center">
                    <li class="text-danger"><h3>{!! $error !!}</h3></li>
                </ul>
            @endforeach
        @endif
    </div>
</div>
@if(isset($home_tasting))
    <div id="degustacii_modal">
        <div class="shadow_close"
             onclick="$('#degustacii_modal').css('display', 'none');$('body').removeClass('nooverflow');"></div>
        <div class="degustacii_body">
            <div class="icon_close"
                 onclick="$('#degustacii_modal').css('display', 'none');$('body').removeClass('nooverflow');"></div>
            <div>
                <img alt="{{$home_tasting->title}}" class="degdescimg" src="{{Voyager::image($home_tasting->image)}}">
                <span id="deg-title">{{$home_tasting->title}}</span>
            </div>
            <div class="degustacii_description">

                <ul class="list-unstyled" id="deginfo">
                    <li>Дата: {{date('d M', strtotime($home_tasting->start_date))}}</li>
                    <li>Место: {{$home_tasting->place}}</li>
                    <li>Время: {{date('h:i', strtotime($home_tasting->start_date))}}</li>
                </ul>
                <p>
                    {{$home_tasting->description}}
                </p>
                <ul class="list-unstyled" id="bottle">
                    @foreach($home_tasting->wines as $wine)
                        <li>
                            <span>{{$loop->iteration}}</span>
                            {{isset($wine->winery) ? $wine->winery->title : '' }} |
                            {{$wine->title}} | {{$wine->year}} |
                            {{isset($wine->region) ? $wine->region->title : '' }}
                        </li>
                    @endforeach
                </ul>
                <a id="deg_order"
                   onclick="$('.mfp-wrap').css('display', 'block');$('#degustacii_modal').css('display', 'none');">Заказать
                    дегустацию</a>
                <a href="{{route('tastings')}}" id="deg_other">Другие дегустации</a>
            </div>
        </div>
    </div>
    <div id="home-zakaz" class="mfp-wrap mfp-close-btn-in mfp-auto-cursor mfp-ready">
        <div class="mfp-container mfp-ajax-holder mfp-s-ready">
            <div class="shadow_close"
                 onclick="$('.mfp-wrap').css('display', 'none');$('body').removeClass('nooverflow');"></div>
            <div class="mfp-content">
                <div id="popup-quickorder">
                    <div class="popup-heading">{{$home_tasting->title}}</div>
                    <div class="popup-center">
                        <form id="tasting_form" method="post" action={{route('tasting_order')}}>
                            @csrf
                            <div class="col-sm-12 col-sm-12 form-group sections_block_rquaired">
                                <div class="input-group margin-bottom-sm">
                                    <input id="contact-name" class="form-control contact-name" type="text"
                                           placeholder="Имя" value="" name="name" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-sm-12 form-group sections_block_rquaired">
                                <div class="input-group margin-bottom-sm">
                                    <input id="contact-phone" class="form-control contact-phone" type="text"
                                           placeholder="Телефон" value="" name="phone" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-sm-12 form-group sections_block_rquaired">
                                <div class="input-group margin-bottom-sm">
                                    <input id="contact-email" class="form-control contact-email" type="email"
                                           placeholder="E-mail" value="" name="email" required>
                                </div>
                            </div>

                            <div class="col-sm-12 col-sm-12 form-group sections_block_rquaired">
                                <div class="input-group margin-bottom-sm">
                                    <img src="{{ captcha_src() }}" alt="captcha" style="width: 190px; height: 70px;">
                                </div>
                            </div>

                            <div class="col-sm-12 col-sm-12 form-group sections_block_rquaired">
                                <div class="input-group margin-bottom-sm">
                                    <input class="form-control contact-email" type="text"
                                           placeholder="Введите капчу" value="" name="captcha" required>
                                </div>
                            </div>

                            <div class="form-group required">
                                {{-- Обновить капчу без перезагрузки --}}
                                <button class="form-control" type="button" onclick="refreshCaptcha()">Обновить капчу</button>
                            </div>

                            <input type="hidden" value="{{$home_tasting->id}}" name="checkout_id">
                            <input class="btn btn-quickorder-one" type="submit" value="Заказать дегустацию">
                        </form>
                    </div>
                    <div class="popup-footer">
                        <div class="terms">
                            Нажимая кнопку вы даете согласие на обработку персональных данных в соответствии с <a>условиями
                                Пользовательского соглашения</a>.
                        </div>
                    </div>
                    <button title="Close (Esc)" type="button" class="mfp-close"
                            onclick="$('.mfp-wrap').css('display', 'none');$('body').removeClass('nooverflow');">×
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function refreshCaptcha() {
            fetch('/refresh-captcha')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('img[alt=captcha]').src = data.captcha;
                });
        }
    </script>
@endif
<div id="policy" style="display: none">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var policy = document.getElementById('policy');
            var policy2cookie = document.cookie.match(new RegExp('(?:^|; )' +
                'policy_confirm'.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') +
                '=([^;]*)'));
            if (!policy2cookie || policy2cookie[1] != 'Y') {
                var policy_container = document.querySelector('div.policy__container');
                if (policy_container) {
                    $('#policy').show();
                    if (!navigator.cookieEnabled) {
                        policy_container.innerHTML = '<div class="policy__text"><p>' + privacy_text_nocookie + '</p></div>'
                    } else {
                        policy_container.innerHTML = '<div id="is18plus"><div class="is18plus-box"><div class="is18plus-content">' +
                            '<img class="img-responsive" alt="18_pluc_img" src="/image/bg/18plus_bg.jpg" /><div>' +
                            '<div class="circle">18+</div><p>Для доступа необходимо подтвердить совершеннолетний возраст. </p>' +
                            '<a class="policy__confirm confirm btn-white" href="javascript:void(0)">Мне исполнилось 18 лет</a>' +
                            '</div></div></div></div>';
                    }
                    setTimeout(function () {
                        policy.appendChild(policy_container);
                        policy.classList.add('active');
                        setTimeout(function () {
                            policy.classList.add('activated')
                        }, 300);
                        var policy_confirm = document.querySelector('.policy__confirm');
                        if (policy_confirm) {
                            policy_confirm.addEventListener('click', function () {
                                policy.classList.remove('activated');
                                setTimeout(function () {
                                    policy.remove()
                                }, 300);
                                document.cookie = 'policy_confirm=Y; path=/'
                            })
                        }
                    }, 100)
                }
            } else {
                policy.remove()
            }
        })
    </script>
    <div class="policy__container">
        <div id="is18plus">
            <div class="is18plus-box">
                <div class="is18plus-content">
                    <img alt="18_pluc_img" class="img-responsive" src="{{asset('image/bg/18plus_bg.jpg')}}">
                    <div>
                        <div class="circle">18+</div>
                        <p>Для доступа необходимо подтвердить совершеннолетний возраст. </p>
                        <a class="policy__confirm confirm btn-white" href="javascript:void(0)">
                            Мне исполнилось 18 лет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

