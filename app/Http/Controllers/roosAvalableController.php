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

        $count = room::all()->count();
        $room = DB::table('rooms')
            ->join('room__categories', 'rooms.idCategory', "=", 'room__categories.id')
            ->select('rooms.id', 'rooms.room_name', 'rooms.status', "room__categories.name")
            ->get();
        return view('RoomsAvalability', compact('room', 'count'));
    }
}
