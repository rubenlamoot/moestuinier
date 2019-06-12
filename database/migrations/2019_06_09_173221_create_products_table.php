<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('level2_category_id')->unsigned()->index();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('photo');
            $table->integer('stock');
            $table->boolean('new')->default(0);
            $table->integer('sow_id')->unsigned()->index();
            $table->integer('harvest_id')->unsigned()->index();
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
