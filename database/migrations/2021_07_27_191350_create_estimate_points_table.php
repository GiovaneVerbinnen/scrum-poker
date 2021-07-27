<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_points', function (Blueprint $table) {
            $table->id();
            $table->string('value', 32);
            $table->foreignId('participant_id')
                ->references('id')->on('participants')
                ->onDelete('cascade');
            $table->foreignId('feature_id')
                ->references('id')->on('features')
                ->onDelete('cascade');
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
        Schema::dropIfExists('estimate_points');
    }
}
