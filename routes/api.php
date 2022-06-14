<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("/event/message", function ( Request $request){
    if( $request->message ) {
        event( new \App\Events\MessageNotification(
                \Carbon\Carbon::now()->addHours(6)->format('h:i:sa') . ': '. $request->message )
        );
        return [ 'success' => true ];
    }
    return [ 'success' => false ];
});
