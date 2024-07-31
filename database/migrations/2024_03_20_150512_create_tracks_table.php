<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('cateogory')->default('Manufactured Goods');
            $table->integer('quantityproduced');
            $table->integer('quantitysold');
            $table->string('quantityunit');
            $table->string('reportingperiod');
            $table->date('startdate');
            $table->date('enddate');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
