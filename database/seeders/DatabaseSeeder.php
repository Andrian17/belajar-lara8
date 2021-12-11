<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Category;
use App\Models\Author;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        //  User::factory(5)->create();

        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-programming'
        // ]);
        // Category::create([
        //     'name' => 'Teknologi Informasi',
        //     'slug' => 'teknologi-informasi'
        // ]);
        // Category::create([
        //     'name' => 'sport',
        //     'slug' => 'sport'
        // ]);

        // Post::factory(40)->create();
         Post::factory(20)->create();

        // User::create([
        //     'name' => 'Andrian',
        //     'email' => 'andrian@gmail.com',
        //     'password' => md5('qwe')
        // ]);

        // Post::create([
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'judul' => 'artikel pertama',
        //     'slug' => 'artikel-pertama',
        //     'click_bait' => 'orem ipsum dolor sit amet consectetur adipisicing elit. Eligendi laborum voluptate aliquam, est in iusto voluptatum qui numquam, blanditiis culpa expedita perferendis placeat',
        //     'content' => 'nam error commodi tempora ab
        //     voluptas quisquam dolorem? Deserunt, ea eligendi, iusto minus id asperiores
        //     natus odio cum, ad laborum eius. Labore saepe alias incidunt aliquid vitae earum
        //     optio quis! Dolorem atque, officia nisi nulla ratione sit saepe. Commodi facere
        //     error excepturi sed dolor consectetur numquam provident! Repellat possimus
        //     fugiat illum! Accusantium, aliquam voluptatibus. Recusandae in necessitatibus
        //     architecto molestiae molestias repellendus dolorum facere qui id sit,
        //     perspiciatis nobis saepe, magni, iure excepturi fugiat deleniti autem explicabo
        //     atque nulla commodi provident quisquam. A voluptatum sed autem odit officiis
        //     debitis quod, accusamus, soluta fugiat doloremque ducimus eligendi assumenda
        //     ipsam alias voluptas cumque. Officia delectus voluptatem fuga repudiandae eaque,
        //     nam iure adipisci impedit harum!'
        // ]);
      
    }
}
