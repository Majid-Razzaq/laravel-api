<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $array = [
           [
                'name' => 'Majid',
                'email' => 'majid@gmail.com',
            ],
            [
                'name' => 'Sarfaraz',
                'email' => 'sarfaraz@gmail.com'
            ],
        ];

        return response()->json([
            'message' => '2 users found',
            'data' => $array,
            'status' => true,
        ], 200);
    }
}
