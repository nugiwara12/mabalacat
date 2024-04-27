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
        Schema::create('juliuses', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email_address');
            $table->string('section');
            $table->string('LRN_number');
            $table->string('subject')->nullable();
            $table->string('grade')->nullable();
            $table->string('teacher_name')->nullable();
            $table->string('print_action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juliuses');
    }
};