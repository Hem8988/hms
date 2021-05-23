<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;
use App\Models\room;
use App\Models\payment;
use App\Models\room_Category;
use Illuminate\Support\Facades\DB;


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

        $reservation = new reservation();
        $payment = new payment();
        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'phone' => 'required',
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

            DB::table('reservations')->insert([

                'title' => $request['title'],
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'email' => $request['email'],
                'country' => $request['country'],
                'state' => $request['state'],
                'city' => $request['city'],
                'phone' => $request['phone'],
                'troom' => $request['troom'],
                'bed' => $request['bed'],
                'nroom' => $request['nroom'],
                'meal' => $request['meal'],
                'cin' => $request['cin'],
                'cout' => $request['cout'],

            ]);

            $id = DB::getPdo()->lastInsertId();

            room::where("id", $request->nroom)
                ->update(["status" => '0']);


            // save data for payment
            $r = Room::find($request->nroom);
            $cate = room_Category::find($r->idCategory);
            $day = (strtotime($request->cout) - strtotime($request->cin)) / 60 / 60 / 24;
            $payment->amount = $cate->price * $day;
            $payment->rid =  $id;
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
    public function getdetail(Request $request)
    {
        $id =  $request->route('id');

        $reservation = DB::table('reservations')
            ->join('countries', 'reservations.country', "=", 'countries.country_id')
            ->join('states', 'reservations.state', "=", 'states.state_id')
            ->join('cities', 'reservations.city', "=", 'cities.city_id')
            ->join('room__categories', 'reservations.troom', "=", 'room__categories.id')
            ->join('rooms', 'reservations.nroom', "=", 'rooms.id')
            ->where('reservations.id', '=', $id)
            ->select('reservations.*', 'countries.country_name', 'states.state_name', 'cities.city_name', 'room__categories.name', 'rooms.room_name')
            ->get();


        $paymentData = payment::where("rId", $id)
            ->get(["amount", "payment_done"]);

        return view('admin.reservation.viewDetails', compact('reservation', 'paymentData'));
    }

    public function Delete($id)
    {   
        $bill=payment::where('rId',$id)->get();
          

        $reservation=reservation::find($id);
        $reservation->status=1;
        $room=Room::find($reservation->nroom);
        $room->status=1;
        $room->save();
        // $reservation->save();
        return view('admin.reservation.list');
     }

     public function Edit($id)
     {
         $room=Room::all();
        //  $reservation=reservation::find($id);
         $reservation = DB::table('reservations')
         ->join('countries', 'reservations.country', "=", 'countries.country_id')
         ->join('states', 'reservations.state', "=", 'states.state_id')
         ->join('cities', 'reservations.city', "=", 'cities.city_id')
         ->join('room__categories', 'reservations.troom', "=", 'room__categories.id')
         ->join('rooms', 'reservations.nroom', "=", 'rooms.id')
         ->where('reservations.id', '=', $id)
         ->select('reservations.*', 'countries.country_name', 'states.state_name', 'cities.city_name', 'room__categories.name', 'rooms.room_name')
         ->get();
         return view('admin.reservation.edit',['reservation'=>$reservation,'room'=>$room]);
     }

     public function EditPost(Request $request,$id)
	{   


        $validatedData = Validator::make($request->all(), [
            'title' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'phone' => 'required',
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

            reservation::create($request->all());
        return json_encode(array(
            "statusCode"=>200
        ));
    }
            
	}
}
