<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneOffOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('one_off_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('customer_name');
            $table->string('item');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->date('order_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('one_off_orders');
    }
}
