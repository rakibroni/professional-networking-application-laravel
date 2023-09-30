<?php
use App\Models\User;
use App\Models\Post;
use App\Helper\Helper;
use App\Models\Categories;

$member_area = false;
$guest_area = false;
$jobs_area = false;

if (Auth::check()) {
    $user = User::where('username', auth()->user()->username)->first();
}
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$lastC = substr($actual_link, -1);
$member_area = Auth::check();
$guest_area = !Auth::check();

if (!str_contains($actual_link, '/users') && (str_contains($actual_link, '/aboutus') || str_contains($actual_link, '/impressum') || str_contains($actual_link, '/datenschutz') || str_contains($actual_link, '/nutzervereinbarung'))) {
    $member_area = false;
    $guest_area = true;
}

if ($lastC == '/' && Auth::check()) {
    header('Location: https://' . $_SERVER['HTTP_HOST'] . '/feed');
}

if ($lastC == '/' && !Auth::check()) {
    $member_area = false;
    $guest_area = true;
}

// UNCOMMENT NEXT LINE FOR OFFLINE VERSION

$actual_link .= 'jobs.';
if (str_contains($actual_link, 'jobs.')) {
    $jobs_area = true;
}

if ($jobs_area == true) {
    $member_area = false;
    $guest_area = false;
}
$question_categories = Categories::pluck('name');

/*$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $actual_link;
if (str_contains($actual_link, 'aboutus')) {
echo "is included";
$auth && keine landingpage seite == @if ($member_area)
$landingpageseite || @if ($guest_area) = @if ($guest_area)
}*/

// GIVE POSTS UUID
/*$posts = Post::where('uuid', '')->get();

for ($i = 0; $i < $posts->count(); $i++) {
  $uuid = Helper::anotherRandomIDGenerator();
  $check_if_uuid_exists = Post::where('uuid', $uuid)->get()->count();
  while ($check_if_uuid_exists > 0) {
    $uuid = Helper::anotherRandomIDGenerator();
    $check_if_uuid_exists = Post::where('uuid', $uuid)->get()->count();
  }
  Post::where('id', $posts[$i]->id)->update(['uuid' => $uuid]);
}*/
$isWebView = false;
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false):
            $isWebView = true;
        elseif (isset($_SERVER['HTTP_X_REQUESTED_WITH'])):
            $isWebView = true;
        endif;
        
        $isAndroid = false;
        if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Android')) {
            $isAndroid = true;
        }
?>




<!DOCTYPE html>
<html lang="en">


<head>

  @if ($member_area)
    <x-member_page_head />
  @endif

  @auth
  @if ($jobs_area)
    <x-jobs_page_head />
  @endif
  @endauth

  @if ($guest_area)
    <x-landing_page_head />
  @endif

</head>

<body id="body" class="@if($jobs_area) jobs-body-bg  @else bg-white @endif" >

  {{-- NAVBARS --}}
  @if ($member_area)
    <x-member_navbar :user="$user" />
  @endif

  @if ($guest_area)
    <x-landing_page_navbar />
  @endif

  @if ($jobs_area)
    @auth
      <x-jobs_page_navbar />
    @endauth

  @endif

  <!-- CUSTOM JS -->

  {{-- NAVBARS END --}}

  {{-- TOP PADDING --}}
  @if ($member_area | $jobs_area)
    <div class="" style=" padding-top: 90px">
  @endif

  @if ($guest_area)
    <div class="" style=" padding-top: 0px">
  @endif

  {{-- TOP PADDING END --}}

  {{-- BLACK TRANSPARENT BODY FOR USER SEARCH --}}
  @if ($member_area)
    <div id="feed-body" class="fixed-top w-100 h-100" style="z-index: 26">
    </div>
    <div id="add-post-question-body" class="fixed-top w-100 h-100 d-none" style="z-index: 26">
    </div>
  @endif
  {{-- BLACK TRANSPARENT BODY FOR USER SEARCH END --}}


  <div id="" class="" style=" position: relative; z-index: none; min-height: 100vh">
    @if ($jobs_area)
      @guest
        <x-jobs_login />
      @endguest
      @auth
      <x-talent_grid />
      <x-talentsearch_grid />
      <x-job_page_invites_grid />
      <x-openpositions_grid />
      <x-job_page_messages_grid />
      <x-jobs_page_company_grid />
      @endauth


    @endif
    @if ($member_area)

      {{-- MEMBER AREA PAGES --}}
      <!-- MODAL - CONNECTIONS IN COMMON -->
      <x-invite_friends_notification_modal :isWebView="$isWebView" :isAndroid="$isAndroid" />
      <x-referal_modal />
      <x-report_modal />
      <x-question_disclaimer_modal />
      <x-eula_modal />
      <x-questions_modal :list="$question_categories" />
      <x-no_connection_modal />
      <x-connections_in_common_modal :user="$user" />

      <x-single_post_grid :list=$question_categories />
 
      <x-feed_grid :isWebView="$isWebView" :isAndroid="$isAndroid" />
      <x-network_grid />
      <x-notifications_grid />
      <x-user_profile_grid />
      {{-- MEMBER AREA PAGES END --}}
    
      {{-- SPACE AT BOTTOM FOR BOTTOM NAVBAR --}}
      <div class="d-xl-none" style="height: 50px">
      </div>
      {{-- SPACE AT BOTTOM FOR BOTTOM NAVBAR END --}}
    @endif

    @if ($guest_area)
      @yield('content')
    @endif
  </div>

  @if ($guest_area)
    {{-- LANDING PAGE FOOTER & COOKIE BANNER --}}
    <x-landing_page_footer />
    {{-- LANDING PAGE FOOTER & COOKIE BANNER END --}}
  @endif




  <!-- JQUERY -->

</body>

</html>
