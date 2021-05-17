<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;
use App\Models\room;
use App\Models\payment;

use Illuminate\Support\Facades\Validator;

class reservationController extends Controller
{
    public function __construct()
    {
        $this->reservation = new reservation();
        $this->room = new room();
        $this->payment = new payment();
    }


    public function insertreservation(Request $request)
    {

        // $name = $request->input('fname');
        // dd($name);
        // die;
        $reservation = new reservation();
        $payment = new payment();
        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:reservations',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'phone' => 'required|unique:reservations',
            'troom' => 'required',
            'bed' => 'required',
            'nroom' => 'required',
            'meal' => 'required',
            'cin' => 'required',
            'cout' => 'required',

        ]);
        if ($validatedData->fails()) {
            return redirect('/error')
                ->withErrors($validatedData)
                ->withInput();
        } else {

            // reservation data
            $reservation::create($request->all());

            //change status of room
            room::where("id", $request->nroom)
                ->update(["status" => '0']);

            // save data for payment
            $payment->fname = $request->fname;
            $payment->lname = $request->lname;
            $payment->email = $request->email;
            $payment->phone = $request->phone;
            $payment->save();
            return json_encode(array(
                "statusCode" => 200
            ));
        }
    }
}
