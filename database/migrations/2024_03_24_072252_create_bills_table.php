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
        Schema::create('bills', function (Blueprint $table) {
            $table->id('Component_id');
            $table->string('componentname');
            $table->string('partnumber');
            $table->text('description');
            $table->integer('quantityperunit');
            $table->integer('quantitypurchased');
            $table->integer('quantity');
            $table->string('quantityunit');
            $table->string('source');
            $table->string('supplier');
            $table->unsignedBigInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
