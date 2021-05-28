<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    public function viewProfile()
    {
        $auth = Auth::user();
        $user = User::where('email', '=', $auth->email)->get()->all();
        return view('profile', compact('user'));
    }

    public function editProfileShow(request $request, $id)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'pin' => 'required',

        ]);
        $Profile = user::find($id);
        $Profile->name = $request->name;
        $Profile->email = $request->email;
        $Profile->phone = $request->phone;
        $Profile->address = $request->address;
        $Profile->pin = $request->pin;
        $Profile->save();
        return json_encode(array(
            "statusCode" => 200
        ));
    }


    public function editPassword(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'old_password' => ['required', new MatchOldPassword],
            'password' => 'required|min:8',
            'password_confirmation' => ['same:password'],

        ]);
        if ($validatedData->fails()) {
            return json_encode(array(
                "statusCode" => 201
            ));
        } else {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);
            return json_encode(array(
                "statusCode" => 200
            ));
        }
    }
}
