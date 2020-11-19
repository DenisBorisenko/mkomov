<?php

use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration {

    public function up() {
        Schema::create(with(new Tag)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
    }

    public function down() {
        Schema::dropIfExists(with(new Tag)->getTable());
    }

}
