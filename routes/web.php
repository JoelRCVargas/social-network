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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Routers fanpage
Route::get('/admin/fanpage', [App\Http\Controllers\FanpageController::class, 'index'])->name('admin.fanpage');
Route::get('/admin/formFanPage', [App\Http\Controllers\FormFanpageController::class, 'index'])->name('admin.formFanPage');
Route::post('/admin/formFanPage', [App\Http\Controllers\FormFanpageController::class, 'create'])->name('admin.formpage.create');
Route::get('/admin/formFanPagePost', [App\Http\Controllers\formFanpagePostController::class, 'index'])->name('admin.formFanPagePost');

//referrals routes
Route::get('/referrals', [App\Http\Controllers\ReferredUserController::class, 'index'])->name('referrals');
Route::get('/referrals/list', [App\Http\Controllers\ReferredUserController::class, 'listReferrals'])->name('referrals.list');
Route::get('/referrals/link', [App\Http\Controllers\ReferralLinkController::class, 'index'])->name('referrals.link');

Auth::routes();
