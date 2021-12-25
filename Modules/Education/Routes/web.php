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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

Route::prefix('edu')->group(function() {
    Route::get('/', 'EducationController@index');
    Route::any('/create', 'VerificationController@create');
    Route::get('/token', 'VerificationController@ty');
    Route::resource('courses','CourseController');
});
