<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_sales', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('sold');
            $table->decimal('income', 8, 2);
            $table->integer('bought');
            $table->decimal('expense', 8, 2);
            $table->decimal('net', 8, 2);
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
        Schema::dropIfExists('warehouse_sales');
    }
}
