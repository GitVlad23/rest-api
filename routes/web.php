<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getRequest', function() {
    if(Request::ajax())
    {
        return 'getRequest has loaded completely! ';
    }
});

Route::post('/register', function() {
    if(Request::ajax())
    {
        return Response::json(Request::all());
    }
});