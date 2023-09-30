<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserActivity;
use App\Models\User;
use Carbon\Carbon; ///

if (auth()->user()->isAdmin()) {
    $users = User::where('status', 'not verified')
        ->orderBy('created_at', 'DESC')
        ->get();
    echo $users->count();

    foreach ($users as $user) {
        echo $user->created_at;
        echo '<br>';
        echo $user->fullName();
        echo '<br>';
        echo 'https://curawork.de/welcome?email=' . $user->email . '&hash=' . $user->verification_hash;
        echo '<br>';
    }
} else {
  echo "login required.";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="rect" class="default">
        <svg width="300" height="100">
            <rect width="300" height="100" />
        </svg>
    </div>
</body>
</html>