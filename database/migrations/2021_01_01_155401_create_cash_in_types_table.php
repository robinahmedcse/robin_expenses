<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashInTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_in_types', function (Blueprint $table) {
            $table->bigIncrements('cash_in_type_id');
               $table->string('cash_in_type_name');
                  $table->string('cash_in_description');
            $table->tinyInteger('cash_in_type_status');
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
        Schema::dropIfExists('cash_in_types');
    }
}
