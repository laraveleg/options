<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FoxlabyLaravelOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foxlaby_laravel_options', function (Blueprint $table) {
            $table->id();
            $table->string('option_key')->index()->unique();
            $table->text('option_value');
            $table->string('reflect_model')->index()->nullable();
            $table->integer('reflect_id')->index()->nullable();
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
        Schema::dropIfExists('foxlaby_laravel_options');
    }
}
