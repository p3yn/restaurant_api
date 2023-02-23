<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index(Request $request){
        try{
            $role = Role::get();
            return response()->json($role->all());
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function create(Request $request){
        $role = $request->validate([
            'role' => ['required', Rule::unique('roles', 'role')]
        ]);
        $role = Role::create([
            'role' => $request->role,            
        ]);
        return response()->json($role->all());
    }

    
}
