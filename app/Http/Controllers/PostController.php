<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //dd(request('cari'));
        // $posts = Post::latest();
        // if (request('cari')) {
        //     $posts->where('judul', 'like', '%' .request('cari') . '%')
        //     ->orWhere('click_bait', 'like', '%' .request('cari'). '%');
        // }


        //untuk jenisPost
        $judul = '';
        if (request('category')) {
            $judul =  Category::firstWhere('slug', request('category'));
            $judul = 'Post in '. $judul->name;
        }elseif (request('user')) {
            $judul = User::firstWhere('name', request('user'));
            $judul = 'Post by '. $judul->name;
        }else {
            $judul = 'All Post';
        }

        return view('posts.content', [
            //mengambil semua postingan
            //'post' => Post::all(),
            //mengambil semua postingan terbaru
            //with() ==> eager Loading
            //'post' => Post::with(['user', 'category'])->latest()->get(),
            'title' => 'Post',
            'jenisPost' => $judul,
            //cari adalah function scope
            //'post' => Post::latest()->cari(request(['cari', 'category', 'user']))->get(),
            //untuk pagination
            'post' => Post::latest()->cari(request(['cari', 'category', 'user']))->paginate(4)->withQueryString()
            

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //route model Bainding ==> Parameter function harus sama dengan parameter route web ==>
        // $post = '/qwe/{$post:slug}'
        return view('posts.detailcontent', [
            "post" => $post,
            "title" => "detail post"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
       // return view('posts.categoriePost', ["post" => $ctg]);
    }

    public function postByCategory(Category $category)
    {
        //load('user') ==> nama fungsi di Model Post relasi ==> User

        // $data = [
        //     'posts' => $category->load('posts')
        // ];

        // return view('posts.sortPost', [
        //     'title' => 'Sort By Category',
        //     'post' => $category, 
        // ]);

      //  dd($category);

        return view('posts.content', [
            'title' => $category->name,
            'jenisPost' => $category->name,
            'post' => $category->posts
        ]);
    }

    public function user()
    {
        return view('posts.sortByUser', [
           // 'user' => User::with('post')->latest()->get()
           'title' => 'User',
           'sortBy' => 'User',
            'user' => User::all()
        ]);
    }

    public function category()
    {
        return view('posts.sortByCategory', [
           // 'user' => User::with('post')->latest()->get()
           'title' => 'Category',
           'sortBy' => 'Category',
            'categories' => Category::all()
        ]);
    }

    public function postByUser(User $user)
    {
        // return view('posts.sortPost', [
        //     'title' => 'Sort By User',
        //     'post' => $user
        // ]);

        return view('posts.content', [
            'jenisPost' => $user->name,
            'title' => 'Sort By User',
            'post' => $user->posts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
