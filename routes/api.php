<?php

use App\Http\Controllers\UserController;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);


Route::post('/test-mail', function(Request $request){
   try {
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);

        Mail::to($validated['email'])->send(new TestMail($validated['name']));

        return response()->json([
            'message' => 'email sucessfully sent'
        ]);

   }catch(Exception $error){
        return response()->json([
            'message' => $error->getMessage()
        ], 500);
   }
});