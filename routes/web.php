<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\category;
use App\Models\post;
use App\Mail\newpost;
use App\Models\tag;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('mainpage');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'postss'])->name('allpost');
Route::get('/post/{slug}', [App\Http\Controllers\HomeController::class, 'singlepost'])->name('singlepost');
Route::get('/category/post/{slug}', [App\Http\Controllers\HomeController::class, 'categoryPost'])->name('categoryPost');
Route::get('/tag/post/{name}', [App\Http\Controllers\HomeController::class, 'tagPost'])->name('tagPost');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::post('/comments/{post}', [App\Http\Controllers\massageController::class,'message'])->name('message')->middleware('auth');
Route::post('/comments/reply/{message}', [App\Http\Controllers\replycommentController::class,'index'])->name('reply.comment')->middleware('auth');
Route::post('/post/like/{post}', [App\Http\Controllers\HomeController::class,'postLike'])->name('PostLike')->middleware('auth');



Auth::routes();
route::middleware('auth')->group(function (){
//    adminMiddleware///////////////////////////////////////
    Route::prefix('admin')->middleware('admin')->group(function (){
        Route::get('/dashboard',[App\Http\Controllers\admin\Dashboard::class,'index'])->name('dashboard');
        Route::get('/user',[App\Http\Controllers\admin\UserController::class,'index'])->name('user');
        Route::get('/update/{id}',[App\Http\Controllers\admin\UserController::class,'edit'])->name('update-user');
        Route::post('/update/{id}',[App\Http\Controllers\admin\UserController::class,'update']);
        Route::get('/delete/{id}',[App\Http\Controllers\admin\UserController::class,'userdelete'])->name('userdelete');

//        category ////////////////////////
        Route::get('/category',[App\Http\Controllers\admin\CategoryController::class,'index'])->name('category');
        Route::get('/category/create',[App\Http\Controllers\admin\CategoryController::class,'create'])->name('category_create');
        Route::post('/category/create',[App\Http\Controllers\admin\CategoryController::class,'store']);
        Route::get('/category/edit/{id}',[App\Http\Controllers\admin\CategoryController::class,'edit'])->name('category_edit');
        Route::post('/category/edit/{id}',[App\Http\Controllers\admin\CategoryController::class,'update']);
        Route::get('/category/delete/{id}',[App\Http\Controllers\admin\CategoryController::class,'delete'])->name('delete');
// Post //////////////////
//        Route::resource('/post', postController::class);
        Route::get('/post',[App\Http\Controllers\admin\postController::class,'index'])->name('post');
        Route::get('/post/create',[App\Http\Controllers\admin\postController::class,'create'])->name('post_create');
        Route::post('/post/create',[App\Http\Controllers\admin\postController::class,'store']);
        Route::get('/post/edit/{id}',[App\Http\Controllers\admin\postController::class,'edit'])->name('post_update');
        Route::post('/post/edit/{id}',[App\Http\Controllers\admin\postController::class,'update']);
        Route::get('/post/view/{id}',[App\Http\Controllers\admin\postController::class,'show'])->name('view');
        Route::get('/post/delete/{id}',[App\Http\Controllers\admin\postController::class,'destroy'])->name('destroy');

//        profile///////////////
        Route::get('profile',[App\Http\Controllers\admin\Dashboard::class,'showprofile'])->name('profile');
        Route::post('profile',[App\Http\Controllers\admin\Dashboard::class,'update']);
        Route::post('profile/password',[App\Http\Controllers\admin\Dashboard::class,'change_password'])->name('password');

//        comments Rout

        Route::get('/comments', [App\Http\Controllers\admin\commentController::class,'index'])->name('maincomment');
        Route::get('/comments/delete/{id}', [App\Http\Controllers\admin\commentController::class,'destroy'])->name('comments.Delete');
    });

//    user middleware//////////////////////////////////////
    Route::prefix('user')->middleware('user')->group(function (){
        Route::get('/dashboard',[App\Http\Controllers\user\Dashboard::class,'index'])->name('home');

    });

});


//view composer
View::composer('layouts.frontend.partials.sideber', function ($view) {
    $categories = category::all()->take(10);
    $recenttags = tag::all();
    $recentPosts = post::latest()->take(3)->get();
    return $view->with('categories', $categories)->with('recentPosts', $recentPosts)->with('recenttags', $recenttags);
});


//send mail
Route::get('/send', function (){
    $post= post::find(5);
    Mail::to('zinnah@mail.com')
        ->cc(['sharmin@gmail.com','tasfia@gmail.com'])->queue(new newpost($post));
    return (new App\Mail\newpost($post))->render();

});

