<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('society_id');
            $table->string('fixed_asset_number');
            $table->string('control_number');
            $table->string('plates');
            $table->string('division_id');
            $table->string('serial_number');
            $table->string('invoice_number');
            $table->string('engine_number');
            $table->foreignId('agency_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('model');
            $table->string('cylinders');
            $table->string('doors');
            $table->string('function');
            $table->string('passenger_capacity');
            $table->string('transmission');
            $table->string('color');
            $table->string('vehicle_level');
            $table->string('ownership');
            $table->string('purchase_document_number')->nullable();
            $table->string('state_record')->nullable();
            $table->decimal('acquisition_value', 10, 2);
            $table->integer('assigned')->default(0); // 0 = false, 1 = true
            $table->integer('status')->default(1); // 0 = false, 1 = true
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
