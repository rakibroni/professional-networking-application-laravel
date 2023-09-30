<div class="cura-col-3">
    <!-- Add New Question -->
    <div class="
          d-flex
          bg-gray
          w-90
          text-center
          font-weight-700 font-size-15
          line-height-18
          m-auto
          p-4
        ">
      <a href="#" class="d-flex text-body">
        <img src="{{ asset('images/icon/question-sign-in-circles.svg') }}" alt="icon" />
        <span>
          <span class="text-decoration-underline">Klicke hier</span> und
          stelle anonym eine Frage!
        </span>
      </a>
    </div>

    <!--Topics  -->
    <div class="w-100 d-flex flex-row flex-wrap p-2">
      <div class="border-1 border-bottom w-90 m-auto mb-2">
        <a href="#" class="
              d-block
              mx-auto
              w-fit
              font-weight-500 font-size-14
              line-height-16
            ">
          <span role="svg" class="position-relative bottom-2">
            <img src="{{ asset('images/icon/Rectangle.svg') }}" width="20" height="20" />
          </span>
          Themen</a>
      </div>
<?php 
$questionCategory= \App\Models\Categories::all();
 
?>
@foreach ($questionCategory as $category)
<a role="button" class="badge badge-secondary rounded-pill p-2 m-1">{{ $category->name }} ({{ \App\Models\QuestionCategories::where('category_id', '=', $category->id)->count(); }})</a>
@endforeach
      
      
    </div>

    <!-- Recommend Questions -->
    <div class="recom-quest-container mt-4">
      <div class="border-1 border-bottom w-90 m-auto mb-2">
        <a href="#" class="
              d-block
              mx-auto
              w-fit
              font-weight-500 font-size-14
              line-height-16
            ">
          <span role="svg" class="position-relative bottom-2">
            <img src="{{ asset('images/icon/_.svg') }}" width="20" height="20" />
          </span>
          Weitere Fragen
        </a>
      </div>
      {{-- question list --}}
      <span id="right_side_panel_question"></span>
      {{-- end question list --}}
       

      <!-- Load more -->
      <div class="border-1 border-top w-90 m-auto">
        <a href="#" class="load-more d-block mx-auto my-2 w-fit font-blod-700">Mehr anzeigen</a>
      </div>
    </div>
  </div>