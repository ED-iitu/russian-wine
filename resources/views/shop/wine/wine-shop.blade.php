@extends('layouts.app')
@section('content')
    <div class="shopContent">
        <div class="row subHeader">
            <ul class="breadcrumb" id="breadcrumb">
                <li><a href="{{route('home')}}">Главная</a></li>
                <li><a href="{{route('wine_shop')}}">Вино</a></li>
                @if(isset($bread_crumbs))
                    @foreach($bread_crumbs as $bread_crumb)
                        <li>
                            <a href="{{route('wine_shop')}}?{{$bread_crumb['type']}}={{$bread_crumb['id']}}">{{$bread_crumb['title']}}</a>
                        </li>
                    @endforeach
                @else
                    <li id="search_title" style="display: none"></li>
                @endif

            </ul>
            <h1 class="pageHeading">Вино</h1>
            <p class="pageDesc">Мы собрали для Вас самую полную коллекцию Русских Вин, как крупных заводов, <br>
                так авторских микровиноделен.</p>
        </div>
        <div class="row sortSearch">
            <div class="col-xs-6">
                <a class="mobileFilters visible-xs"
                   onclick="$('#filtMobi').addClass('open');$('.shopContent').addClass('hideMe');">
                    <img src="{{ asset ('image/filters.svg') }}" alt="" class="search-icon filtersIconsMobile">
                    <span class="mobileFiltersText">Фильтр</span>
                </a>
            </div>
            <div class="col-xs-6">
                <a class="mobileSorting visible-xs"
                   onclick="$('#sortMobi').addClass('open'); $('.shopContent').addClass('hideMe'); ">
                    <img src="{{ asset ('image/searchSort.svg') }}" alt="" class="search-icon sortingIconsMobile">
                    <span class="mobileFiltersText">Сортировать</span>
                </a>
                <!-- sorting windows in bottom -->
            </div>
            <div class="shopSearch col-md-3">
                <form id="searching-form" method="get">
                    <input id="search-main" type="text" name="title" placeholder="Поиск по каталогу"
                           value="{{array_key_exists('title', $filters) ? $filters['title'] : ''}}">
                    <img src="{{ asset ('image/searchSort.svg') }}" alt="" class="search-icon searchIconBlack">
                </form>
            </div>
            <div class="sorting col-md-3 mobileHidden">
                <select id="inputState" name="price_sort" class="form-control custom-select sources"
                        form="searching-form"
                        @if(array_key_exists('price_sort', $filters))
                        placeholder="{{$filters['price_sort'] == 'asc' ? 'сначала дешевле' : ' сначала дороже'}}">
                    @else
                        placeholder="по умолчанию">
                    @endif
                    @if(array_key_exists('price_sort', $filters))
                        <option value="default" {{$filters['price_sort'] == 'default' ? 'selected' : ''}}>
                                по умолчанию
                        </option>
                        <option value="asc" {{$filters['price_sort'] == 'asc' ? 'selected' : ''}}>
                            сначала дешевле
                        </option>
                        <option value="desc" {{$filters['price_sort'] == 'desc' ? 'selected' : ''}}>
                            сначала дороже
                        </option>
                    @else
                        <option value="default">по умолчанию</option>
                        <option value="asc">сначала дешевле</option>
                        <option value="desc">сначала дороже</option>
                    @endif
                </select>
                <span class="sortingTitle mobileHidden">Сортировать</span>
                <img src="{{ asset ('image/chevron.svg') }}" alt="" class="iconSort">
            </div>
        </div>
        <div class="row sortSearch">
            <div class="shopSearch filtersMain  col-md-3">
                <!--     fav filters (four bold filters)      -->
                @foreach($classes as $class)
                    <div class="form-check">
                        <input class="form-check-input" form="searching-form" name="wine_class[]" type="checkbox"
                               value="{{$class->id}}" id="classSort{{$class->id}}"
                               @if(array_key_exists('wine_class', $filters) and in_array($class->id, $filters['wine_class']))
                               checked
                            @endif
                        >
                        <label class="form-check-label" for="classSort{{$class->id}}">
                            <b>{{$class->title}}</b>
                        </label>
                        <!-- tooltip -->
                        <img class="tippyTooltip" data-template="tooltip-{{$class->id}}"
                             src="{{ asset ('image/tooltip.svg') }}" alt="">
                        <!--end tooltip -->
                        <!-- template for tooltip  -->
                        <div style="display: none;">
                            <div id="tooltip-{{$class->id}}">
                                <h4>{{$class->title}}</h4>
                                <p>{{$class->description}}</p>
                            </div>
                        </div>
                        <!-- end template for tooltip  -->
                    </div>
                @endforeach
            <!--     fav filters end                      -->

                <!--     wine color filters                   -->
                <h4 class="filterHeading">Цвет</h4>

                @foreach($colors as $color)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" form="searching-form" value="{{$color->id}}"
                               name="color[]" id="wineColor{{$color->id}}"
                               @if(array_key_exists('color', $filters) and in_array($color->id, $filters['color']))
                               checked
                            @endif>
                        <label class="form-check-label" for="wineColor{{$color->id}}">
                            {{$color->title}}
                        </label>
                    </div>
                @endforeach
                <h4 class="filterHeading">Цена</h4>
                <div class="form-check">
                    <input class="form-check-input" form="searching-form" name="price[]" type="checkbox" value="0-1000"
                           id="winePrice1"
                           @if(array_key_exists('price', $filters) and in_array('0-1000', $filters['price']))
                           checked
                        @endif>
                    <label class="form-check-label" for="winePrice1">
                        До 1000
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" form="searching-form" name="price[]" type="checkbox"
                           value="1000-1500" id="winePrice2"
                           @if(array_key_exists('price', $filters) and in_array('1000-1500', $filters['price']))
                           checked
                        @endif>
                    <label class="form-check-label" for="winePrice2">
                        1000 - 1500
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" form="searching-form" name="price[]" type="checkbox"
                           value="1500-3000" id="winePrice3"
                           @if(array_key_exists('price', $filters) and in_array('1500-3000', $filters['price']))
                           checked
                        @endif>
                    <label class="form-check-label" for="winePrice3">
                        1500 - 3000
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" form="searching-form" name="price[]" type="checkbox"
                           value="3000-5000" id="winePrice4"
                           @if(array_key_exists('price', $filters) and in_array('3000-5000', $filters['price']))
                           checked
                        @endif>
                    <label class="form-check-label" for="winePrice4">
                        3000 - 5000
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" form="searching-form" name="price[]" type="checkbox"
                           value="5000-10000" id="winePrice5"
                           @if(array_key_exists('price', $filters) and in_array('5000-10000', $filters['price']))
                           checked
                        @endif>
                    <label class="form-check-label" for="winePrice5">
                        5000 - 10000
                    </label>
                </div>
                <!--   collapse other prices   -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div id="collapse-price" class="panel-collapse collapse">
                            <!--  Collapse inner space   -->
                            <div class="form-check">
                                <input class="form-check-input" form="searching-form" name="price[]" type="checkbox"
                                       value="10000-15000" id="winePrice6"
                                       @if(array_key_exists('price', $filters) and in_array('10000-15000', $filters['price']))
                                       checked
                                    @endif>
                                <label class="form-check-label" for="winePrice6">
                                    10000 - 15000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" form="searching-form" name="price[]" type="checkbox"
                                       value="15000-30000" id="winePrice7"
                                       @if(array_key_exists('price', $filters) and in_array('15000-30000', $filters['price']))
                                       checked
                                    @endif>
                                <label class="form-check-label" for="winePrice7">
                                    15000 - 30000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" form="searching-form" name="price[]" type="checkbox"
                                       value="30000-50000" id="winePrice8"
                                       @if(array_key_exists('price', $filters) and in_array('30000-50000', $filters['price']))
                                       checked
                                    @endif>
                                <label class="form-check-label" for="winePrice8">
                                    30000 - 50000
                                </label>
                            </div>
                            <!--  Collapse inner space end -->
                        </div>
                        <button class="collapseBtn" id="btnCollapse-price" name="button" data-toggle="collapse"
                                data-target="#collapse-price"
                                aria-expanded="false" onclick="collapse_click('price')" aria-controls="collapse-price"
                                type="button">
                            <span>Посмотреть все</span>
                            <img src="{{ asset ('image/arrow-down.svg') }}" alt="" class="collapseIcon">
                        </button>
                    </div>
                </div>
                <!--     wine price filters end               -->

                <!--     wine type filters                   -->
                <h4 class="filterHeading">Тип Вина</h4>
                @foreach($sugars as $sugar)
                    <div class="form-check">
                        <input class="form-check-input" form="searching-form" name="sugar[]" type="checkbox"
                               value="{{$sugar->id}}" id="wineType{{$sugar->id}}"
                               @if(array_key_exists('sugar', $filters) and in_array($sugar->id, $filters['sugar']))
                               checked
                            @endif>
                        <label class="form-check-label" for="wineType{{$sugar->id}}">
                            {{$sugar->title}}
                        </label>
                    </div>
                    @break($loop->index == 5)
                @endforeach
            <!--   collapse other prices   -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div id="collapse-sugar" class="panel-collapse collapse">
                            <!--  Collapse inner space   -->
                            @foreach($sugars as $sugar)
                                @if($loop->index > 5)
                                    <div class="form-check">
                                        <input class="form-check-input" name="sugar[]" form="searching-form"
                                               type="checkbox" value="{{$sugar->id}}" id="wineType{{$sugar->id}}"
                                               @if(array_key_exists('sugar', $filters) and in_array($sugar->id, $filters['sugar']))
                                               checked
                                            @endif>
                                        <label class="form-check-label" for="wineType{{$sugar->id}}">
                                            {{$sugar->title}}
                                        </label>
                                    </div>
                            @endif
                        @endforeach
                        <!--  Collapse inner space end -->
                        </div>
                        <button class="collapseBtn" id="btnCollapse-sugar" onclick="collapse_click('sugar')"
                                name="button" data-toggle="collapse"
                                data-target="#collapse-sugar" aria-expanded="false"
                                aria-controls="collapse-sugar" type="button">
                            <span>Посмотреть все</span>
                            <img src="{{ asset ('image/arrow-down.svg') }}" alt="" class="collapseIcon">
                        </button>
                    </div>
                </div>
                <!--     wine type filters end               -->


                <!--     wine regions filters                   -->
                <h4 class="filterHeading">Регион</h4>
                @foreach($regions as $region)
                    <div class="form-check">
                        <input class="form-check-input" form="searching-form" type="checkbox" value="{{$region->id}}"
                               name="region[]" id="wineRegion{{$region->id}}"
                               @if(array_key_exists('region', $filters) and in_array($region->id, $filters['region']))
                               checked
                            @endif>
                        <label class="form-check-label" for="wineRegion{{$region->id}}">
                            {{$region->title}}
                        </label>
                    </div>
                @endforeach
            <!--     wine regions filters end               -->

                <!--     wine winemaker filters                   -->
                <h4 class="filterHeading">Винодельня</h4>
                <!--  filter live search  -->
                <div id="liveSearch-form">
                    <input id="search-main-winery" onkeyup="search('winery')" type="text" placeholder="Поиск...">
                    <a type="submit" id="sfb" class="preview">
                        <img src="{{ asset ('image/searchSort.svg') }}" alt="" class="liveSearchIcon">
                    </a>
                </div>
                <!--  filter live search end -->

                @foreach($wineries as $winery)
                    <div class="form-check" id="form-winery-{{$winery->id}}">
                        <input class="form-check-input" form="searching-form" type="checkbox" value="{{$winery->id}}"
                               name="winery[]" id="shop-winery-{{$winery->id}}"
                               @if(array_key_exists('winery', $filters) and in_array($winery->id, $filters['winery']))
                               checked
                            @endif>
                        <label class="form-check-label" for="shop-winery-{{$winery->id}}">
                            {{$winery->title}}
                        </label>
                    </div>
                @break($loop->index == 5)
            @endforeach
            <!--   collapse other prices   -->
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div id="collapse-winery" class="panel-collapse collapse">
                            <!--  Collapse inner space   -->
                            @foreach($wineries as $winery)
                                @if($loop->index > 5)
                                    <div class="form-check" id="form-winery-{{$winery->id}}">
                                        <input class="form-check-input" form="searching-form" type="checkbox"
                                               value="{{$winery->id}}" id="shop-winery{{$winery->id}}"
                                               name="winery[]"
                                               @if(array_key_exists('winery', $filters) and in_array($winery->id, $filters['winery']))
                                               checked
                                            @endif>
                                        <label class="form-check-label" for="shop-winery{{$winery->id}}">
                                            {{$winery->title}}
                                        </label>
                                    </div>
                            @endif
                        @endforeach
                        <!--  Collapse inner space end -->
                        </div>
                        <button class="collapseBtn" id="btnCollapse-winery" name="button" data-toggle="collapse"
                                data-target="#collapse-winery" onclick="collapse_click('winery')" aria-expanded="false"
                                aria-controls="collapse-winery" type="button">
                            <span>Посмотреть все</span>
                            <img src="{{ asset ('image/arrow-down.svg') }}" alt="" class="collapseIcon">
                        </button>
                    </div>
                </div>
                <!--     wine winemaker filters end               -->

                <!--     grape family filter                     -->
                <form name="filter_form" method="get" class="filtersMain">
                    <h4 class="filterHeading">Сорт винограда</h4>
                    <!--  filter live search  -->
                    <div id="liveSearch-form">
                        <input id="search-main-sort" onkeyup="search('sort')" type="text" placeholder="Поиск...">
                        <a type="submit" id="sfb" class="preview">
                            <img src="{{ asset ('image/searchSort.svg') }}" alt="" class="liveSearchIcon">
                        </a>
                    </div>
                    <!--  filter live search end -->
                    @foreach($sorts as $sort)
                        <div class="form-check" id="form-sort-{{$sort->id}}">
                            <input class="form-check-input" type="checkbox" form="searching-form" value="{{$sort->id}}"
                                   name="sort[]" id="shop-sort{{$sort->id}}"
                                   @if(array_key_exists('sort', $filters) and in_array($sort->id, $filters['sort']))
                                   checked
                                @endif>
                            <label class="form-check-label" for="shop-sort{{$sort->id}}">
                                {{$sort->title}}
                            </label>
                        </div>
                    @break($loop->index == 5)
                @endforeach
                <!--   collapse other prices   -->
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div id="collapse-sort" class="panel-collapse collapse">
                                <!--  Collapse inner space   -->
                                @foreach($sorts as $sort)
                                    @if($loop->index > 5)
                                        <div class="form-check" id="form-sort-{{$sort->id}}">
                                            <input class="form-check-input" form="searching-form" type="checkbox"
                                                   name="sort[]" value="{{$sort->id}}" id="shop-sort{{$sort->id}}"
                                                   @if(array_key_exists('sort', $filters) and in_array($sort->id, $filters['sort']))
                                                   checked
                                                @endif>
                                            <label class="form-check-label" for="shop-sort{{$sort->id}}">
                                                {{$sort->title}}
                                            </label>
                                        </div>
                                @endif
                            @endforeach
                            <!--  Collapse inner space end -->
                            </div>
                            <button class="collapseBtn" id="btnCollapse-sort" name="button" data-toggle="collapse"
                                    data-target="#collapse-sort" onclick="collapse_click('sort')" aria-expanded="false"
                                    aria-controls="collapse-sort" type="button">
                                <span>Посмотреть все</span>
                                <img src="{{ asset ('image/arrow-down.svg') }}" alt="" class="collapseIcon">
                            </button>
                        </div>
                    </div>
                </form>

                <!--     grape family filter end                 -->

                <!--     wine year filters                        -->
                <form name="filter_form" method="get" class="filtersMain">
                    <h4 class="filterHeading">Год</h4>
                    @foreach($years as $year)
                        <div class="form-check">
                            <input class="form-check-input" form="searching-form" name="year[]" type="checkbox"
                                   value="{{$year->year}}" id="shopWineAge{{$loop->iteration}}"
                                   @if(array_key_exists('year', $filters) and in_array($year->year, $filters['year']))
                                   checked
                                @endif>
                            <label class="form-check-label" for="shopWineAge{{$loop->iteration}}">
                                {{$year->year}}
                            </label>
                        </div>
                    @break($loop->index == 5)
                @endforeach
                <!--   collapse other prices   -->
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div id="collapse-year" class="panel-collapse collapse">
                                <!--  Collapse inner space   -->
                                @foreach($years as $year)
                                    @if($loop->index > 5)
                                        <div class="form-check">
                                            <input class="form-check-input" form="searching-form" name="year[]"
                                                   type="checkbox" value="{{$year->year}}"
                                                   id="shopWineAge{{$loop->iteration}}"
                                                   @if(array_key_exists('year', $filters) and in_array($year->year, $filters['year']))
                                                   checked
                                                @endif>
                                            <label class="form-check-label" for="shopWineAge{{$loop->iteration}}">
                                                {{$year->year}}
                                            </label>
                                        </div>
                                @endif
                            @endforeach
                            <!--  Collapse inner space end -->
                            </div>
                            <button class="collapseBtn" id="btnCollapse-year" onclick="collapse_click('year')"
                                    name="button" data-toggle="collapse"
                                    data-target="#collapse-year" aria-expanded="false"
                                    aria-controls="collapse-year" type="button">
                                <span>Посмотреть все</span>
                                <img src="{{ asset ('image/arrow-down.svg') }}" alt="" class="collapseIcon">
                            </button>
                        </div>
                    </div>
                </form>
                <!--     wine grad filters end                    -->

                <!--     wine grad filters                        -->
                <form name="filter_form" method="get" class="filtersMain">
                    <h4 class="filterHeading">Крепость</h4>
                    @foreach($fortresses as $fortress)
                        <div class="form-check">
                            <input class="form-check-input" form="searching-form" name="fortress[]" type="checkbox"
                                   value="{{$fortress->fortress}}" id="shopGrad{{$loop->iteration}}"
                                   @if(array_key_exists('fortress', $filters) and in_array($fortress->fortress, $filters['fortress']))
                                   checked
                                @endif>
                            <label class="form-check-label" for="shopGrad{{$loop->iteration}}">
                                {{$fortress->fortress}}%
                            </label>
                        </div>
                    @break($loop->index == 5)
                @endforeach
                <!--   collapse other prices   -->
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div id="collapse-fortress" class="panel-collapse collapse">
                                <!--  Collapse inner space   -->
                                @foreach($fortresses as $fortress)
                                    @if($loop->index > 5)
                                        <div class="form-check">
                                            <input class="form-check-input" form="searching-form" name="fortress[]"
                                                   type="checkbox" value="{{$fortress->fortress}}"
                                                   id="shopGrad{{$loop->iteration}}"
                                                   @if(array_key_exists('fortress', $filters) and in_array($fortress->fortress, $filters['fortress']))
                                                   checked
                                                @endif>
                                            <label class="form-check-label" for="shopGrad{{$loop->iteration}}">
                                                {{$fortress->fortress}}%
                                            </label>
                                        </div>
                                @endif
                            @endforeach
                            <!--  Collapse inner space end -->
                            </div>
                            <button class="collapseBtn" id="btnCollapse-fortress" onclick="collapse_click('fortress')"
                                    name="button" data-toggle="collapse"
                                    data-target="#collapse-fortress" aria-expanded="false"
                                    aria-controls="collapse-fortress" type="button">
                                <span>Посмотреть все</span>
                                <img src="{{ asset ('image/arrow-down.svg') }}" alt="" class="collapseIcon">
                            </button>
                        </div>
                        <button class="btn-danger" type="button" style="margin-top: 20px" onclick="clear_filter()">Очистить</button>
                    </div>
                </form>
            </div>
            <!--     wine grad filters end                    -->
            <!--   shop content -->
            <div id="wine_list_block">
                @include('shop.wine.wine-list')
            </div>
        </div>
    </div>
            @include('shop.wine.mobile-filter')
    @push('scripts')
        <script src="{{ asset('js/wine-shop-filter.js')}}"></script>
        <script src="{{ asset('js/favorite.js') }}"></script>
    @endpush
@endsection
