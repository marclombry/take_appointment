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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained();
            $table->dateTime('date_begin');
            $table->dateTime('date_end');
            $table->string('email')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('company');
            $table->string('tel');
            $table->boolean('is_finish')->default(false);
            $table->boolean('is_accept')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }
};
