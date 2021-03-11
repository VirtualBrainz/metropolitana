<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subareas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer ('classification_id')       ->unsigned()->nullable();
            $table->integer ('subclassification_id')    ->unsigned()->nullable();

            $table->string  ('name', 128)               ->nullable();
            $table->string  ('slug', 128)               ->unique()->nullable();
            $table->string  ('order', 128)              ->nullable();

            $table->foreign('classification_id')        ->references('id')->on('classifications');
            $table->foreign('subclassification_id')     ->references('id')->on('subclassifications');

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
        Schema::dropIfExists('subareas');
    }
}
