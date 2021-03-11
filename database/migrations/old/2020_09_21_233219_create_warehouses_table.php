<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id');

            $table->string  ('name', 128)       ->nullable();
            $table->string  ('slug', 128)       ->unique()->nullable();
            $table->string  ('direction', 128)  ->nullable();
            $table->text    ('phone_1')         ->nullable();
            $table->text    ('phone_2')         ->nullable();
            $table->string  ('file')            ->nullable();
            $table->string  ('email', 128)      ->nullable();
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
        Schema::dropIfExists('warehouses');
    }
}
