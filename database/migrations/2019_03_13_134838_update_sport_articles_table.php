<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSportArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sport_articles', function (Blueprint $table) {
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('sport_articles_sport_id_foreign');
            $table->dropForeign('sport_articles_club_id_foreign');
            $table->dropForeign('sport_articles_article_id_foreign');
            $table->dropForeign('sport_articles_user_id_foreign');
        });
    }
}
