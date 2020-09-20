<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('temp_path_01');
            $table->string('temp_path_02')->nullable($value = true);
            $table->string('temp_path_03')->nullable($value = true);
            $table->string('read_temp_path_01');
            $table->string('read_temp_path_02')->nullable($value = true);
            $table->string('read_temp_path_03')->nullable($value = true);
            $table->string('pro_name', 30);
            $table->string('flavor', 20);
            $table->integer('weight');
            $table->integer('price');
            $table->integer('per_protein');
            $table->boolean('made');
            $table->integer('type');
            $table->integer('taste_good');
            $table->integer('cost_paf');
            $table->integer('recomend');
            $table->string('how_to_buy', 100)->nullable($value = true);
            $table->string('how_to_drink', 100)->nullable($value = true);
            $table->string('comment', 200)->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
