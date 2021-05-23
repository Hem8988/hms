<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class Typesofroom extends Controller
{
    public function typesofroom()
    {
        return view('admin.typesofroom');
    }

    public function cteate(Request $request){
        $Rule = [
                    'room' => ['required', 'string', 'max:255', 'unique:room'],
        ];
    }
}
