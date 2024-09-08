<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('service');
            $table->integer('number_of_pages')->nullable();
            $table->string('target_market')->nullable();
            $table->text('keywords')->nullable();
            $table->decimal('ad_budget', 10, 2)->nullable();
            $table->decimal('estimated_cost', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotations');
    }

};
