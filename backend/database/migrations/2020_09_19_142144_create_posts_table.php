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
            $table->string('img_01')->nullable($value = true);
            $table->string('img_02')->nullable($value = true);
            $table->string('img_03')->nullable($value = true);
            $table->string('pro_name', 40);
            $table->string('flavor', 20);
            $table->double('weight', 8, 2)->nullable($value = true);
            $table->integer('price')->nullable($value = true);
            $table->integer('per_price')->nullable($value = true);
            $table->double('per_protein',8, 2)->nullable($value = true);
            $table->integer('made')->nullable($value = true);
            $table->integer('type')->nullable($value = true);
            $table->integer('taste_good');
            $table->integer('cost_paf');
            $table->integer('recomend');
            $table->integer('melt');
            $table->integer('foam');
            $table->integer('total');
            $table->string('how_to_buy', 100)->nullable($value = true);
            $table->string('how_to_drink', 100)->nullable($value = true);
            $table->string('comment', 400)->nullable($value = true);
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
