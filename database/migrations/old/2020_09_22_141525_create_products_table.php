<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')           ->nullable();
            $table->string('name_mx', 128)      ->nullable();
            $table->string('name_us', 128)      ->nullable();
            $table->string('name_ep', 128)      ->nullable();
            $table->string('name_al', 128)      ->nullable();
            $table->string('sku')              ->nullable();
            $table->string('file')              ->nullable();
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
        Schema::dropIfExists('products');
    }
}
