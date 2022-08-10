<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->decimal('ammount',20,2);
            $table->string('t_pin',100);
            $table->string('number',100);
            $table->unsignedInteger('agent_id')->nullable();
            $table->tinyInteger('payment_type');
            $table->unsignedInteger('payment_method');
            $table->tinyInteger('status')->default(1);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('approved_id')->nullable();
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
        Schema::dropIfExists('withdraws');
    }
}
