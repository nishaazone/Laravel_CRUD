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
        Schema::table('tracks', function (Blueprint $table) {
            $table->renameColumn('product', 'product_name');
            $table->renameColumn('quantityproduced','quantity_produced');
            $table->renameColumn('quantitysold','quantity_sold');
            $table->renameColumn('quantityunit','quantity_unit');
            $table->renameColumn('reportingperiod','reporting_period');
            $table->renameColumn('startdate','start_date');
            $table->renameColumn('enddate','end_date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->renameColumn('product', 'product_name');
            $table->renameColumn('quantityproduced','quantity_produced');
            $table->renameColumn('quantitysold','quantity_sold');
            $table->renameColumn('quantityunit','quantity_unit');
            $table->renameColumn('reportingperiod','reporting_period');
            $table->renameColumn('startdate','start_date');
            $table->renameColumn('enddate','end_date');

        });
    }
};
