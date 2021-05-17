<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\payment;
use App\Models\reservation;

class reinformationController extends Controller
{
    public function reservationInformation()
    {
        $userData = Auth::user();
        $reservationInformation = reservation::where("email", $userData->email)
        ->get(); 
        $paymentData = payment::where("email", $userData->email)
            ->get(["amount", "payment_done"]);
          return view('reinformation', compact('reservationInformation','paymentData'));
    }
}
