<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
//use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    return view('welcome');
    //echo" This is Home page";
});

Route::get('/about', function () {
    return view('about');
    //echo "This is About Page";
}); //->middleware('check_age');

//Route::get('/contact', function () {
    //return view('welcome');
    //echo "This is Contact Page";
//});

Route::get('/contact',[ContactController::class, 'index'])->name('contact_page');

// Category Controller
Route::get('/category/all',[CategoryController::class, 'index'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'store'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

Route::get('/brand/all', [BrandController::class, 'index'])->name('all.brand');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');
