@php
use App\Models\TalentSearch; 
$talents = TalentSearch::all();  
@endphp

<div id="openpositions_grid" class="d-none">
<div class=" open-positions-header" id="open_positions_banner">
  <div class="row">
    <div class="h3 ms-3 mt-3 text-white">Offene Positionen</div>
  </div>
  <div class="">
    <div class="row ">
      @foreach ($talents as $item_talent)
 
      <div class="col-4 p-2">
        <div class="card shadow-sm pt-2">
            <div class="card-header py-1 px-2 border-0 bg-white">
                <h4 class="text-dark font-size-16 font-weight-500">Position {{  $item_talent->id }}</h4>
            </div>
            <div class="card-body pt-0 px-2">
                <h6 class="font-size-14 font-weight-400 text-gray">{{  $item_talent->institution_type }} @ {{  $item_talent->location_city }}, {{  $item_talent->location_state }}
                </h6>
                <h6 class="font-size-14 font-weight-400 text-gray">{{  $item_talent->contract_type }} ab {{  $item_talent->contract_start_date }}
                </h6>
                <p class="mb-2">
                    <span data-state="closed"
                        class="button-collapse d-flex align-items-center btn-link font-size-12 font-weight-400"
                        type="button">
                        <span class="text">Details anzeigen</span>
                        <i class="bi bi-chevron-down ps-2 fw-bold font-size-15"></i>
                    </span>

                </p>
                <div class="collapse">
                    <div class="table-responsive">
                        <table class="table mt-0 font-size-12 font-weight-400 text-gray">
                            <tbody>
                                <tr>
                                    <td>Arbeitserfahrung:</td>
                                    <td>3+ jahre</td>
                                </tr>
                                <tr>
                                    <td>Führerschein:</td>
                                    <td>Unwichtig</td>
                                </tr>
                                <tr>
                                    <td>Weiterbildungen:</td>
                                    <td>Weiterbildung 1, Weiterbildung 2,Weiterbildung 3</td>
                                </tr>
                                <tr>
                                    <td>Skills:</td>
                                    <td>Skill 1, Skill 2,Skill 3</td>
                                </tr>

                                <tr>
                                    <td>Sprache:</td>
                                    <td>Sprache 1 (Sprachniveau)</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="d-flex align-items-center">
                    <div class="flex-0 pe-3">
                        <input id="notify" name="notify" class="btn-toggle" type="checkbox">
                        <label for="notify"></label>
                    </div>
                    <div class="label flex-1 font-size-12 font-weight-400 text-light-gray">
                        Automatisch benachrichtigen, wenn neue Talente zu dieser Position passen.
                    </div>
                </div>
            </div>
            <div class="card-footer px-2 border-0 bg-white">
                <div class="row">
                    <div class="flex-0 d-grid pe-2">
                        <button
                            class="btn btn-outline-primary font-size-11 font-weight-400" >Bearbeiten</button>
                    </div>
                    <div class="flex-1 d-flex align-items-center justify-content-between">
                        <button class="btn btn-primary w-90 font-size-11 font-weight-700"  onclick="searchTalentsById({{  $item_talent->id}})">
                            <span class="text-elipsize-1">Passende Talente ansehen (2 neu)</span>
                        </button>
                        <button id="trash_bbuk3jc" class="btn px-0">
                            <i class="bi bi-trash text-light-gray"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
          {{-- <button   class="btn btn-primary" onclick="searchTalentsById({{  $item_talent->id}})">Open Position {{  $item_talent->id }}</button>  --}}
           {{--  -<button   class="btn btn-primary" onclick="searchTalentsById({{  $item_talent->id}})">Open Position {{  $item_talent->id}}</button> -}} --}} 
      @endforeach

    </div>

  </div>
</div>
{{-- @foreach ($talents as $item_talent)
     <li>{{  $item_talent->id}}</li>
 @endforeach --}}

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Neue Position erstellen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
        <button type="button" class="btn btn-primary jobs-bg">Speichern</button>
      </div>
    </div>
  </div>
</div>
</div>

<script type="module">


  const handelCollapse = () => {
   $(".button-collapse").click((e)=>{
   
      let state = $(e.currentTarget).attr("data-state")

      let isCollapseOpen = state === "opened"
   
      $(e.currentTarget)
      .find(".text")
      .text(!isCollapseOpen ? "Details ausblenden" : "Details anzeigen");
      $(e.currentTarget)
      .find("i")
      .toggleClass("bi-chevron-down bi-chevron-up");

      let info = $(e.currentTarget).parents(".card-body").find(".collapse")[0]
      $(info).slideToggle()
      if(!isCollapseOpen)
          $(e.currentTarget).attr("data-state", "opened")
      else
          $(e.currentTarget).attr("data-state", "closed")




   })
     
  }

  handelCollapse()

</script>