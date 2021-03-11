<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmographies', function (Blueprint $table) {
            $table->id();

            $table->integer ('year_id')                     ->unsigned()->nullable();
            $table->string  ('name')                        ->nullable();
            $table->string  ('slug')                        ->unique()->nullable();
            $table->string  ('file')                        ->nullable();

            $table->softDeletes();

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
        Schema::dropIfExists('filmographies');
    }
}
