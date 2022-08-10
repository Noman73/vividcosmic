<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldToFusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fusers', function (Blueprint $table) {
            $table->string('nominee_name')->nullable();
            $table->integer('nominee_id')->nullable();
            $table->string('nominee_relationship')->nullable();
            $table->integer('nominee_mobile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fusers', function (Blueprint $table) {
            //
        });
    }
}
