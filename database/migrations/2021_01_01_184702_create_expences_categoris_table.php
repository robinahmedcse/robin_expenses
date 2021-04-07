<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpencesCategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expences_categoris', function (Blueprint $table) {
            $table->bigIncrements('expences_categoris_id');
            $table->string('expences_categoris_name');
            $table->string('expences_categoris_description');
            $table->tinyInteger('expences_categoris_status');
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
        Schema::dropIfExists('expences_categoris');
    }
}
