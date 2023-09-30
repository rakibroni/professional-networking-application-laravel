@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top: 100px">
    <div class="row">

      <div class="p-4">
        <h1>{{ $user->firstname." ".$user->name }}</h1>
        <p>Posted {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} and received {{ $user->receivesLikes->count() }} likes</p>
      </div>



      <div class="col-12 p-5 shadow-lg">
        @if ($posts->count())
          @foreach ($posts as $post)
            <x-post :post="$post" />
          @endforeach
          <div class="mt-4">
            {{ $posts->links() }}
          </div>

        @else
          Keine Posts vorhanden
        @endif
      </div>
    </div>
  </div>
@endsection
