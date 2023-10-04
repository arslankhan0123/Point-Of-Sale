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
        Schema::create('assign_customers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('manager_id')->nullable()->unsigned();
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('customer_id')->nullable()->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('assign_customers');
    }
};
