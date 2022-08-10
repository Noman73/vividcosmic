<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fusers', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->string('username',50)->unique();
            $table->string('email',200)->nullable();
            $table->string('adress',200)->nullable();
            $table->string('nid',200)->nullable();
            $table->string('birth_date',200)->nullable();
            $table->string('password',100);
            $table->string('mobile',50)->nullable();
            $table->string('t_pin',100)->nullable();
            $table->unsignedBigInteger('reffer_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->unsignedBigInteger('gen_id');
            $table->unsignedBigInteger('placement_id')->nullable();
            $table->string('image',200)->nullable();
            $table->tinyInteger('status');
            $table->string('gen_update_at',20)->nullable();         
            $table->string('dw_updated_at',20)->nullable();
            $table->string('user_created_at',20);
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('fuser_id')->nullable();
            $table->tinyInteger('blnc_status')->default(0);
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
        Schema::dropIfExists('fusers');
    }
}
