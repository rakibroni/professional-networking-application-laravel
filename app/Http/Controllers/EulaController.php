<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EulaController extends Controller
{
    public function update(Request $request)
    {
        $username = $request->username;
        $user = User::where('username', $username)->get()->first();
        $user->update([
            'eula_acceptance' => 'true'
        ]);
        echo json_encode($user->eula_acceptance);
    }
}
