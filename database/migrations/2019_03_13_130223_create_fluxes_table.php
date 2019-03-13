<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFluxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fluxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title');
            $table->text('url');
            $table->integer('ttl');
            $table->boolean('active');
            $table->dateTime('date_success');
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
        Schema::dropIfExists('fluxes');
    }
}
