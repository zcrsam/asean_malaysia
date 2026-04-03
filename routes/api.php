<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// API routes for React frontend
Route::middleware('api')->group(function () {
    Route::get('/test', function () {
        return response()->json([
            'message' => 'API is working!',
            'status' => 'success',
            'timestamp' => now()
        ]);
    });

    Route::get('/user', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
            'authenticated' => auth()->check()
        ]);
    })->middleware('auth:sanctum');
});
