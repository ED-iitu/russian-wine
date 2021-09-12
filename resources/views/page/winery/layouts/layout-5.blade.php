@foreach($winery->images as $block)
    @if ($block->numbering == 1 and $block->type_id == 0)
        <div class="about_person">
            <div class="container">
                <div class="row flex_elem">
                    <div class="col-md-6 col-xs-12">
                        <img src="{{Voyager::image($block->image)}}" alt="image" class="person_img">
                    </div>
                    <div class="col-md-6 col-xs-12 person_text person_text_1">
                        <p>
                            {!!$block->description!!}
                        </p>
                    </div>
                    <div class="col-md-6 col-xs-12 person_text person_text_2">
                        {!!$block->addition!!}
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
@foreach($winery->images as $block)
    @if ($block->numbering == 2 and $block->type_id == 0)
        <div class="about_person_below">
            <div class="container">
                <div class="col-md-2"></div>
                <div class="col-md-8 col-xs-12">
                    {!!$block->description!!}
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    @endif
@endforeach
<div class="teruar_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-3 col-md-3 col-xs-12 terruar_text row-no-padding">
                <h2 class="teruar">Терруар</h2>
                <p>
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 3)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-md-6 col-xs-12 row-no-padding"></div>
        </div>
        <div class="row flex_elem_row">
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1  and $block->type_id == 3)
                        <img src="{{Voyager::image($block->image)}}" alt="image"
                             class="terruar_image_two fluid_img page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2  and $block->type_id == 3)
                        <img src="{{Voyager::image($block->image)}}" alt="image"
                             class="terruar_image_one fluid_img page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-3 col-xs-12 row-no-padding">
                <div id="map">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="terruar_below_one">
            <div class="row">
                <div class="col-md-12 col-xs-12 terruar_text_2 background_purple">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2  and $block->type_id == 3)
                            {!!$block->description!!}
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="terruar_below_two">
                <div class="row">
                    <div class="col-md-6">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 3  and $block->type_id == 3)
                                <img src="{{Voyager::image($block->image)}}" alt="image" class="page_image">
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6 terruar_below_two_text">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 3  and $block->type_id == 3)
                                {!!$block->description!!}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vinogradniki">
    <div class="container-fluid">
        <h2>
            Виноградники
        </h2>
        <div class="row flex_elem_row" style="position: relative;">
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1  and $block->type_id == 1)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach

            </div>
            <div class="col-md-6 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2  and $block->type_id == 1)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="avtorskoe_vino desc-elem">
                <div class="proizvoditelnost">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1  and $block->type_id == 1)
                            {!!$block->addition!!}
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 vinogradniki_middle_text">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2  and $block->type_id == 1)
                        {!!$block->addition!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-2 col-md-4 col-xs-12 vinogradniki_list">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1  and $block->type_id == 1)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-6 col-xs-12 vinogradniki_text_bg vinogradniki_text_bg_1">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2  and $block->type_id == 1)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row_2 flex_elem_row ">
            <div class="col-md-4 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3  and $block->type_id == 1)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 4  and $block->type_id == 1)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-4 col-xs-12 row-no-padding">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 5  and $block->type_id == 1)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-md-offset-2 col-md-4 col-xs-12 vinogradniki_text">
            @foreach($winery->images as $block)
                @if ($block->numbering == 4  and $block->type_id == 1)
                    {!!$block->description!!}
                @endif
            @endforeach
        </div>
        <div class="col-md-6 col-xs-12 vinogradniki_text_bg vinogradniki_text_bg_2">
            @foreach($winery->images as $block)
                @if ($block->numbering == 5  and $block->type_id == 1)
                    {!!$block->description!!}
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="vinodelnia">
    <div class="container">
        <h2>Винодельня</h2>
        <div class="row">
            <div class="col-md-12 col-xs-12 first-block background_purple">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1  and $block->type_id == 2)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                        <div>
                            {!!$block->description!!}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-xs-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1  and $block->type_id == 2)
                        {!!$block->addition!!}
                    @endif
                @endforeach
                <div class="col-md-12">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2  and $block->type_id == 2)
                            <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-5 col-xs-12 text_down">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2  and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach

            </div>
        </div>
        <div class="row last_line_gb flex_elem">
            <div class="col-md-5">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3  and $block->type_id == 2)
                        {!!$block->description!!}
                    @endif
                @endforeach
            </div>
            <div class="col-md-7">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 3  and $block->type_id == 2)
                        <img alt="image" src="{{Voyager::image($block->image)}}" class="page_image">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
