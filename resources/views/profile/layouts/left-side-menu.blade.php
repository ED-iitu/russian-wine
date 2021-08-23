<style>
    @media only screen and (max-width: 600px) {
        .leftMenu {
            display: flex;
            /*s*/
        }
        .userData {
           margin-top: -20px !important;
        }

        .full-height {
            max-height: 340px;
            /*height: calc(100vh - 5%)*/
        }
        .userData h2 {
            padding-top: 30px;
        }

        #left-side-block .userData {
            margin: 5%;
        }
        .counterRight {
            margin-left: 25%;
        }

    }
</style>

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/left-side.css') }}">
@endpush
<div class="col-md-4 background-dark-purple full-height" id="left-side-block">
    <div class="userData">
        <h2 class="text-white">{{Auth::user()->last_name}} {{Auth::user()->first_name}}</h2>
        {{--<h3 class="heading">Скидка</h3>--}}
        {{--<p class="discount">5%</p>--}}
        <div class="row leftMenu">
            <div class="col-md-8 col-sm-8">
                <ul class="menu_list">
                    <li><a class="{{(\Request::route()->getName() == 'profile-favorite') ? 'active' : ''}}"
                           href="{{route('profile-favorite')}}">Избранное</a></li>
                    <li><a class="{{(\Request::route()->getName() == 'profile-subscription') ? 'active' : ''}}"
                           href="{{route('profile-subscription')}}">Подписки</a></li>
                    <li><a class="{{(\Request::route()->getName() == 'profile-sets') ? 'active' : ''}}"
                           href="{{route('profile-sets')}}">Сеты</a></li>
                    <li><a class="{{(\Request::route()->getName() == 'profile-orders') ? 'active' : ''}}"
                           href="{{route('profile-orders')}}">Мои заказы</a></li>
                </ul>
                <ul class="additional">
                    {{--<li><a href="">Спецпредложения</a></li>--}}
                    <li><a class="{{(\Request::route()->getName() == 'profile') ? 'active' : ''}}"
                           href="{{route('profile')}}">Персональные данные</a></li>
                </ul>
                <div class="logout">
                    <form id="frm-logout" action="{{ route('logout') }}" method="post">
                        <button type="submit" class="btn-link">
                            Выйти
                        </button>
                        @csrf
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 counterRight">
                <ul class="count-list text-right">
                    <li id="favorite_count">{{$favorite_count}}</li>
                    <li>{{$subscription_count}}</li>
                    <li>{{$set_count}}</li>
                    <li>{{$order_count}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
