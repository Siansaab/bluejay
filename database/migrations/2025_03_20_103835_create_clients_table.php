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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'Client' or 'Vendor'
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('organization_name');
            $table->string('mobile_no', 10)->unique();
            $table->string('email')->unique();
            $table->string('location')->nullable();
            $table->text('official_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
