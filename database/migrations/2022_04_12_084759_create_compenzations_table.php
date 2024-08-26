<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompenzationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compenzations', function (Blueprint $table) {
            $table->id();
            $table->char('name', 50);
            $table->integer('year', false, true)->length(4);
            $table->unsignedDecimal('amount', 10, 4);
            $table->integer('vat', false, true)->length(2);
            $table->unsignedDecimal('commission', 10, 4);
            $table->timestamp('date_finished');
            $table->timestamp('date_payed');
            $table->boolean('storno');
            $table->boolean('finished');
            $table->boolean('with_ddv');
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
        Schema::dropIfExists('compenzations');
    }
}
