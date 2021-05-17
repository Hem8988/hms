<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;
use App\Models\room_Category;
use Illuminate\Support\Facades\DB;

class roosAvalableController extends Controller
{
    public function view()
    {
        //get room category
        // $room_category = room_Category::all();

        // foreach ($room_category as $room_categorys)

        //count totla no of rooms
        // $count = room::where("idcategory", $room_categorys->id)
        //     ->count();
        //count avalable rooms which 

        $roomCount = room::all()
            ->count();

        $availableroom = room::where("status", '=', "1")->count();
        // dd($availableroom);


        // get all room with category and status in table F
        $room = DB::table('rooms')
            ->join('room__categories', 'rooms.idCategory', "=", 'room__categories.id')
            ->select('rooms.id', 'rooms.room_name', 'rooms.status', "room__categories.name")
            ->get();

        return view('RoomsAvalability', compact('room',  'roomCount', 'availableroom'));
    }
}
