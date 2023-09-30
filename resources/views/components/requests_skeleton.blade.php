<div class="row p-2 border-bottom">
  <div class="col-12">
    <div class="skeleton" style="width: 100px">Anfragen(0)</div>
  </div>
</div>

@for ($i = 0; $i < 16; $i++)
  <x-request_skeleton />
@endfor
