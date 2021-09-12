@foreach($winery->images as $block)
    @if ($block->numbering == 1 and $block->type_id == 0)
        <div class="about_person">
            <div class="container">
                <div class="row flex_elem">
                    <div class="col-md-6 col-xs-12">
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="person_img">
                    </div>
                    <div class="col-md-6 col-xs-12 person_text">
                        {!!$block->description!!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
<div class="teruar_bg">
    <div class="container">
        <h2 class="teruar">Терруар</h2>
        <div class="row">
            <div class="col-md-9 col-xs-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 3)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row flex_elem">
            <div class="col-md-7 col-xs-12 text-white">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 3)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-5 col-xs-12 text_with_map">
                <div class="teruar_text">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 3)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
                <div id="map">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row flex_elem_row">
            <div class="col-md-4 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 3)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 3)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 4 and $block->type_id == 3)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="teruar_text_prelast">
        <div class="container">
            <div class="col-md-12 col-xs-12 text-white ">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 3)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="teruar_last">
        <div class="container-fluid">
            <div class="row flex_elem">
                <div class="col-md-offset-2 col_2 text-white col-md-4">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 3)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 col_1">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 5 and $block->type_id == 3)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="teruar_image_absolute">
                        @endif
                    @endforeach
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 6 and $block->type_id == 3)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="teruar_image">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vinogradniki">
    <div class="container-fluid">
        <h2 class="vinogradnik_title">Виноградники</h2>
        <div class="row">
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image first_v_img">
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 col-xs-12 row-no-padding">
                <div class="vine_info">
                    <div class="row">
                        <div class="plod">
                            <h3 class="plod_title">
                                @foreach($winery->images as $block)
                                    @if ($block->numbering == 1 and $block->type_id == 1)
                                        {!!$block->addition!!}
                                    @endif
                                @endforeach
                            </h3>
                        </div>
                        <div class="count_species">
                            23 сорта винограда
                        </div>
                    </div>
                    <div class="vinogradniki_text_1">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 1 and $block->type_id == 1)
                                {!!$block->description!!}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 row-no-padding">
                <div class="vinogradniki_text_2">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 1)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
                <div class="vinogradniki_text_3">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 1)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
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
                @endforeach
            </div>
            <div class="col-md-6 col_1  col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="fluid_image page_image">
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
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach

            </div>
            <div class="col-md-6 col-xs-12 img_vin_below_2">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="sector_2">
            <div class="row">
                <div class="col-md-12">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 2)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image desc-elem">
                        @endif
                    @endforeach

                </div>
            </div>
            <div class="row">
                <div class="text_last">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 2)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

