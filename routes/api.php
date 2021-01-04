<?php

    use App\Http\Controllers\PhotoController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\TestController;

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

    Route::get('/users', [TestController::class, 'getMethod']);

    Route::post('/users', [TestController::class, 'testPost']);
    Route::post('/photos',[PhotoController::class, 'store'])->middleware('photo');
