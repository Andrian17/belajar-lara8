<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(mt_rand(3, 8)),
            'slug' => $this->faker->unique()->slug(),
            'click_bait' => $this->faker->sentence(mt_rand(15, 25)), 
            'content' => $this->faker->paragraph(mt_rand(4, 7)),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
