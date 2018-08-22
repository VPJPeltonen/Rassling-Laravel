<?php

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

	$painijat = DB::table('painijat')->get();

    return view('welcome' , compact('painijat'));
});
 
Route::get('/wrestlers/{wrestler}', function ($nimi) {

	$painijat = DB::table('painijat')->find($nimi);

	dd($painijat);

    return view('wrestlers.show ' , compact('painijat'));
});
 