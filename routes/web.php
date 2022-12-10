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
    return view('auth.login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/user/listar', [App\Http\Controllers\HomeController::class, 'listUser'])->name('home.user.list');
Route::get('/home/user/listarf', [App\Http\Controllers\HomeController::class, 'listFanpage'])->name('home.user.listf');

//Routers fanpage
Route::get('/fanpage/{id}/{name}', [App\Http\Controllers\FanpageController::class, 'index'])->name('admin.fanpage');
Route::get('/admin/formFanPage', [App\Http\Controllers\FormFanpageController::class, 'index'])->name('admin.formFanPage');
Route::post('/admin/formFanPage', [App\Http\Controllers\FormFanpageController::class, 'create'])->name('admin.formpage.create');
Route::get('/admin/formFanPagePost', [App\Http\Controllers\formFanpagePostController::class, 'index'])->name('admin.formFanPagePost');

Route::post('/admin/fanpage/follower/create', [App\Http\Controllers\FanpageController::class, 'registerReferredUsers'])->name('admin.fanpage.follower.create');
Route::post('/admin/fanpage/follower/delete', [App\Http\Controllers\FanpageController::class, 'removeReferredUsersByIdAndToken'])->name('admin.fanpage.follower.delete');

//Routers user fanpage
Route::get('/user/fanpage', [App\Http\Controllers\UserFanPageListController::class, 'index'])->name('user.fanpage');
Route::get('/user/fanpage/list', [App\Http\Controllers\UserFanPageListController::class, 'listFanpagesByReferral'])->name('user.fanpage.list');

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


//Routers users
Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user');
Route::get('/admin/user/listar', [App\Http\Controllers\UserController::class, 'listUser'])->name('admin.user.list');
Route::post('/admin/user/listar', [App\Http\Controllers\UserController::class, 'prepareUserById'])->name('admin.user.prepare');
Route::post('/admin/user/update', [App\Http\Controllers\UserController::class, 'updateUser'])->name('admin.user.update');

//Routers adminusers

Route::get('/admin/user/adminuserlistar', [App\Http\Controllers\AdminUserController::class, 'prepareAdminUserById'])->name('admin.user.adminuserprepare');
Route::post('/admin/user/adminuserupdate', [App\Http\Controllers\AdminUserController::class, 'updateAdminUser'])->name('admin.user.adminuserupdate');

//change pwd
Route::post('/user/password/update', [App\Http\Controllers\AdminUserController::class, 'updatePwd'])->name('admin.user.password.update');

//referrals routes
Route::get('/referrals', [App\Http\Controllers\ReferredUserController::class, 'index'])->name('referrals');
Route::get('/referrals/list', [App\Http\Controllers\ReferredUserController::class, 'listReferrals'])->name('referrals.list');
Route::get('/referrals/link', [App\Http\Controllers\ReferralLinkController::class, 'index'])->name('referrals.link');

//Routers comments
Route::post('/fanpage/comment/create', [App\Http\Controllers\FanpageController::class, 'registerCommentByPublication'])->name('comment.create');
Route::post('/fanpage/comment/delete', [App\Http\Controllers\FanpageController::class, 'deleteComment'])->name('comment.delete');
Route::post('/fanpage/comment/update', [App\Http\Controllers\FanpageController::class, 'updateComment'])->name('comment.update');

//Routers Likes
Route::post('/fanpage/like/create', [App\Http\Controllers\FanpageController::class, 'registerLike'])->name('like.create');

Auth::routes();
