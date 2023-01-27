<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use Mcamara\LaravelLocalization\LaravelLocalization;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
Route::group(['prefix'=> (new Mcamara\LaravelLocalization\LaravelLocalization)->setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function (){
    Route::group(['prefix' =>'offers'] , function() {
        Route::get('create', [\App\Http\Controllers\OfferController::class, 'create'])->name('create.offer');
        Route::post('store',[\App\Http\Controllers\OfferController::class,'store'])->name('offer.store');
        Route::get('index',[\App\Http\Controllers\OfferController::class,'index'])->name('offer.index');
        Route::get('edit/{id}',[\App\Http\Controllers\OfferController::class,'edit'])->name('offer.edit');
        Route::post('update/{id}',[\App\Http\Controllers\OfferController::class,'update'])->name('offer.update');
        Route::get('delete/{id}',[\App\Http\Controllers\OfferController::class,'delete'])->name('offer.delete');
    });

});
