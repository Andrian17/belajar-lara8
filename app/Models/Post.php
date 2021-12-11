<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Isset_;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];
   // protected $fillable = ['slug', 'judul', 'click_bait', 'content'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    //membuat scope function untuk pencarian
    public function scopeCari($query, array $req)
    {
        // if (isset($filter['cari']) ?? false) {
        //     return $query->where('judul', 'like', '%' .request('cari') . '%')->orwhere('click_bait', 'like', '%' .request('cari'). '%');
        // }

        $query->when($req['cari'] ?? false, function ($query, $cari)
        {
            // 'judul' 'click_bait' => nama field
            return $query->where('judul', 'like', '%' . $cari . '%')
            ->orwhere('click_bait', 'like', '%' . $cari . '%');
        });

        $query->when($req['category'] ?? false, function ($query, $category){

            // 'category' => nama relasi atau function category
            return $query->whereHas('category', function($query) use ($category){
                // 'slug' => nama field
                $query->where('slug', $category);
            });
        });

        $query->when($req['user'] ?? false, function ($query, $user){
                // 'user' => nama relasi atau function user
            return $query->whereHas('user', function($query) use ($user){
                // 'name' => nama field pada tabel user
                $query->where('name', $user);
            });
        });

    }

}
