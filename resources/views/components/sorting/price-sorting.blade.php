@php
$min = request()->query('min');
$max = request()->query('max');
@endphp
<div class="event-search-wizard-body">
    <div class="event-search-wizard-item price-range">
        <div class="event-search-wizard-item-start">
            <div class="price-range-block">
                <div class="d-flex price-range-block__inputWrapper">
                    <input name="min" type="number" oninput="validity.valid||(value='{{ $min ? $min : 0 }}')" ;
                        value="{{ $min }}" id="min_price" class="price-range-field"
                        style="width: 105px; height: 50px; border-radius: 4px; padding: 15px;">
                    <span>to</span>
                    <input name="max" type="number" value="{{ $max }}"
                        oninput="validity.valid||(value='{{ $max ? $max : '5000' }}');" id="max_price"
                        class="price-range-field"
                        style="width: 125px; height: 50px; padding: 15px; border-radius: 4px;">
                    <button type="submit" class="angle-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </button>
                </div>
                <div id="slider-range"
                    class="price-filter-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;">
                    </div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 0%;"></span><span tabindex="0"
                        class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                </div>
            </div>
        </div>
    </div>
</div>
