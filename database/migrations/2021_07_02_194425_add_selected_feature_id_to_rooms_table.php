<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelectedFeatureIdToRoomsTable extends Migration
{

    public function up()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->foreignId('selected_feature_id')
            ->nullable()
            ->references('id')
            ->on('features')
            ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn(['selected_feature_id']);
        });
    }
}
