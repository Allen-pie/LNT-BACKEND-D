<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return response()->json([
            'success' => true,
            'message' => 'here are the list of all users',
            'data' => $users
        ], 200);

    }

    public function store(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'password' => 'required',
                'email' => 'required|email|unique:users'
            ]);

            $user = User::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'sucessfully saved user',
                'data' => $user
            ], 201);

        }catch(Exception $error){
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, int $id){

       try {
            $validated = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $id
            ]);

            $user = User::findOrFail($id);

            $user->update($validated);
            
            return response()->json([
                'success' => true,
                'message' => 'sucessfully updated user yay',
                'data' => $user
            ], 200);

       }catch(Exception $error){
            return response()->json([
                'message' => $error->getMessage()
            ], 500);
       }

    }

    public function delete(int $id){

        try {
            $user = User::findOrFail($id);
            
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'sucessfully delete user'
            ], 200);

        }catch(Exception $error){
            return response()->json([
                    'message' => $error->getMessage()
            ], 500);
        }
    }

}
