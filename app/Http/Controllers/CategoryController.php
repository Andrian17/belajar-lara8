<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menggunakan middleware => isAdmin
        // if (auth()->guest() || auth()->user()->username != 'andrian19' ) {
        //     abort(403);
        // }


        //menggunakan gate => authorization
        //$this->authorize('admin');


        return view('dashboard.categories.listCategory', [
            'category' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ];
        $valid = $request->validate($rule);
          //jika gambar diupload
          if ($request->file('gambar')) {
            $valid['gambar'] = $request->file('gambar')->store('folder-gambar');
        }

        Category::create($valid);

        return redirect('dashboard/category')->with('pesan', '<div class="alert alert-success mx-2" role="alert"> Category baru telah ditambahkan </div>');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.EditCategories', [
            'categories' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rl = '';
        if ($request->slug == $category->slug) {
            $rl = 'required';
            
        }else {
            $rl = 'required|unique:categories';
        }
        $rule = [
            'name' => 'required',
            'slug' => $rl,
            'gambar' => 'image|file|max:2048'
        ];

        $validate = $request->validate($rule);

        //jika gambar diupload
        if ($request->file('gambar')) {

            //menghapus gambar lama
            if ($category->gambar) {
                Storage::delete($category->gambar);
            }
            $validate['gambar'] = $request->file('gambar')->store('folder-gambar');
        }

        Category::where('id', $category->id)->update($validate);
        return redirect('dashboard/category')->with('pesan', '<div class="alert alert-success mx-2" role="alert"> Category telah diubah! </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        if ($category->gambar) {
            Storage::delete($category->gambar);
        }
        
        return redirect('/dashboard/category')->with('pesan',
                '<div class="alert alert-success mx-2" role="alert"> Category telah dihapus </div>');
    }

        //sluggable
        public function checkSlug(Request $request)
        {
            $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
            return response()->json(['slug' => $slug]);
        }

}
