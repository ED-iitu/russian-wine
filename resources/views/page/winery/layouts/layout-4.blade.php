<!-- ABOUT -->
@foreach($winery->images as $block)
    @if ($block->numbering == 1 and $block->type_id == 0)
        <div class="about_person">
            <div class="container">
                <div class="flex_elem row">
                    <div class="col-md-8 col-xs-12 row-no-padding text_img">
                        <img alt='image' src="{{Voyager::image($block->image)}}" class="person_img" style="width: 100%;">
                        {!!$block->addition!!}
                    </div>
                    <div class="col-md-4 col-xs-12 person_text">
                        {!!$block->description!!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
<div class="about_person_below">
    <div class="container-fluid">
        <div class="col-md-6 col-xs-12">
            @foreach($winery->images as $block)
                @if ($block->numbering == 2 and $block->type_id == 0)
                    <img alt='image' src="{{Voyager::image($block->image)}}"
                         class="fluid_img wine_image image_one">
                @endif
            @endforeach
        </div>
        <div class="col-md-5 col-xs-12 about_text_first">
            @foreach($winery->images as $block)

                @if ($block->numbering == 2 and $block->type_id == 0)
                    {!!$block->description!!}
                @endif
            @endforeach
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="container">
        <div class="flex_elem row">
            <div class="col-md-5 col-xs-12 about_text_first_2">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 0)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-7 col-xs-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 0)
                        <img alt='image' src="{{Voyager::image($block->image)}}">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- TERUAR -->

<div class="teruar_bg">
    <div class="container">
        <h2 class="teruar">Терруар</h2>
        <div class="col-md-11 col-xs-12">
            @foreach($winery->images as $block)
                @if ($block->numbering == 1 and $block->type_id == 3)
                    <img alt='image' src="{{Voyager::image($block->image)}}" class="page_image">
                @endif
            @endforeach
        </div>
        <div class="col-md-8 col-xs-12">
            @foreach($winery->images as $block)
                @if ($block->numbering == 1 and $block->type_id == 3)
                    {!!$block->description!!}
                @endif
            @endforeach
        </div>
        <div class="col-md-4 col-xs-12 map-block-style">
            <div id="map" style="position: relative; overflow: hidden;">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="flex_elem row">
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 3)
                        <img alt='image' src="{{Voyager::image($block->image)}}" class="fluid_image page_image abs_img">
                    @endif
                @endforeach
            </div>

            <div class="col-md-3 col-xs-12 terruar_text_2">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 3)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-3 col-xs-12 row-no-padding"></div>
        </div>
        <div class="col-md-offset-2 col-md-3 col-xs-12 terruar_text_3">
            @foreach($winery->images as $block)
                @if ($block->numbering == 3 and $block->type_id == 3)
                    {!!$block->description!!}
                @endif
            @endforeach
        </div>
        <div class="col-md-7 col-xs-12">
            @foreach($winery->images as $block)
                @if ($block->numbering == 3 and $block->type_id == 3)
                    <img alt='image' src="{{Voyager::image($block->image)}}" class="fluid_image page_image">
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="vinogradniki">
    @foreach($winery->images as $block)
        @if ($block->numbering == 1 and $block->type_id == 1)
            <div class="vinogradniki_bg" style="background: url({{Voyager::image($block->image)}});">
                <div class="container">
                    <div class="row">

                        <div class="col-md-offset-1 col-md-2 col-xs-12 row-no-padding">
                            <h2 class="vinogradnik_title">Виноградники</h2>
                            <div class="vine_info">
                                <div class="plod">
                                    {!!$block->addition!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-xs-12"></div>
                        <div class="vinograd_title">
                            {!!$block->description!!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    @foreach($winery->images as $block)
        @if ($block->numbering == 2 and $block->type_id == 1)
            <div class="container">
                <div class="col-md-6 col-xs-12 text_vinogradnik">
                    {!!$block->description!!}
                </div>
                <div class="col-md-6 col-xs-12 row-no-padding">
                    <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                </div>
            </div>
        @endif
    @endforeach

    <div class="vinogradniki_below">
        <div class="container">
            <div class="col-md-12 col-xs-12 vinogradniki_text_below">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 1)
                        {!!$block->addition!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-12 col-xs-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 1)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="sorta_vinograda">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xs-12 title_box"
                     style="background-image: url({{asset('image/bg/burnier_vinogradniki_bg_.png')}}); background-position: center center; background-repeat: no-repeat; z-index:0;">
                    <h5>Сорта виногада</h5>
                </div>
                <div class="col-md-offset-6 col-md-6 col-xs-12 species_box">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 1)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 1)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-10">
        <h2 class="name_vinodelnia">Винодельня</h2>
    </div>
    <div class="col-md-2">
    </div>
</div>
<div class="vinodelnia">
    <div class="container-fluid">
        <div class="row flex_elem">
            <div class="col-md-6 col_2  col-xs-12 vinodelnia_t_1">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach            </div>
            <div class="col-md-6 col_1  col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class=" fluid_image page_image">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<div class="vinodelnia_below">
    <div class="container">
        <div class="row img_vin_below">
            <div class="col-md-6 col-xs-12 img_vin_below_1">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 2)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col-xs-12 img_vin_below_2">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="sector_2">
            <div class="row">
                <div class="col-md-12">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 2)
                            <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image desc-elem">
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="text_last">
                    <div class="heading_last desc-elem">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 4 and $block->type_id == 2)
                                {!!$block->description!!}

                            @endif
                        @endforeach
                    </div>
                    <div class="body_last">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 4 and $block->type_id == 2)
                                {!!$block->addition!!}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    p{
        font-weight: 400;
        font-family: 'ProximaNova-Reg', sans-serif !important;
    }
</style>
