<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tot/{id?}/attendees', function($id = 1){
    return App\TOTTraining::where('TOT_ID', $id)->get()->toJson();
});

Route::get('/tot/attendee/{id}', function($id = 1){
    return App\TOTTraining::where('ID', $id)->first()->toJson();
});

Route::get('providertrainer/{id}', function($id) {
    return App\TPPTrainer::where('Organisation', $id)->get()->toJson();
})->name('api.providertrainer');
