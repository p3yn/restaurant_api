<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function index(Request $request){ 
        try{
            $order = Order::get();
            return response()->json($order->all());
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    public function store(Request $request){
        try{            
            $order = $request->validate([
                'client' => ['required', 'exists:clients,name']
            ]);
            $order = Order::create([
                'client' => $request->client,
                'items' => $request->items,
            ]);
            return response()->json($request);
        } catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
            }
    }

    
}
