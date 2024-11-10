<?php

use App\Http\Controllers\API\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', function(){
    return "Apis for blog project, Version: 1.0.0";
});

Route::get('/posts', [APIController::class, 'showAllPost']);
Route::get('/catagories', [APIController::class, 'showAllCategory']);