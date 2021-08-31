<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaravelEGOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laraveleg_options', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');
            $table->string('option_key')->index()->unique();
            $table->text('option_value');
            $table->expires();
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
        Schema::dropIfExists('laraveleg_options');
    }
}
