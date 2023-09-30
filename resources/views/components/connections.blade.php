<div class="row p-2 border-bottom">
  <div class="col-12">Verbindungen (<span id="connectionsCount1">{{ sizeof($dataArray) }}</span>)</div>
</div>

@if (sizeof($dataArray) > 0)
  <div class="row">
    @foreach ($dataArray as $connection)
    <?php $as = "asdsa" ?>
      <x-connection :connection="$connection" :inNetwork="$as"  />
    @endforeach
  </div>
@endif

