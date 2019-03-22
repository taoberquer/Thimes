<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('flux_id');
            $table->char('title');
            $table->text('url');
            $table->unsignedBigInteger('flux_batch');
            $table->char('hash');

            $table->char('author')->nullable();
            $table->text('comments')->nullable();
            $table->text('description')->nullable();
            $table->char('guid')->nullable();
            $table->dateTime('pub_date')->nullable();
            $table->char('source')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
