<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory {

    protected $model = Tag::class;

    public function definition() {
        $faker = \Faker\Factory::create();

        return [
            'name' => $faker->word()
        ];
    }
}
