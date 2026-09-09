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
        Schema::create('invoice_email_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');
            $table->string('sent_to');
            $table->unsignedBigInteger('sent_by')->nullable(); // admin user id
            $table->string('status', 20); // 'sent' | 'failed'
            $table->text('error_message')->nullable();
            $table->timestamps();

            $table->foreign('sent_by')->references('id')->on('users')->nullOnDelete();
            $table->index(['invoice_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_email_logs');
    }
};
