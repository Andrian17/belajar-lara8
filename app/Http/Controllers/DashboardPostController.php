<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Category;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.post.userPost', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dashboard.post.createPost', [
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $validate['click_bait'] = Str::limit(strip_tags($request->content), 30);
        $validate['user_id'] = auth()->user()->id;

        Post::create($validate);

        return redirect('dashboard/post')->with('pesan', '<div class="alert alert-success mx-2" role="alert"> Postingan baru telah ditambahkan </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.post.detailPost', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.EditPost', [
            'category' => Category::all(),
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rl = '';
        if ($request->slug == $post->slug) {
            $rl = 'required';
            
        }else {
            $rl = 'required|unique:posts';
        }

        $validate = $request->validate([
            'judul' => 'required|max:255',
            'slug' => $rl,
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $validate['click_bait'] = Str::limit(strip_tags($request->content), 30);
        $validate['user_id'] = auth()->user()->id;

        Post::where('id', $post->id)->update($validate);

        return redirect('dashboard/post')->with('pesan', '<div class="alert alert-success mx-2" role="alert"> Postingan telah diubah! </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/post')->with('pesan', '<div class="alert alert-success mx-2" role="alert"> Postingan telah dihapus 
        </div>');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('status', 'anda telah logout');
    }

    //sluggable
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

}
