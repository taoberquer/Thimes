<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_sports', function (Blueprint $table) {
            $table->unsignedBigInteger('club_id');
            $table->unsignedBigInteger('sport_id');
            $table->timestamps();
            $table->primary(['club_id', 'sport_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('club_sports');
    }
}
