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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->decimal('total', 10, 2);
            $table->decimal('discount', 5, 2)->default(0);
            $table->decimal('payable', 10, 2);
            $table->decimal('paid', 10, 2)->default(0);
            $table->decimal('due', 10, 2)->default(0);
            $table->string('transaction_id')->nullable()->unique();
            $table->string('val_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('order_status', ['pending', 'shipped', 'delivered', 'failed', 'canceled']);
            $table->string('refund_remarks')->nullable();
            $table->string('refund_status')->nullable();
            $table->string('refund_trans_id')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
