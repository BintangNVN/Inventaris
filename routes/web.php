<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('landing');
});


Route::post('/login', function (Request $request) {

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {

        $user = Auth::user();

        return response()->json([
            'success' => true,
            'redirect' => $user->role === 'admin' ? '/admin' : '/staff'
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Email atau password salah'
    ]);
});
Route::get('/admin', function () {
    return "Dashboard Admin";
});

Route::get('/staff', function () {
    return "Dashboard Staff";
});