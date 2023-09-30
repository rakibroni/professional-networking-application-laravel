<div class="row p-2 border-bottom" >
  <div class="col-12">Anfragen (<span id="requestCount1">{{ $dataArray->count() }}</span>)</div>
</div>
@if ($dataArray->count())
  @foreach ($dataArray as $connectionRequest)
    <x-connectionRequest :connectionRequest="$connectionRequest" />
  @endforeach


@else
  <div class="p-2">Du hast momentan keine Anfragen.</div>
@endif
