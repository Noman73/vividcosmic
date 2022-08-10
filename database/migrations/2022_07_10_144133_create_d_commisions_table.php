<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDCommisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_commisions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->decimal("ammount",20,2);
            $table->string("date");
            $table->unsignedBigInteger("author_id");
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
        Schema::dropIfExists('d_commisions');
    }
}
