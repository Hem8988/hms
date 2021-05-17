<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use App\Models\state;
use App\Models\city;
use App\Models\room;
use App\Models\room_Category;

class countryselelct extends Controller
{
    public function getCountry()
    {
        // $roomList = room::all();
        $data['room__categories'] = room_Category::get(["name", "id"]);
        $data['countries'] = country::get(["country_name", "country_id"]);
        return view('reservation', $data);
    }

    public function fetchState(Request $request)
    {
        // dd($request->all);
        $data['rooms'] = room::where("idCategory", $request->id)
            ->where('status', '=', 1)
            ->get(["room_name", "id"]);
        $data['states'] = state::where("country_id", $request->country_id)->get(["state_name", "state_id"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = city::where("state_id", $request->state_id)->get(["city_name", "city_id"]);
        return response()->json($data);
    }
}
