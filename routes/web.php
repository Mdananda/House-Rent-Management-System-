<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;

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
    return view('Wellcome');
});
Route::get('/', [HomeController::class,'index']);

Route::middleware ('auth')->group(function(){
Route::get('/redirects', [HomeController::class,'redirects']);
#Route::get('about','LinkController')->name('about');
Route::get('/about', [HomeController::class,'about']);
Route::get('/contact', [HomeController::class,'contact']);

Route::get('/users', [AdminController::class,'user']);
Route::get('/deletemenu/{id}', [AdminController::class,'deletemenu']);
Route::get('/deleteuser/{id}', [AdminController::class,'deleteuser']);
Route::get('/property', [AdminController::class,'property']);
Route::post('/uploadproperty', [AdminController::class,'upload']);
Route::post('/addcart/{id}', [HomeController::class,'addcart']);
Route::get('/showcart/{id}', [HomeController::class,'showcart']);
Route::get('/remove/{id}', [HomeController::class,'remove']);
Route::post('/orderconfirm', [HomeController::class,'orderconfirm']);
Route::get('/stripe/{totalprice}', [HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/search', [HomeController::class,'search']);
Route::get('/searchprice', [HomeController::class,'searchprice']);
#Route::post('/comments', [CommentController::class,'store']);
Route::post('/add_comment', [HomeController::class,'add_comment']);
Route::post('/add_reply', [HomeController::class,'add_reply']);

});

Route::get('/dashboard', function ()
{
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

