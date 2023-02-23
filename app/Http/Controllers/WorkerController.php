<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(){
        try{
            $worker = Worker::get();
            return response->json($worker->all());
        } catch (Exception $e){
            return response()->json(['error' => $e->Message()], 400);
        }
    }

    public function store(){
        //
    }
}
