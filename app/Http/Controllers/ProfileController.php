<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        $auth = Auth::user();
        $user = User::where('email', '=', $auth->email)->get()->all();
        return view('profile', compact('user'));
    }
}
