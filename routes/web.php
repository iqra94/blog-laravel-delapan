<?php

use App\Http\Controllers\Unpas\UnpasLoginController;
use App\Http\Controllers\Unpas\PostController;
use App\Http\Controllers\Unpas\UnpasRegisterController;
use App\Models\Unpas\UnpasCategory;
use App\Models\Unpas\UnpasUser;
use Illuminate\Support\Facades\Auth;
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

Route::get('/unpas-home', function(){
	return view('unpas-laravel8.home', [
		'active'=>'home'
	]);
});
Route::get('/unpas-about', function(){
	return view('unpas-laravel8.about', ['active'=>'about']);
});
Route::get('/unpas-posts', [PostController::class, 'index']);
// Route::get('/unpas-post/{id}', [PostController::class, 'show']);
Route::get('/unpas-post/{post:slug}', [PostController::class, 'show']);
Route::get('/unpas-categories', function(){
	return view('unpas-laravel8.categories', [
		'title'=>'Post Categories',
		'active'=>'categories',
		'categories'=>UnpasCategory::all(),
	]);
});
Route::get('unpas-login', [UnpasLoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('unpas-login', [UnpasLoginController::class, 'authenticate']);
Route::post('unpas-logout', [UnpasLoginController::class, 'logout']);

Route::get('unpas-register', [UnpasRegisterController::class, 'index'])->middleware('guest');
Route::post('unpas-register', [UnpasRegisterController::class, 'store']);
Route::get('unpas-dashboard', function(){
	return view('unpas-laravel8.unpas-dashboard.dash-content');
})->middleware('auth');
Route::get('unpas-dashboard/posts/checkSlug', [\App\Http\Controllers\Unpas\UnpasDashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('unpas-dashboard/posts', '\App\Http\Controllers\Unpas\UnpasDashboardPostController')->middleware('auth');
Route::resource('unpas-dashboard/categories', '\App\Http\Controllers\Unpas\UnpasAdminCategoryController')->except('show')->middleware('unpasIsAdmin');
// Route::resource('unpas-dashboard/categories', '\App\Http\Controllers\Unpas\UnpasAdminCategoryController')->except('show'); // coba  pake Gate
// Route::get('/unpas-dashboard', [UnpasDashboardController::class, 'index'])->middleware('auth');
// Route::get('/unpas-categories/{category:slug}', function(UnpasCategory $category){
// 	return view('unpas-laravel8.category', [
// 		'title'=>$category->name,
// 		'posts'=>$category->posts,
// 		'category'=>$category->name,
// 	]);
// });
// Route::get('/unpas-categories/{category:slug}', function(UnpasCategory $category){
// 	return view('unpas-laravel8.posts', [
// 		'title'=>"Post by Category : $category->name",
// 		'active'=>'categories',
// 		// 'posts'=>$category->posts,
// 		'posts'=>$category->posts->load('category', 'unpasUser'),
// 	]);
// });
// Route::get('/unpas-authors/{author:username}', function(UnpasUser $author){
// 	return view('unpas-laravel8.posts', [
// 		'title'=>"Post by Author : $author->name",
// 		'active'=>'categories',
// 		// 'posts'=>$author->unpasPosts,
// 		'posts'=>$author->unpasPosts->load('category', 'unpasUser'),
// 	]);
// });