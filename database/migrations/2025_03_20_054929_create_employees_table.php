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
        Schema::create('employees', function (Blueprint $table) {

             $table->id();
            $table->text('description'); // Description field
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('employer_name'); // Name of Employer
            $table->string('name'); // Name
            $table->string('designation')->nullable(); // Designation
            $table->string('location')->nullable(); // Location of Posting
            $table->string('mobile_no', 10)->nullable(); // Mobile Number (Limited to 10 digits)
            $table->string('email')->nullable(); // Email ID
            $table->text('residential_address')->nullable(); // Residential Address
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
