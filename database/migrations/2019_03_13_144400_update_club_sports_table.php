<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClubSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_sports', function (Blueprint $table) {
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->primary('club_id', 'sport_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_sports', function (Blueprint $table) {
            $table->dropForeign('club_sports_club_id_foreign');
            $table->dropForeign('club_sports_sport_id_foreign');
        });
    }
}
