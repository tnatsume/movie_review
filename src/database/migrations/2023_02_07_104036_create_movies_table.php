<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('movie_title')->comment('映画のタイトル');
            $table->text('movie_content')->comment('映画の内容');
            $table->string('movie_pic')->comment('映画の写真')->nullable();
            $table->float('movie_evaluation')->comment('評価');
            $table->string('movie_url')->comment('映画サイトのurl')->nullable();
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
        Schema::dropIfExists('movies');
    }
};
