<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenaratePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genarate_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('developers');
            $table->string('reson_id');
            $table->string('reason_type');
            $table->string('reson_note');
            $table->string('payment_statues');
            $table->string('ref_number');

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
        Schema::dropIfExists('genarate_payments');
    }
}
