<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\payment;
use App\Models\reservation;
use Illuminate\Support\Facades\DB;

class reinformationController extends Controller
{
    public function reservationInformation()
    {
        $userData = Auth::user();
        $information = DB::table('reservations')
            ->join('countries', 'reservations.country', "=", 'countries.country_id')
            ->join('states', 'reservations.state', "=", 'states.state_id')
            ->join('cities', 'reservations.city', "=", 'cities.city_id')
            ->join('room__categories', 'reservations.troom', "=", 'room__categories.id')
            ->join('rooms', 'reservations.nroom', "=", 'rooms.id')
            ->where("email", $userData->email)
            ->select('reservations.*', 'countries.country_name', 'states.state_name', 'cities.city_name', 'room__categories.name', 'rooms.room_name')
            ->get();
        $paymentData = payment::where("email", $userData->email)
            ->get(["amount", "payment_done"]);
        return view('reinformation', compact('information', 'paymentData'));
    }
}
