<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index(){
        try{
            $client = Client::get();
            return response()->json($client->all());
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request){
        try{
            $client = $request->validate([
                'name' => ['required', Rule::unique('clients', 'name')]
            ]);

            $client = Client::create([
                'name' => $request->name,
                'phone'=> $request->phone,
                'reservation_date' => $request->reservation_date,
                'guests' => $request->guests,
            ]);
            return response()->json($client);
        } catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, $id){

        $client = Client::find($id)->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'reservation_date' => $request->get('reservation_date'),
            'guests' => $request->get('guests'),
        ]);
        
        
        //Client::where('id', $id)->update($request->all());
        //return response()->json()
    }
}
