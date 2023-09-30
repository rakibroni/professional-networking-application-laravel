<?php
use App\Models\User;
use App\Models\UserLogin;

$users = User::get();

for ($i = 0; $i < sizeof($users); $i++) {
    /*UserLogin::create([
        'user_id' => $users[$i]->id,
    ]);*/
}

$isAdmin = auth()
    ->user()
    ->isAdmin();
if (!$isAdmin) {
    header('Location: /');
    exit();
}
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="{{ asset('css/app.css') }}?v={{ time() }}" rel="stylesheet">
 {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}

  <title>Dashboard - Curawork</title>

  <style>
    td {
      font-size: 10px !important;
    }

    th {
      font-size: 13px !important;
    }


    .table-skeleton {

      height: 196px;
      width: 100%;
    }


    .spinner-border {
      border-width: 2px !important;
      margin-bottom: 4px;
    }

    .btn-warning {
      background-color: #FF9721 !important;
      border-color: #FF9721 !important;
    }

    .bg-warning {
      background-color: #FF9721 !important;
    }

    .no-top-border-radius {
      border-top-left-radius: 0px !important;
      border-top-right-radius: 0px !important;
    }

  </style>
  <link href="{{ asset('css/main.css') }}?v={{ time() }}" rel="stylesheet">
  <script defer src="{{ asset('js/helper.js') }}?v={{ time() }}"></script>
  <script defer src="{{ asset('js/userActivity.js') }}?v={{ time() }}"></script>
  <script defer src="{{ asset('js/dashboard.js') }}?v={{ time() }}"></script>



  <!-- JQUERY -->
  {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>--}}

    <script  src="{{ asset('js/jquery.min.js') }}?v={{ time() }}"></script>
    <script  src="{{ asset('js/jquery-ui.js') }}?v={{ time() }}"></script>
  
</head>

<body>
  @if ($isAdmin)


    <div class="row mt-5">




      <script  src="{{ asset('js/chart.js') }}?v={{ time() }}"></script>



      <div class="mt-2 mb-5 display-3">
        <div class="text-center">
          <img class="" style=""
            src=" {{ asset('images/schrift.svg') }}" alt=""><br>
          Dashboard
        </div>
      </div>
    </div>


    <div class="mb-3">

      <div class="row">


        <div class="col-md-3 col-6 text-center p-1">
          <div class="rounded fw-bold p-3  bg-warning text-white">
            <div class="h2 fw-bold mb-3">
              TOTAL USER COUNT
            </div>
            <div class="display-6">

              <div class="text-center">
                <div id="total_user_count_skeleton" class="d-none spinner-border text-light" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
              <div id="total_user_count" class="d-none">{{ User::get()->count() }}</div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-6 text-center p-1">
          <div class="rounded fw-bold p-3  bg-warning text-white" style="background-color: #3fa7d6 !important">
            <div class="h2 fw-bold mb-3">
              MONTHLY ACTIVE USERS
            </div>
            <div class="display-6">
              <div id="monthly_active_users_skeleton" class="text-center d-none">
                <div class="spinner-border text-light" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
              <div id="monthly_active_users" class="d-none"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 text-center p-1">
          <div class="rounded fw-bold p-3  bg-warning text-white" style="background-color: #59CD90 !important">
            <div class="h2 fw-bold mb-3">
              WEEKLY ACTIVE USERS
            </div>
            <div class="display-6">
              <div id="weekly_active_users_skeleton" class="text-center d-none">
                <div class="spinner-border text-light" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
              <div id="weekly_active_users" class="d-none"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 text-center p-1">
          <div class="rounded fw-bold p-3  bg-warning text-white" style="background-color: #F52F57 !important">
            <div class="h2 fw-bold mb-3">
              DAILY ACTIVE USERS
            </div>
            <div class="display-6">
              <div id="daily_active_users_skeleton" class="text-center d-none" >
                <div class="spinner-border text-light" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
              <div id="daily_active_users" class="d-none"></div>
            </div>
          </div>
        </div>

        <div class="col-12 p-1 mt-3">
          <div id="chart-parent" class="skeleton">
            <canvas id="myChart"></canvas style="min-height: 300px">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mt-3 p-1">


          <table id="user_table" class="d-none table-hover table  rounded table-rounded"
            style="margin-bottom: 0px !important">
            <thead>
              <tr>
                <th scope="col">User ID</th style="">
                <th scope="col">Name</th>
                <th scope="col">Logins (Total)</th>
                <th scope="col">Last Login</th>
                {{-- <th scope="col">OS</th>
                <th scope="col">Screensize</th>
                <th scope="col">Activities (Total)</th> --}}
                <th scope="col">Time of Latest Activity</th>
                <th scope="col">Latest Activity</th>
                <th scope="col">MAU</th>
                <th scope="col">WAU</th>
                <th scope="col">DAU</th>
              </tr>
            </thead>
            <tbody id="user_activity" class="d-none"></tbody>
          </table>
          <div id="user_activity_skeletons" class="rounded table-skeleton skeleton d-none">

          </div>

        </div>
        <div class="col-12 text-center mt-3">
          <button class="btn btn-warning" onclick="loadMoreDashboardRows()">Load more</button>
        </div>
      </div>


    </div>
    </div>


  @endif


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
