<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\PictureController as picturectlr;
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

    ## register ##
    Route::post('/register', [AuthController::class, 'register']);

    ## login ##
    Route::post('/login', [AuthController::class, 'login']);

    ## get all picture ##
    Route::post('/pictures',[picturectlr::class,'search']);

    ## add picture ##
    Route::post('/pictures/new',[picturectlr::class, 'store'])->middleware('App\Http\Middleware\React');

    ## get uniq picture##
    Route::get('/pictures/{id}',[picturectlr::class, 'show'])->middleware('App\Http\Middleware\React');

    ## search pictures ##
    Route::POST('/pictures/search',[picturectlr::class, 'search']);
