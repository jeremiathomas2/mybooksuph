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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer_type'); // 'Agent' or 'Buyer'
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_amount', 15, 2);
            $table->string('payment_method');
            $table->string('status')->default('Pending');
            $table->string('delivery_region');
            $table->text('address_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
