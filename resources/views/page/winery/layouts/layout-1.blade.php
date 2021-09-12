    <!-- ABOUT -->
    @foreach($winery->images as $block)
        @if ($block->numbering == 1 and $block->type_id == 0)
            <div class="background-white about_person">
                <div class="container container-lg">
                    <div class="row">
                        <div
                            class="col-sm-6 col-md-5 description-first-image">
                            <img alt='image' class="img-responsive" src="{{Voyager::image($block->image)}}">
                        </div>
                        <div
                            class="col-sm-6 col-md-6 col-md-offset-1 description-first mt-md mb-sm text_mxl_mob">
                            {!!$block->description!!}
                        </div>
                        <div class="col-md-12 col-xs-12 person_text_2 person_text">
                            {!!$block->addition!!}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <!-- TERUAR -->
    <div class="teruar_bg">
        <div class="container container-lg">
            <h2 class="teruar">Терруар</h2>
            <div class="col-md-7 col-xs-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 2 and $block->type_id == 3)
                        <img alt="image_block" src="{{Voyager::image($block->image)}}"
                             class="page_image">
                    @endif
                @endforeach
            </div>
            <div class="col-md-5 col-xs-12">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 3)
                        <img alt="image_block" src="{{Voyager::image($block->image)}}"
                             class="fluid_img wine_image">
                        {!!  $block->description !!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @foreach($winery->images as $block)
        @if ($block->numbering == 2 and $block->type_id == 3)
            <div class="text_field teruar_below">
                <div class="container container-lg">
                    <div class="col-md-12">
                        {!!  $block->description !!}
                    </div>
                </div>
            </div>
            <div class="map_space">
                <div class="container container-lg">
                    <div class="col-md-8">
                        <div class="text_with_map">
                            {!!  $block->addition !!}
                        </div>
                    </div>
                    <div class="col-md-4" id="map">
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="vinogradniki">
        <div class="container-fluid">
            <div class="row">
                @foreach($winery->images as $block)
                    @if ($block->numbering == 1 and $block->type_id == 1)
                        <div class="col-md-6 col-xs-12 row-no-padding">
                            <img alt='block_image' src="{{Voyager::image($block->image)}}"
                                 class="page_image">
                        </div>
                    @endif
                @endforeach
                <div class="col-md-6 col-xs-12 row-no-padding">
                    <h2 class="vinogradnik_title">Виноградники</h2>
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 1)
                            {!!  $block->addition !!}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-4 col-xs-12">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 1 and $block->type_id == 1)
                            {!!  $block->description !!}
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 col-xs-12 row-no-padding">
                    @foreach($winery->images as $block)
                        @if ($block->numbering == 2 and $block->type_id == 1)
                            <img alt="block_image" src="{{Voyager::image($block->image)}}"
                                 class="fluid_image page_image"
                                 style="width: calc(100% + 70px);">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container container-lg">
            <div class="row">
                <div class="col-md-6 col-xs-12" style="margin-top: -50px;">
                    <div class="row">
                        @foreach($winery->images as $block)
                            @if ($block->type_id == 1)
                                @if ($block->numbering == 3 or $block->numbering == 4 or $block->numbering == 5 or $block->numbering == 6)
                                    <div class="col-sm-6">
                                        <img alt="blok_image" src="{{Voyager::image($block->image)}}"
                                             class="page_image vinodelnia_img">

                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="about_vinogradnik_last">
                        @foreach($winery->images as $block)
                            @if ($block->numbering == 2 and $block->type_id == 1)
                                {!!  $block->description !!}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

