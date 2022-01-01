<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/home', function () {
    //return view('welcome');
    echo" This is Home page";
});

Route::get('/about', function () {
    return view('about');
    //echo "This is About Page";
})->middleware('check_age');

//Route::get('/contact', function () {
    //return view('welcome');
    //echo "This is Contact Page";
//});

Route::get('/contact',[ContactController::class, 'index']);

