<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFluxSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flux_sports', function (Blueprint $table) {
            $table->foreign('flux_id')->references('id')->on('fluxes');
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->primary('flux_id', 'sport_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flux_sports', function (Blueprint $table) {
            $table->dropForeign('flux_sports_flux_id_foreign');
            $table->dropForeign('flux_sports_sport_id_foreign');
            $table->dropPrimary('flux_sports_flux_id_sport_id_primary');
        });
    }
}
