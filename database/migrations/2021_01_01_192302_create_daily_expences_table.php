<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyExpencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_expences', function (Blueprint $table) {
            $table->bigIncrements('daily_expences_id'); 
            $table->date('date');
            $table->bigInteger('expences_categoris_id');
            $table->bigInteger('expences_items_id');
            $table->integer('expences_items_quantity');
            $table->double('daily_expences_item_price', 10, 2); 
            $table->double('daily_expences_total', 10, 2); 
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
        Schema::dropIfExists('daily_expences');
    }
}
