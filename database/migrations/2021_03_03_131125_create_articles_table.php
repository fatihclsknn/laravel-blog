<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('slug',200);
            $table->longText('content');
            $table->unsignedBigInteger('category_id');
            $table->string('author',50);
            $table->integer('hit')->default(0);
            $table->string('image','100')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
