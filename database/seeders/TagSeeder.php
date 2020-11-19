<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder {

    public function run() {
        $tags = Tag::factory()->count(20)->create();

        $tags->each(function (Tag $tag) {
            $tag->articles()->attach(Article::inRandomOrder()->first()->id);
        });
    }
}
