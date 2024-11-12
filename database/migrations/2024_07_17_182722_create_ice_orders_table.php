<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIceOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('ice_orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('supplier_name');
            $table->decimal('ice_cost', 8, 2);
            $table->string('ice_invoice');
            $table->decimal('border_cost', 8, 2);
            $table->string('border_invoice');
            $table->string('shipper_name');
            $table->decimal('shipper_cost', 8, 2);
            $table->string('probill');
            $table->string('other_description')->nullable();
            $table->decimal('other_cost', 8, 2)->nullable();
            $table->integer('weight');
            $table->integer('totes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ice_orders');
    }
}
