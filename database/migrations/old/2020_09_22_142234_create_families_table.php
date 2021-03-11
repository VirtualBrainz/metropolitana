<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');

            $table->integer ('classification_id')       ->nullable();
            $table->integer ('subclassification_id')    ->nullable();
            $table->integer ('subarea_id')              ->nullable();
            $table->integer ('warehouse_id')            ->nullable();

            $table->integer ('status')                  ->nullable();
            $table->string  ('name', 128)               ->nullable();
            $table->string  ('file_path')               ->nullable();
            $table->string  ('file')                    ->nullable();
            $table->string  ('sku', 128)                ->unique()->nullable();

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
        Schema::dropIfExists('families');
    }
}
