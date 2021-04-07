<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpencesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expences_items', function (Blueprint $table) {
            $table->bigIncrements('expences_items_id');
            $table->bigInteger('expences_categoris_id');
            $table->string('expences_items_name');
            $table->string('expences_items_description');
            
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
        Schema::dropIfExists('expences_items');
    }
}
