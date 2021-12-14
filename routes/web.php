<?php

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


Route::get('/category', [PostController::class, 'category']);
Route::get('/category/{category:slug}', [PostController::class, 'postByCategory']);
Route::get('/user', [PostController::class, 'user']);
Route::get('/user/{user:name}', [PostController::class, 'postByUser']);


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
Route::get('/login', [LoginController::class, 'index']);
//route register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'simpanRegister']);
