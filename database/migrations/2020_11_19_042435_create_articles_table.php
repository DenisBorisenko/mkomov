<?php

use App\Models\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration {

    public function up() {
        Schema::create(with(new Article)->getTable(), function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->bigInteger('views')->default(0);
            $table->bigInteger('likes')->default(0);

            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists(with(new Article)->getTable());
    }
}
