<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory {

    protected $model = Article::class;

    public function definition() {
        $faker = \Faker\Factory::create();

        return [
            'image'       => 'https://free4kwallpapers.com/uploads/originals/2015/11/10/sunrise-on-yosemite-valley-yosemite-national-park-california-wallpaper.jpg',
            'title'       => $faker->sentence(),
            'description' => $faker->paragraph(10),
        ];
    }
}
