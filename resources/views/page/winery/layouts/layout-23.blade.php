@foreach($winery->images as $block)
    @if ($block->numbering == 1 and $block->type_id == 0)
        <div class="about_person">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xs-12 person_text text_s_s half_minus">
                        {!!$block->description!!}
                    </div>
                    <div class="col-md-5 col-xs-12 half_plus row-no-padding">
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="person_img">
                    </div>
                </div>
            </div>
        </div>
        <div class="about_person_below">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 text_mxl">
                        {!!$block->addition!!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
<div class="teruar_bg">
    <div class="container" style="position:relative;">
        <h2 class="teruar naming_medium">Терруар</h2>
        <div class="row">
            <div class="col-md-9 col-xs-12 half_minus text_mxl background_purple">
                <div class="row flex_elem">
                    <div class="col-md-5 col_2 col-xs-12 half_minus background_purple">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 1 and $block->type_id == 3)
                                {!!$block->description!!}
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-7 col_1 col-xs-12 half_plus">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 1 and $block->type_id == 3)
                                <img src="{{Voyager::image($block->image)}}" alt="image" class="pull-left margin_img">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-xs-12 half_plus row-no-padding">
                <div id="map">
                </div>
            </div>
            <div class="col-md-7 col-xs-12 half_minus">
                <div class="text_s_s">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 3)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 col-xs-12 text_mxl">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 3)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="vinogradniki">
    <div class="container" style="position:relative;">
        <h2 class="vinogradniki_title naming_small">Виноградники</h2>
        <div class="row">
            <div class="col-md-7 col-xs-12 half_plus row-no-padding" style="position:relative;">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="pull-right">
                    @endif
                @endforeach
                <div id="area">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 1)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-5 col-xs-12 half_minus text_mxl">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 1)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 half_minus text_s_s">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 1)
                        {!!$block->description!!}
                    @endif
                @endforeach
                <div class="text_mxl">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 1)
                            {!!$block->addition!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 col-xs-12 half_plus row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 1)
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="pull-left">
                    @endif
                @endforeach
            </div>
            <div class="col-md-12 col-xs-12 text_s_s">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3 and $block->type_id == 1)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="vinodelnia">
    <div class="container">
        <div class="row flex_elem">
            <div class="col-md-6 col_1 col-xs-12 half_plus row-no-padding" style="postion:relative">
                <h2 class="name_vinodelnia naming_medium">Винодельня</h2>
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        <img src="{{Voyager::image($block->image)}}" alt="image"class="pull-right mrg-img">
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col_2 col-xs-12 half_minus background_purple text-white">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col_4 col-xs-12 half_plus text_s_s">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col_3 col-xs-12 half_minus row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 2)
                        <img src="{{Voyager::image($block->image)}}" alt="image"class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
