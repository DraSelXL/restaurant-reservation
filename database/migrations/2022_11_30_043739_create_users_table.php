<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id("id");
            $table->string("username",50);
            $table->string("password",255);
            $table->string("full_name",50);
            $table->date("date_of_birth",6);
            $table->string("address",255);
            $table->string("email");
            $table->string("phone",50);
            $table->integer("gender")->comment("1 laki, 2 perempuan");
            $table->integer("balance");
            $table->integer("blocked")->comment("0 ngga ke block, 1 ter block");
            $table->integer("role_id")->comment("1 customer, 2 restaurant, 3 admin");
            

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
        Schema::dropIfExists('users');
    }
};
