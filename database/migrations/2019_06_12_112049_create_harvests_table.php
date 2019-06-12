<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvests', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('product_id')->index()->unsigned();
            $table->boolean('jan')->default(0);
            $table->boolean('feb')->default(0);
            $table->boolean('mar')->default(0);
            $table->boolean('apr')->default(0);
            $table->boolean('mai')->default(0);
            $table->boolean('jun')->default(0);
            $table->boolean('jul')->default(0);
            $table->boolean('aug')->default(0);
            $table->boolean('sep')->default(0);
            $table->boolean('okt')->default(0);
            $table->boolean('nov')->default(0);
            $table->boolean('dec')->default(0);
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
        Schema::dropIfExists('harvests');
    }
}
