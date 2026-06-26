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
        Schema::create('vendor_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('shop_name')->nullable();
            $table->text('shop_description')->nullable();
            $table->string('logo')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('upi_id')->nullable();
            $table->decimal('commission_rate', 5, 2)->default(10.00);
            $table->string('status')->default('pending');
            $table->decimal('total_earnings', 10, 2)->default(0.00);
            $table->decimal('total_paid', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_profiles');
    }
};
