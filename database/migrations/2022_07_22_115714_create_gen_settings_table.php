<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gen_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('gen1',20,2)->default(0);
            $table->decimal('gen2',20,2)->default(0);
            $table->decimal('gen3',20,2)->default(0);
            $table->decimal('gen4',20,2)->default(0);
            $table->decimal('gen5',20,2)->default(0);
            $table->decimal('gen6',20,2)->default(0);
            $table->decimal('gen7',20,2)->default(0);
            $table->decimal('gen8',20,2)->default(0);
            $table->decimal('gen9',20,2)->default(0);
            $table->decimal('gen10',20,2)->default(0);
            $table->decimal('gen11',20,2)->default(0);
            $table->decimal('gen12',20,2)->default(0);
            $table->decimal('gen13',20,2)->default(0);
            $table->decimal('gen14',20,2)->default(0);
            $table->decimal('gen15',20,2)->default(0);
            $table->decimal('gen16',20,2)->default(0);
            $table->decimal('gen17',20,2)->default(0);
            $table->unsignedBigInteger('author_id');
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
        Schema::dropIfExists('gen_settings');
    }
}
