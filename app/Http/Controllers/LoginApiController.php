<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class LoginApiController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        return($user);
    }
}
