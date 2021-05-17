<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;






class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $user = Admin::where('email', $request->email)->first();
            Auth::guard('admin')->login($user);
            return redirect()->route('admin.home');
        }

        return redirect()->route('admin.login')->with('status', 'Failed to process Login');
    }
    public function logout()
    {
        if (Auth::guard('admin')->logout()) {
            return redirect()->route('admin.login')->with('status', 'logout sucessfully');
        }
    }
}
