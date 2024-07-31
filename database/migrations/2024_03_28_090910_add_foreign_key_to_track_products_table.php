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
        Schema::table('track_products', function (Blueprint $table) {
            $table->foreign('product_id')
            ->references('id')
            ->on('manage_products')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('track_products', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
        });
    }
};
