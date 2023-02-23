<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){
        try{
            $payment = Payment::get($request->name);
            return response()->json($payment->all());
        } catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
            }
    }

    
}
