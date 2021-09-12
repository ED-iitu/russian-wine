@foreach($winery->images as $block)
    @if ($block->numbering == 1 and $block->type_id == 0)
        <div class="about_person">
            <div class="container">
                <div class="row flex_elem">
                    <div class="col-md-4 col-xs-12">
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="person_img">
                    </div>
                    <div class="col-md-8 col-xs-12 person_text">
                        {!!$block->description!!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
<div class="container about_person_below">

    <div class="col-md-12 col-xs-12">
        @foreach($winery->images as $block)
            @if ($block->numbering == 2 and $block->type_id == 0)
                {!!$block->description!!}
            @endif
        @endforeach
    </div>
</div>
<div class="container-fluid">
    <div class="row flex_elem_row">
        <div class="col-md-3 col-xs-12 row-no-padding">
            @foreach($winery->images as $block)
                @if ($block->numbering == 2 and $block->type_id == 0)
                    <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                @endif
            @endforeach
        </div>
        <div class="col-md-3 col-xs-12 row-no-padding">
            @foreach($winery->images as $block)
                @if ($block->numbering == 3 and $block->type_id == 0)
                    <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                @endif
            @endforeach
        </div>
        <div class="col-md-3 col-xs-12 row-no-padding">
            @foreach($winery->images as $block)
                @if ($block->numbering == 4 and $block->type_id == 0)
                    <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                @endif
            @endforeach
        </div>
        <div class="col-md-3 col-xs-12 row-no-padding">
            @foreach($winery->images as $block)
                @if ($block->numbering == 5 and $block->type_id == 0)
                    <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-12 col-xs-12 text_about_last">
        @foreach($winery->images as $block)
            @if ($block->numbering == 5 and $block->type_id == 0)
                {!!$block->description!!}
            @endif
        @endforeach
    </div>
</div>
<div class="teruar_bg">
    <div class="container-fluid">
        <h2 class="teruar">Терруар</h2>
        <div class="row">
            <div class="col-md-offset-2 col-md-10">
                <div class="col-md-5 col-xs-12 img_text">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 3)
                            <img alt="image" src="{{Voyager::image($block->image)}}" class=" fluid_img page_image">
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
                <div class="text_map col-md-4 col-xs-12 background_purple">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 3)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                    <div id="map">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vinogradniki">
    <div class="container-fluid">
        <h2 class="vinogradnik_title">Виноградники</h2>
        <div class="row">
            <div class="col-md-offset-2 col-md-10 col-xs-12 row-no-padding flex_elem">
                <div class="col-md-2 col-xs-12 text_vin_line">

                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 1)
                            {!!$block->description!!}
                        @endif
                    @endforeach

                </div>
                <div class="col-md-4 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 1)
                        <div id="area">{!!$block->addition!!}</div>
                            <img src="{{Voyager::image($block->image)}}" alt="image" style="float:right;">
                        @endif
                    @endforeach

                </div>
                <div class="col-md-6 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 1)
                            <img src="{{Voyager::image($block->image)}}" alt="image" >
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 1)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image vinodelnia_img">
                        @endif
                    @endforeach

                </div>
                <div class="col-md-5 col-xs-12 text_vin_line_2">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 1)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row sort_line first_line">
                <div class="col-md-2 col-xs-12 row-no-padding">
                    <h3>Технические сорта:</h3>
                </div>
                <div class="col-md-10 col-xs-12">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 1)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row sort_line">
                <div class="col-md-2 col-xs-12 row-no-padding">
                    <h3>Столовые сорта:</h3>
                </div>
                <div class="col-md-10 col-xs-12">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 1)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 class="name_vinodelnia">Винодельня</h2>
</div>
<div class="vinodelnia">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10 col-xs-12 row-no-paddong">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="spec_col_1 col-md-5  col-xs-12 " style="padding-right: 0px;">
                <div class="text_up_vinodelnia">
                    <div class="proizvoditelnost">
                        <h2>10 млн</h2>
                        <p>бутылок в год</p>
                    </div>
                    <div class="proizvod_text">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 1 and $block->type_id == 2)
                                {!!$block->description!!}
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="spec_col_2 col-md-7 text_with_padding background_purple">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        {!!$block->addition!!}
                    @endif
                @endforeach
            </div>
            <div class="text_down_vinodelnia background_purple">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="vinodelnia_below">
    <div class="container-fluid">
        <div class="col-md-offset-2 col-md-10 col-xs-12">
            <div class="col-md-4 text_with_padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-8">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        <img src="{{Voyager::image($block->image)}}" alt="image"
                             class="page_image vinodelnia_img">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container flex_elem">
        <div class="col-md-7 col-xs-12 row-no-padding">
            @foreach($winery->images as $block)
                @if ($block->numbering == 3 and $block->type_id == 2)
                    <img src="{{Voyager::image($block->image)}}" alt="image"
                         class="page_image vinodelnia_img last_vinodelnia_img">
                @endif
            @endforeach

        </div>
        <div class="col-md-5 col-xs-12 text_with_padding">
            @foreach($winery->images as $block)
                @if ($block->numbering == 3 and $block->type_id == 2)
                    {!!$block->addition!!}
                @endif
            @endforeach
        </div>
    </div>
</div>

