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
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->integer('key')->default(0);
            $table->string('name', 70)->nullable();
            $table->string('zone_type', 20)->nullable();
            $table->string('settlement_type', 30)->nullable();
            $table->unsignedBigInteger('zipcode_id');
            $table->foreign('zipcode_id')->references('id')->on('zipcodes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};
