<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder {

    public function run() {
        $comments = Comment::factory()->count(20)->make();
        $comments->each(function (Comment $comment) {
            $comment->article()->associate(Article::inRandomOrder()->first()->id);
            $comment->save();
        });
    }
}
