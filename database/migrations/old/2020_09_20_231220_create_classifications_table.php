<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classifications', function (Blueprint $table) {
            $table->increments('id');

            $table->string  ('name', 128)           ->nullable();
            $table->string  ('slug', 128)           ->unique()->nullable();
            $table->string  ('vertical_png')        ->nullable();
            $table->string  ('icono_png')           ->nullable();
            $table->string  ('icono_gif')           ->nullable();

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
        Schema::dropIfExists('classifications');
    }
}
