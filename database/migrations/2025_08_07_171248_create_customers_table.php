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
        Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('email')->unique();
        $table->string('phone_number');
        $table->date('date_of_birth');
        $table->string('address');
        $table->string('nationality');
        $table->string('passport_number')->unique()->nullable();
        $table->string('emergency_contact_name');
        $table->string('emergency_contact_number');
        $table->string('password');
        $table->enum('role', ['customer'])->default('customer'); 
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->text('special_preference_notes')->nullable();
        $table->timestamps();
    });
} 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
