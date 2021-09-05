<div class="about_person">
    <div class="container">
        <div class="row flex_elem">
            <div class="col-md-6 col_1 col-xs-12 person_text text_s_s">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 0)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col_2 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 0)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="person_img"
                             style="float:right;">
                    @endif
                @endforeach
            </div>
            <div class="col-md-7 col_4 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 0)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="margin_img person_img">
                    @endif
                @endforeach
            </div>
            <div class="col-md-5 col_3 col-xs-12 person_text text_s_s">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 0)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="teruar_bg">
    <div class="first_block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-xs-12 row-no-padding" style="position:relative;">
                    <h2 class="teruar naming_large">Терруар</h2>
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 3)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="w_plus col-md-6 col-xs-12 row-no-padding">
                    <div class="margin_part text_ml background_purple">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 1 and $block->type_id == 3)
                                {!!$block->description!!}
                            @endif
                        @endforeach
                    </div>
                    <div class="text_s_s">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 2 and $block->type_id == 3)
                                {!!$block->description!!}
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 row-no-padding w_minus">
                    <div id="map">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row flex_elem_row">
                <div class="col-md-4 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 3)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 3)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 3)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="second_block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text_mxl">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 3)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row flex_elem">
                <div class="col-md-6 col_2 col-xs-12 background_purple text_s_s">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 5 and $block->type_id == 3)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 col-xs-12" style="position:relative;">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 5 and $block->type_id == 3)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="abs_img page_image">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vinogradniki">
    <div class="container-fluid" style="position:relative">
        <h2 class="naming_medium vinogradniki_title">Виноградники</h2>
        <div class="row flex_elem_row">
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
        <div id="space_area">
            @foreach($winery->images as $block)
                @if ($block->numbering == 1 and $block->type_id == 1)
                    {!!$block->description!!}
                @endif
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 text_mxl">
            @foreach($winery->images as $block)
                @if ($block->numbering == 2 and $block->type_id == 1)
                    {!!$block->description!!}
                @endif
            @endforeach
        </div>
    </div>
    <div class="background_image">
        <div class="container flex_elem">
            <div class="text_space_old col_2 col-md-5 col-xs-12 row-no-padding">
                <div class="text_area_1">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 1)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-7 col_1 col-xs-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col_3 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 4 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="text_space_old col_4 col-md-6 col-xs-12">
                <div class="text_area_2">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 1)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12 col-xs-12 text_mxl last_vinogradniki_block">
            @foreach($winery->images as $block)
                @if ($block->numbering == 4 and $block->type_id == 1)
                    {!!$block->addition!!}
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="vinodelnia">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12 row-no-padding">
                <h2 class="name_vinodelnia naming_medium">Винодельня</h2>
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row margin_row flex_elem">
            <div class="col-md-5 col_2 col-xs-12 text_s_s">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-3 col_1 col-xs-12" id="proizvoditelnost">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        {!!$block->addition!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="second_block">
            <div class="row flex_elem">
                <div class="col-md-5 col_2 col-xs-12 text_s_s">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 2)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
                <div class="col-md-7 col_1 col-xs-12">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 2)
                            <img src="{{Voyager::image($block->image)}}" alt="image" style="margin-left:-15px;">
                        @endif
                    @endforeach
                </div>
                <div class="col-md-7 col_3 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 2)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                        @endif
                    @endforeach
                </div>
                <div class="col-md-5 col_4 col-xs-12 text_s_s last_block">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 2)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="background_purple">
        <div class="container">
            <div class="row flex_elem">
                <div class="col-md-12 col_3 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 2)
                            <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 col_1 col-xs-12 text_s_s text-white">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 3 and $block->type_id == 2)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
                <div class="col-md-5 col_2 col-xs-12 text_s_s text-white">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 4 and $block->type_id == 2)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text_s_s last_vinodelnia_block">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 4 and $block->type_id == 2)
                        {!!$block->addition!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
