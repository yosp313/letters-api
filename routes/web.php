<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Route::get("/", function () {
    return "Hello World";
});


Route::apiResource("/api/v1/letters", LetterController::class);


Route::get("/csrf", function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();
    return response()->json([
        "token" => $token
    ],200);
});

Route::get("/setup", function () {
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'admin'
    ];

    if(!Auth::attempt($credentials)){
        $user = new User();

        $user->name = "Admin";
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);

        $user->save();

        if(Auth::attempt($credentials)){
            $user = Auth::user();

            $adminToken = $user->createToken('admin');

        }
    }
});
