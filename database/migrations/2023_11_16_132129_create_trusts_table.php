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
        Schema::create('trusts', function (Blueprint $table) {
            $table->id();
            $table->string('rec_id')->nullable();
            $table->date('dateReceived')->default(now());
            $table->string('Obligation')->nullable();
            $table->string('Disbursement')->nullable();
            $table->string('Dept');
            $table->string('Payee');
            $table->string('Code');
            $table->string('Name');
            $table->string('Netdv', 255);
            $table->string('Particulars');
            $table->string('Status');
            $table->string('Transmittedto');
            $table->string('Remarks');
            $table->date('Released');
            $table->string('Check');
            $table->date('Issuance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trusts');
    }
};
