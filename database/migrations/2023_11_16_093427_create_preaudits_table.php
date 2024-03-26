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
        Schema::create('preaudits', function (Blueprint $table) {
            $table->id();
            $table->string('Lname');
            $table->string('Fname');
            $table->string('email_address');
            $table->text('Phone_number');
            $table->text('Role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preaudits');
    }
};
