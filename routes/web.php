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
    return view('landingpage');
})->name('start');

Route::get('/results', 'SearchClientController@dosearch')->name('results');

Route::post('/addskillset', function (){
    return view('addskillset');
})->name('addskillset');

Route::get('/job-apply-detail', 'JobDetailsController@showJobDetail')->name('jobdetail');
Route::get('/job-apply-details', 'JobDetailsController@showJobDetails')->name('jobdetails');

Route::get('/test', function (){
    return view('testpage');
})->name('test');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/searchresults', 'SearchClientController@dosearchapi')->name('searchresults');
