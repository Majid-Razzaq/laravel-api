<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // public function index(){
    //     $array = [
    //        [
    //             'name' => 'Majid',
    //             'email' => 'majid@gmail.com',
    //         ],
    //         [
    //             'name' => 'Sarfaraz',
    //             'email' => 'sarfaraz@gmail.com'
    //         ],
    //     ];

    //     return response()->json([
    //         'message' => '2 users found',
    //         'data' => $array,
    //         'status' => true,
    //     ], 200);
    // }

    public function index(){
        $users = User::all();
        
        return response()->json([
            'status' => true,
            'users' => count($users). ' users found',
            'data' => $users,
        ],200);
    }

    public function show($id){
        $user = User::find($id);

        if($user != null){
            return response()->json([
                'status' => true,
                'message' => 'User found',
                'data' => $user,
            ],200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'user not found',
                'data' => [],
            ],200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Please fix the errors',
            ],200);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User added successfully.',
            'data' => $user,
        ],200);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        if($user == null){
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ],200);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Please fix the errors',
            ],200);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User updated successfully',
            'data' => $user,
        ],200);


    }
}
