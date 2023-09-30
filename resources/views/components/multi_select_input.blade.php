{{-- ###  $cssClassesArray ###
[0] : input - class
[1] : dropdown - class
[2] : dropdown item - class

###  $cssStyleArray ###
[0] : input - style
[1] : dropdown - style
[2] : dropdown item - style

$id
$placeholder
$value
$onkeyup
$onclick
$cssStylesArray
$cssClassesArray
$dropdownContentArray --}}


{!! "<script>
  if (typeof inputs === 'undefined') {
    var inputs = [];
  }
  inputs.push('$id');
  </script>" !!}

<?php
if (!isset($category)) {
    $category = 'test';
}
?>

<div class="">
  <div id='{{ $id }}_preview' class="" style=" width:230px">

</div>
@if ($category != 'languages' && $category != 'question')
  <input placeholder="{{ $placeholder }}" value="{{ $value }}" onkeyup="{{ $onkeyup }}"
    onclick="{{ $onclick }}" autofill="none" autocomplete="off" style="{{ $cssStylesArray[0] }}"
    class="{{ $cssClassesArray[0] }}" type="text" id='{{ $id }}'>
  <div style="{{ $cssStylesArray[1] }}" id="{{ $dropdownId }}" class="{{ $cssClassesArray[1] }}">
    @for ($i = 0; $i < sizeof($dropdownContentArray); $i++)
      <div style="{{ $cssStylesArray[2] }}" onclick="selectItem(this.id, '{{ $id }}')"
        id="{{ $id . '-' . $i }}" class="{{ $cssClassesArray[2] }}">{{ $dropdownContentArray[$i] }}</div>
    @endfor
  </div>
@endif

@if ($category == 'languages')

  <input placeholder="{{ $placeholder }}" value="{{ $value }}" onkeyup="{{ $onkeyup }}"
    onclick="{{ $onclick }}" autofill="none" autocomplete="off" style="{{ $cssStylesArray[0] }}"
    class="{{ $cssClassesArray[0] }}" type="text" id='{{ $id }}'>
  <div style="{{ $cssStylesArray[1] }}" id="{{ $dropdownId }}" class="{{ $cssClassesArray[1] }}">
    @for ($i = 0; $i < sizeof($dropdownContentArray); $i++)
      <div style="{{ $cssStylesArray[2] }}" onclick="selectItem(this.id, '{{ $id }}', 'lang')"
        id="{{ $id . '-' . $i }}" class="{{ $cssClassesArray[2] }}">{{ $dropdownContentArray[$i] }}</div>
    @endfor
  </div>

  <?php
  $id_lang_level = $id . '_lang_level';
  $dropdownId = $id_lang_level . '_dropdown';
  $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
  $onkeyup = 'filterInput("' . $id_lang_level . '", "' . $dropdownId . '")';
  if (isset($languageLevels)) {
      $dropdownContentArray = $languageLevels;
  }
  $addLanguageBtnId = $id . '_btn';
  ?>

  {!! "<script>
    inputs.push('$id_lang_level');
    </script>" !!}
  <div class="d-flex justify-content-end">
    <div>
      <img src="{{ asset('images/language_level_arrow.svg') }}" class="me-2"
        style="margin-top: 12px; width: 20px" alt="">
    </div>
    <div>
      <input placeholder="z.B Grundkenntnisse" value="{{ $value }}" onkeyup="{{ $onkeyup }}"
        onclick="{{ $onclick }}" autofill="none" autocomplete="off"
        style="font-size: 13px; width: 180px !important; {{ $cssStylesArray[0] }}"
        class="mt-2 {{ $cssClassesArray[0] }}" type="text" id='{{ $id_lang_level }}'>
    </div>
  </div>
  <div class="d-flex justify-content-end">
    <div style="width: 180px !important; {{ $cssStylesArray[1] }}" id="{{ $dropdownId }}"
      class="{{ $cssClassesArray[1] }}">
      @for ($i = 0; $i < sizeof($dropdownContentArray); $i++)
        <div style="{{ $cssStylesArray[2] }}" onclick="selectItem(this.id, '{{ $id_lang_level }}', 'lang')"
          id="{{ $id_lang_level . '-' . $i }}" class="{{ $cssClassesArray[2] }}">
          {{ $dropdownContentArray[$i] }}
        </div>
      @endfor
    </div>
    <div id="{{ $addLanguageBtnId }}" onclick="" class="mt-2" style="width: 231px">
      <div class="btn-primary btn-sm   jobs-bg float-end">Hinzufügen</div>
    </div>
  </div>
  

  {!! "<script>
      $('#'+'$addLanguageBtnId').on('click', function () {
      addToItemsPreview('$id', $('#'+'$id').val(), '$id_lang_level', $('#'+'$id_lang_level').val());
      });
      </script>" !!}
@endif

{{-- question category dropdown --}}
@if ($category == 'question')
  
<input placeholder="{{ $placeholder }}" value="{{ $value }}" onkeyup="{{ $onkeyup }}"
  onclick="{{ $onclick }}" autofill="none" autocomplete="off" style="{{ $cssStylesArray[0] }}"
  class="{{ $cssClassesArray[0] }}" type="text" id='{{ $id }}'>
<div style="{{ $cssStylesArray[1] }}" id="{{ $dropdownId }}" class="{{ $cssClassesArray[1] }}">
  @for ($i = 0; $i < sizeof($dropdownContentArray); $i++)
    <div style="{{ $cssStylesArray[2] }}" onclick="addCategoriesToArray('{{ $dropdownContentArray[$i] }}'); selectItem(this.id, '{{ $id }}')"
      id="{{ $id . '-' . $i }}" class="{{ $cssClassesArray[2] }}">{{ $dropdownContentArray[$i] }}</div>
  @endfor
</div>
@endif
</div>
