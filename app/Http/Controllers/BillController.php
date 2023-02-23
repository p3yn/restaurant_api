<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BillController extends Controller
{
    public function index(Request $request){
        try{
            $bill = $request->validate([
                'client' => ['required', 'exists:clients,name']
            ]);
            $bill = Bill::get();
            return response()->json($bill->all());
        } catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
            }
    }

    public function store(Request $request){
        try{
            $bill = $request->validate([
                'client' => ['required', 'exists:clients,name']
            ]);
            $bill = Bill::create([
                'order' => $request->order,
                'client' => $request->client,
                'total' => $request->total,
            ]);
            return response()->json($request);
        } catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
            }
    }

}
