<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('amount_of_ice');
            $table->integer('amount_of_boxes');
            $table->enum('origin', ['online', 'manual']);
            $table->enum('recurring', ['recurring', 'non-recurring']);
            $table->string('location_name');
            $table->string('address');
            $table->string('unit')->nullable();
            $table->string('city');
            $table->string('postal_code');
            $table->enum('province', ['BC', 'AB']);
            $table->string('country')->default('Canada');
            $table->enum('pickup_delivery', ['pickup', 'delivery']);
            $table->enum('status', ['valid', 'skip', 'cancelled']);
            $table->timestamp('delivery_date');
            $table->text('notes')->nullable();
            $table->decimal('total_cost', 8, 2);
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
        Schema::dropIfExists('orders');
    }
}
