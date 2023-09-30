<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //dd($request->remember);
        // validate
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required', // looks for any _confirmation
        ]);
        
        $verified = false;
        $user = User::where('email', $request->email)->get()->first();
        if ($user) {
            if ($user->status == "verified") {
                $verified = true;
            }
        }

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (str_contains($actual_link, '.jobs')) {
            $verified = false;
            if ($user) {
                    if ($user->isRecruiter()) {
                        $verified = true;
                }
            }
        }

        // sign in
        if (!$verified || !auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Email-Adresse oder Passwort nicht korrekt.');
        } else {
            if (auth()->user()->status != "not verified") {
             UserLogin::create(['user_id' => auth()->user()->id]);
            }
        }

        // redirect
        return redirect()->route('feed');
    }
}
