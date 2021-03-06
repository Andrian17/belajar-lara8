<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;


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

// Route::get('/', function () {
   
//     return view('welcome');
// });

// Route::get('/post', function () {
//     // $data = [
//     //     'post' => Post::all()
//     // ];
//     // dd($data);
//     return view('posts.content', ['post' => Post::all()]);
// });

Route::get('/', [PostController::class, 'index']);
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);
//Route::get('/categories/{ctg}', [PostController::class, 'edit']);

// Route::get('/categories/{category:slug}', function (Category $category)
// {
//   //  dd($category->posts);
//     return view('posts.categoriePost', [
//         'posts' => $category->posts
//     ]);
// });


Route::get('/category', [PostController::class, 'category'])->middleware('auth');
//Route::get('/category/{category:slug}', [PostController::class, 'postByCategory'])->middleware('auth');
Route::get('/user', [PostController::class, 'user'])->middleware('auth');
//Route::get('/user/{user:name}', [PostController::class, 'postByUser'])->middleware('auth');


Route::get('/faker', function ()
{
    return "OK" . env('FAKER_LOCALE');
});


// Route::get('/post/{slug}', function ($slug) {
//      $data = [
//          'post' => Post::where('slug', $slug)->get()
//      ];
//     //($data);
//    // dd($post);
//     return view('posts.detailcontent',$data );
// });

Route::get('/about', function () {
    $data = [
        'title' => 'about',
        'nama' => 'Andrian',
        'hobi' => 'Coding'
    ];
    return view('posts.about', $data);
});

//route login
//kalau belum login panggil middleware 'guest' || function index hanya bisa diakses ketikan user belum melakukan login, kalau sudah login g bisa
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authtenticate']);
//route register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'simpanRegister']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'halo' => 'Halo Andrian'
    ]);
})->middleware('auth');

//Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
//Route::post('/dashboard/logout', [DashboardPostController::class, 'logout']);

//DashboardPost
// post sbg model baindidng
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/category/checkSlug', [CategoryController::class, 'checkSlug'])->middleware('auth');
//category sebagai route model baindidng

//menggunakan middleware
Route::resource('/dashboard/category', CategoryController::class)->middleware('admin')->except('show');

//menggunakan gate pada AppServiceProvider  dan  kernel
//Route::resource('/dashboard/category', CategoryController::class)->except('show');