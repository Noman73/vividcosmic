<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generations', function (Blueprint $table) {
            $table->id();
            $table->decimal('first',20,2);
            $table->decimal('second',20,2);
            $table->decimal('third',20,2);
            $table->decimal('fourth',20,2);
            $table->decimal('fifth',20,2);
            $table->decimal('sixth',20,2);
            $table->decimal('seventh',20,2);
            $table->tinyInteger('status');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('generations');
    }
}
