@php
use App\Models\Institute;
use App\Models\JobPosition;
use App\Models\JobContractType;

$institutes = Institute::all();
$positions = JobPosition::all()->pluck('name');
$contract_types = JobContractType::all();

@endphp
<div style="height: 130vh">
    <button class="d-none btn-primary btn jobs-bg mb-3"
        style="width: 263px; color: #3685D6;background-color:white !important; font-size: 15.23pxpx !important"><img
            style="margin-bottom: 3px" src="{{ asset('images/job_plus.svg') }}" alt=""> Offene Position
        erstellen</button>
    <div class="bg-white shadow-md me-3 job-filter">
        <div class="px-2 mt-4">
            <div class="input-title">
                Open Positions
            </div>
            <select style="-webkit-appearance: none; outline:none" class="mt-1 job-filter-input" id="open_position">

                <option class="dropdown-item" value="">-</option>
                @foreach ($openPositions as $itemOpenPosition)
                    <option class="dropdown-item" value="{{ $itemOpenPosition->id }}">Open Position
                        {{ $itemOpenPosition->id }}</option>
                @endforeach

            </select>


        </div>
        <div class="px-2 py-2">
            <div class="d-flex justify-content-between">
                <div class="fw-600" style="font-size: 16px">Suche filtern:</div>
                <div class="text-primary underline-on-hover fw-600 invisible" style="font-size: 13px; margin-top: 5px">
                    Filter löschen</div>
            </div>
        </div>
        <div class="filter-divider mt-1"></div>
        <div class="d-flex justify-content-between py-1">
            <div class="p-1">
                <button class="btn-primary btn jobs-bg"
                    style="border:none !important; color: #3685D6;background-color:transparent !important; font-size: 12px !important; font-weight: 500"
                    onclick="talentSearchSave()"><img class=""
                        src=" {{ asset('images/jobs_save_badge_blue.svg') }}" alt=""> <span
                        class="ps-2">Suche speichern</span></button>
            </div>
            <div class="p-1 ">
                <button onclick="searchTalents()" class="btn-primary btn jobs-bg fw-600"
                    style="width: 110px ; font-size: 12px !important">Suchen</button>
            </div>
        </div>
        <div class="filter-divider"></div>

        <div class="px-2 mt-4">
            <div class="input-title">
                Arbeitsort
            </div>
            <?php
            Helper::showDropdown('city-search', 'search-dropdown-city12', 'z.B. Bielefeld', 'filterTest3(this.id,`search-dropdown-city12`)', auth()->user()->location_city . ', ' . auth()->user()->location_state, [''], ['mt-1 job-filter-input', 'position-absolute bg-white shadow-md d-none', 'HideOverFlowText'], ['', 'width: 246px !important; overflow-x: hidden', ''], '');
            ?>
        </div>

        <div class="px-2 mt-4">
            <div class="input-title">
                Art der Institution
            </div>
            <select style="-webkit-appearance: none; outline:none" class="mt-1 job-filter-input" id="institution_type">

                <option class="dropdown-item" value="">-</option>
                @foreach ($institutes as $ins_item)
                    <option class="dropdown-item" value="{{ $ins_item->id }}">{{ $ins_item->name }}</option>
                @endforeach

            </select>


        </div>
        <div class="px-2 mt-4">
            <div class="input-title">
                Position
            </div>

            <?php
            
            Helper::showDropdown('position-search', 'search-dropdown-position', 'z.B. Altenpflegefachkraft', 'filterFunction1(`position-search`, `search-dropdown-position`)', '', $positions, ['mt-1 job-filter-input', 'position-absolute bg-white shadow-md d-none', 'HideOverflowText dropdown-item pointer-on-hover'], ['', 'z-index: 2;max-height: 246px;width: 246px !important; max-width: 400px; overflow-x: hidden', ''], '$(`#search-dropdown-position`).addClass(`d-block`)');
            ?>

        </div>
        <div class="px-2 mt-4">
            <div class="input-title">
                Arbeitserfahrung
            </div>
            <div class="slidecontainer position-relative" style="z-index: 0">
                <input id="years_of_experience_slider" class="years-of-experience-slider" min="0" max="15" type="range"
                    value="5" />
                <div id="slider_start" class="slider-start"></div>
                <div id="slider_end" class="slider-end"></div>
            </div>
            <div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="slider-min-max-text mt-1">
                        0
                    </div>
                    <div class="slider-value-text">
                        +<span id="years_of_experience">5</span> Jahre
                    </div>
                    <div class="slider-min-max-text mt-1">
                        15
                    </div>
                </div>
            </div>


        </div>
        <div class=" px-2 mt-4">
            <div class="input-title">
                Führerschein notwendig?
            </div>

            <div class="mt-1 d-flex justify-content-between pointer-on-hover">
                <div onclick="setDriversLicenseNecessity(this.id)" id="drivers_license_neccessary"
                    class="unselectable drivers-license-btn job-filter-input no-right-border text-center pt-1">
                    Notwending
                </div>
                <div style="height:28px; width: 1px; background-color: #BCBBBB" class="div">.</div>
                <div onclick="setDriversLicenseNecessity(this.id)" id="drivers_license_not_neccessary"
                    class="unselectable drivers-license-btn drivers-license-btn-active job-filter-input no-left-border text-center pt-1">
                    Unwichtig
                </div>
            </div>


        </div>
        <div class="px-2 mt-4">
            <div class="input-title">
                Job Contract Type
            </div>

            <select style="-webkit-appearance: none; outline:none" class="mt-1 job-filter-input" id="contract_type">

                <option class="dropdown-item" value="">-</option>
                @foreach ($contract_types as $con_item)
                    <option class="dropdown-item" value="{{ $con_item->id }}">{{ $con_item->name }}</option>
                @endforeach

            </select>

        </div>
        <div class="px-2 mt-4">
            <div class="input-title">
                Vertragsbeginn
            </div>
            <input type="date" class="mt-1 job-filter-input"
                style="color: #BCBBBB !important; font-size: 15px !important;" id="contract_start" name="trip-start"
                value="" min="1940-01-01">
        </div>
        <div class="px-2 mt-4">
            <div class="input-title">
                Weiterbildungen
            </div>
            <?php
            $uuid = '0';
            $id = 'input' . $uuid;
            $dropdownId = $id . '_dropdown';
            $placeholder = 'Weiterbildungen';
            $value = '';
            $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
            $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
            $cssStylesArray = ['width: 246px', 'width: 246px; max-height: 200px; overflow-x: hidden; z-index: 20000', ''];
            $cssClassesArray = ['mt-1 job-filter-input', 'position-absolute bg-white shadow-md d-none', 'dropdown-item pointer-on-hover'];
            $dropdownContentArray = $furtherEducation;
            ?>
            <x-multi_select_input :id="$id" :dropdownId="$dropdownId" :placeholder="$placeholder" :value="$value"
                :onclick="$onclick" :onkeyup="$onkeyup" :cssStylesArray="$cssStylesArray"
                :cssClassesArray="$cssClassesArray" :dropdownContentArray="$dropdownContentArray" />
        </div>
        <div class="px-2 mt-4">
            <div class="input-title">
                Dokumentationssysteme
            </div>
            <?php
            $uuid = '1';
            $id = 'input' . $uuid;
            $dropdownId = $id . '_dropdown';
            $placeholder = 'Skills';
            $value = '';
            $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
            $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
            $cssStylesArray = ['width: 246px;', 'width: 246px; max-height: 200px; overflow-x: hidden; z-index: 20000', ''];
            $cssClassesArray = ['mt-1 job-filter-input', 'position-absolute bg-white shadow-md d-none', 'dropdown-item pointer-on-hover'];
            $dropdownContentArray = $documentationSystems;
            ?>
            <x-multi_select_input :id="$id" :dropdownId="$dropdownId" :placeholder="$placeholder" :value="$value"
                :onclick="$onclick" :onkeyup="$onkeyup" :cssStylesArray="$cssStylesArray"
                :cssClassesArray="$cssClassesArray" :dropdownContentArray="$dropdownContentArray" />
        </div>

        <div class="px-2 mt-4 pb-2">
            <div class="input-title">
                Sprachen
            </div>
            <?php
            
            $uuid = '2';
            $id = 'input' . $uuid;
            $category = 'languages';
            $dropdownId = $id . '_dropdown';
            $placeholder = 'Sprachen';
            $value = '';
            $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
            $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
            $cssStylesArray = ['width: 246px', 'width: 246px; max-height: 200px; overflow-x: hidden;', ''];
            $cssClassesArray = ['mt-1 job-filter-input', 'position-absolute bg-white shadow-md d-none', 'dropdown-item pointer-on-hover'];
            $dropdownContentArray = $languages;
            ?>
            <x-multi_select_input :languageLevels="$languageLevels" :id="$id" :category="$category"
                :dropdownId="$dropdownId" :placeholder="$placeholder" :value="$value" :onclick="$onclick"
                :onkeyup="$onkeyup" :cssStylesArray="$cssStylesArray" :cssClassesArray="$cssClassesArray"
                :dropdownContentArray="$dropdownContentArray" />
        </div>

        <div class="p-1">
            <button class="btn-primary btn jobs-bg"
                style="border:none !important; color: #3685D6;background-color:transparent !important; font-size: 12px !important; font-weight: 500"
                onclick="talentSearchEdit()"><img class="" src=" {{ asset('images/jobs_save_badge_blue.svg') }}" alt=""> <span class="ps-2">Update</span></button>
                <input id="talent_search_id" type="hidden" value="">
        </div>
    </div>


    <script>
        $("#input0").click(function() {
            $("#input0_dropdown").removeClass('d-none');
        });
        $("#input1").click(function() {
            $("#input1_dropdown").removeClass('d-none');
        });
        $("#input2").click(function() {
            $("#input2_dropdown").removeClass('d-none');
        });
        $("#input2_lang_level").click(function() {
            $("#input2_lang_level_dropdown").removeClass('d-none');
        });
        $("#position-search").click(function() {
            $("#search-dropdown-position").removeClass('d-none');
        });

        $("#search-dropdown-city12").click(function() {
            searchTalents();
        });
        $("#search-dropdown-position").click(function() {
            searchTalents();
        });

        $("select#institution_type").change(function() {
            $("#search-dropdown-position").removeClass('d-none');
            searchTalents();
        });

        $("select#contract_type").change(function() {
            searchTalents();
        });

        $("#input0_dropdown").click(function() {
            searchTalents();
        });

        $("#input1_dropdown").click(function() {
            searchTalents();
        });

        $("#input2_btn").click(function() {
            searchTalents();
        });



        $("#contract_start").change(function() {
            searchTalents();
        });
        $('#open_position').change(function() {
            //alert($(this).val());
            searchTalentsById($(this).val());
        });


        var sliderStart = $('#slider_start');
        var slidereEnd = $('#slider_end');
        var slider = document.getElementById("years_of_experience_slider"); 
        var value = (slider.value - slider.min) / (slider.max - slider.min) * 100;
        slider.style.background = 'linear-gradient(to right, #BCBBBB 0%, #BCBBBB ' + value + '%, #3685D6 ' + value +
            '%, #3685D6 100%)';

        document.getElementById("years_of_experience_slider").oninput = function() {
            var value = (this.value - this.min) / (this.max - this.min) * 100;
            this.style.background = 'linear-gradient(to right, #BCBBBB 0%, #BCBBBB ' + value + '%, #3685D6 ' + value +
                '%, #3685D6 100%)';
            //console.log(this.value);
            searchingTalents = false;


            $('#years_of_experience').html(this.value);
            if (this.value < (this.min + 1)) {
                sliderStart.addClass('d-none');
            } else {
                sliderStart.removeClass('d-none');
            }

            if (this.value > (this.max - 1)) {
                slidereEnd.addClass('d-none');
            } else {
                slidereEnd.removeClass('d-none');
            }
            setTimeout(() => {
                searchTalents();
            }, 500);

        };
    </script>
</div>
