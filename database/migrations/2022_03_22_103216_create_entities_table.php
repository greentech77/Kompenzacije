<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->char('company_name', 100);
            $table->char('name', 50);
            $table->char('lastname', 50);
            $table->string('address');
            $table->integer('post_num', false, true)->length(4);
            $table->char('post_town');
            $table->integer('vat_num', false, true)->length(8);
            $table->bigInteger('registration_num', false, true)->length(11);
            $table->char('bank_account');
            $table->char('email', 50)->unique();
            $table->char('fax', 20);
            $table->char('mobile', 20);
            $table->char('phone', 20);
            $table->boolean('show_email');
            $table->boolean('show_fax');
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
        Schema::dropIfExists('entities');
    }
}
