<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevel2CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level2_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('level1_category_id')->unsigned()->index();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('level1_category_id')->references('id')->on('level1_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level2_categories');
    }
}
