<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
/**
 * Run the migrations.
 *
 * @return void
 */
public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->increments('id');
        $table->string('payment_no')->nullable();
        $table->integer('client_id');
        $table->integer('service_id');
        $table->string('service_source')->nullable();
        $table->float('amount');
        $table->integer('duration');
        $table->date('start_date');
        $table->integer('repeat');
        $table->string('repeat_type');
        $table->integer('custom_duration');
        $table->integer('active');
        $table->timestamps();
        $table->softDeletes();
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::dropIfExists('payments');
}
}
