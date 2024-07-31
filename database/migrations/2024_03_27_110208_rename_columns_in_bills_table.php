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
        Schema::table('bills', function (Blueprint $table) {
            $table->renameColumn('componentname', 'component_name');
            $table->renameColumn('partnumber', 'part_number');
            $table->renameColumn('quantityperunit', 'quantity_per_unit');
            $table->renameColumn('quantitypurchased', 'quantity_purchased');
            $table->renameColumn('quantityunit', 'quantity_unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->renameColumn('componentname', 'component_name');
            $table->renameColumn('partnumber', 'part_number');
            $table->renameColumn('quantityperunit', 'quantity_per_unit');
            $table->renameColumn('quantitypurchased', 'quantity_purchased');
            $table->renameColumn('quantityunit', 'quantity_unit');
        });
    }
};
