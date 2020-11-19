<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration {

    public function up() {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('article_id')
                ->references('id')
                ->on(with(new Article)->getTable())
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on(with(new Tag)->getTable())
                ->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('article_tag');
    }
}
