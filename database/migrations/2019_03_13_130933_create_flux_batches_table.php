<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFluxBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flux_batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('flux_id');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
            $table->boolean('success');
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
        Schema::dropIfExists('flux_batches');
    }
}
