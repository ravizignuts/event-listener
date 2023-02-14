<?php

use App\Mail\userlogin;
use App\Event\UserCreated;
use Illuminate\Http\Request;
use App\Events\SendMailEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->group(function(){

    Route::get('event',function(){
        $user = [
            'name'  => 'abc',
            'email'  => 'abc@gmail.com',
        ];
        // dd($user['email']);
        // Mail::to($user['email'])->send(new userlogin($user));
        event(new SendMailEvent($user));
    });
// });
