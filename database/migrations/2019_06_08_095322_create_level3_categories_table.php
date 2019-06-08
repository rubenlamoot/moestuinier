<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevel3CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level3_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('level2_category_id')->index()->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('level2_category_id')->references('id')->on('level2_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level3_categories');
    }
}
