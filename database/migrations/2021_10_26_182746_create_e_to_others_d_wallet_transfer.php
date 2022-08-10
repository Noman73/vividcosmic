<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEToOthersDWalletTransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others_transfers', function (Blueprint $table) {
            $table->id();
            $table->decimal('ammount',20,2);
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('transfer_id');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('others_transfers');
    }
}
