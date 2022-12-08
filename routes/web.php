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

//Routers fanpagelist
Route::get('/admin/fanpage/list', [App\Http\Controllers\FormFanpageController::class, 'fanpagelist'])->name('admin.fanpagelist');
Route::get('/admin/fanpage/listar', [App\Http\Controllers\FormFanpageController::class, 'listFanPage'])->name('admin.fanpage.list');
Route::post('/admin/fanpage/listar', [App\Http\Controllers\FormFanpageController::class, 'prepareFanpageById'])->name('admin.fanpage.prepare');
Route::post('/admin/fanpage/update', [App\Http\Controllers\FormFanpageController::class, 'updateFanpage'])->name('admin.fanpage.update');
Route::get('/admin/fanpage/delete', [App\Http\Controllers\FormFanpageController::class, 'deleteFanpage'])->name('admin.fanpage.delete');

//Routers publications
Route::get('/admin/publication/fanpage', [App\Http\Controllers\PublicationController::class, 'index'])->name('admin.publication');
Route::post('/admin/publication/fanpage', [App\Http\Controllers\PublicationController::class, 'createPublication'])->name('admin.publication.create');
Route::get('/admin/publication/listar', [App\Http\Controllers\PublicationController::class, 'listPublications'])->name('admin.publication.list');
Route::post('/admin/publication/listar', [App\Http\Controllers\PublicationController::class, 'preparePublicationById'])->name('admin.publication.prepare');
Route::post('/admin/publication/update', [App\Http\Controllers\PublicationController::class, 'updatePublication'])->name('admin.publication.update');
Route::get('/admin/publication/delete', [App\Http\Controllers\PublicationController::class, 'deletePublication'])->name('admin.publication.delete');






//referrals routes
Route::get('/referrals', [App\Http\Controllers\ReferredUserController::class, 'index'])->name('referrals');
Route::get('/referrals/list', [App\Http\Controllers\ReferredUserController::class, 'listReferrals'])->name('referrals.list');
Route::get('/referrals/link', [App\Http\Controllers\ReferralLinkController::class, 'index'])->name('referrals.link');

Auth::routes();
