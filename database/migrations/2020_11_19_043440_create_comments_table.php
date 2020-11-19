<?php

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration {

    public function up() {
        Schema::create(with(new Comment)->getTable(), function (Blueprint $table) {
            $table->id();

            $table->string('author_name')->default('Олег Тинькофф');
            $table->string('theme');
            $table->string('body');
            $table->unsignedBigInteger('article_id');

            $table->foreign('article_id')
                ->references('id')
                ->on(with(new Article())->getTable())
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists(with(new Comment)->getTable());
    }
}
