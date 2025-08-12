<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('drivers', function (Blueprint $table) {
        $table->id();
        $table->string('full_name');
        $table->string('email')->unique();
        $table->string('phone_number');
        $table->integer('years_of_experience')->default(0);
        $table->string('password');
        $table->date('joined_date');
        $table->string('primary_park');
        $table->string('license_number');
        $table->string('vehicle');
        $table->string('language');
        $table->enum('status', ['Active', 'Inactive'])->default('Active');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
