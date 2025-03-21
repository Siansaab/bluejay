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
        Schema::create('technicals', function (Blueprint $table) {
            $table->id();
            $table->text('description'); // Fixed spelling mistake
            $table->enum('status', ['active', 'deactive']);
            $table->text('pdf')->nullable();
            
            $table->string('revision')->nullable(); // Added Revision field
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicals');
    }
};
