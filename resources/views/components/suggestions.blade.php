<div class="row p-2 border-bottom">
  <div class="col-12">Vorschläge (<span id="suggestionsCount1">{{ sizeof($dataArray) }}</span>)</div>
</div>

@if (sizeof($dataArray) > 0)

@else
  {{-- <div class="p-2">Du hast momentan keine Anfragen.</div> --}}
@endif
<div class="row" id="suggestions_row">
    
</div>
<div class="row d-none" id="suggestions_skeletons_row">
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
  <x-suggestion_skeleton />
</div>