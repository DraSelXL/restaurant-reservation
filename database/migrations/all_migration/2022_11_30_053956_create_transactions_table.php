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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id("id");
            $table->integer("user_id",2);
            $table->integer("restaurant_id",2);
            $table->bigInteger("reservation_id",2);
            $table->integer("payment_amount",10,2);
            $table->tinyInteger("payment_status",1);
            $table->date("payment_date_at",6);
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
        Schema::dropIfExists('transactions');
    }
};
