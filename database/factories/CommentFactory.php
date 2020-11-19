<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory {

    protected $model = Comment::class;

    public function definition() {
        $faker = \Faker\Factory::create();

        return [
            'author_name' => $faker->name(),
            'theme'       => $faker->paragraph(),
            'body'        => $faker->paragraph(),
        ];
    }
}
