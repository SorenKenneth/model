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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api', 'namespace' => '\App\Http\Controllers\Api'
], function ($router) {
    Route::post('login', 'LoginController@login');
    Route::post('login-zalo-app', 'LoginWithZaloController@loginZaloApp');
    Route::post('logout', 'LoginController@logout');
    Route::post('refresh', 'LoginController@refresh');
    Route::post('me', 'LoginController@me');

    Route::group(['prefix' => 'student'], function () {
        Route::post('join', 'StudentController@join');
        Route::post('result', 'StudentController@result');
    });

    //ADMIN
});
Route::group(['middleware' => ['jwt.auth'], 'namespace' => '\App\Http\Controllers\Api'], function (){
    Route::post('generate-code', 'CommonController@generateCode')->name('api.generate-code');
    Route::post('switch-role', 'CommonController@switchRole')->name('api.switch-role');
    Route::post('upload_image', 'CommonController@uploadImage')->name('api.upload_image');
    require(__DIR__ . '/v1/admin.php');
    require(__DIR__ . '/v1/teacher.php');
    require(__DIR__ . '/v1/student.php');
});
