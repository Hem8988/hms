<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\reservation;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

use Session;

class paymentcontroller extends Controller
{
    public function getamount()
    {
        $userData = reservation::all();
        $paymentData = payment::all();
        return view('amout', compact('userData', 'paymentData'));
    }

    public function success()
    {
        return view('success');
    }

    public function payment(Request $request)
    {

        $paymentData = payment::where("rId", $request->rId)->get('rId');
        foreach ($paymentData as $paymentss) {
            if ($paymentss->rId == $request->rId) {
                $amount = $request->input('amount');

                $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

                // Orders
                $order  = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100, 'currency' => 'INR')); // Creates order
                $orderId = $order['id'];

                payment::where("rId", $request->rId)
                    ->update(["amount" => $amount, "payment_id" => $orderId]);
                $data = array(
                    'order_id' => $orderId,
                    'amount' => $amount
                );

                return redirect()->route('index')->with('data', $data);
            } else {
                return redirect()->route('index')->with('you data is not available!');
            }
        }
    }

    public function pay(Request $request)
    {
        $data = $request->all();

        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done = true;
        $user->razorpay_id = $data['razorpay_payment_id'];

        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        try {
            $attributes = array(
                'razorpay_signature' => $data['razorpay_signature'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_order_id' => $data['razorpay_order_id']
            );
            $order = $api->utility->verifyPaymentSignature($attributes);
            $success = true;
        } catch (SignatureVerificationError $e) {
            $succes = false;
        }

        if ($success) {
            $user->save();
            // $accountId = "acc_GzUhfp1NSdvkRC";
            // $amount =  $user->amount * 10;
            // $transferOptions = array('transfers' => [['account' => $accountId, 'amount' => $amount, 'currency' => 'INR']]);
            // $transfer  = $api->payment->fetch($data['razorpay_payment_id'])->transfer($transferOptions);
            return redirect('/success');
        } else {
            return redirect()->route('error');
        }
    }


    public function error()
    {
        return view('error');
    }
}
