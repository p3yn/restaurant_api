<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){        
            try{
                $users = User::get();
                return response()->json($users->all());
            } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 400);
            }
    }
    

    public function login(Request $request){
        $validar = $request->validate([
            'name' => 'required',
            'role' => 'required',
        ]);

        if(auth()->attempt($validar)){
            $user = User::where('name', $validar['name'])->first();
            $token = $user->createToken('authToken')->plainTextToken;
            return $token;
        }
        //return response()->json('sin autorización, bro!', 403);
    }

    public function store(Request $request){
        try{
            $user = $request->validate([
                'email' => ['required', Rule::unique('users', 'email')]
            ]);                            
            $user = User::create([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,                
            ]);
            return response()->json($user);
        } catch(Exeption $e){
            return response()->json(['error'=> $e -> getMessage()], 400);
        }
    }


    public function update(Request $request, $id){

        $client = User::find($id)->update([
            'name' => $request-post('name'),
            'email' => $request-post('email'),
            'password' => $request->get('password'),
            'role' => $request->get('role'),
        ]);               
    }
}
