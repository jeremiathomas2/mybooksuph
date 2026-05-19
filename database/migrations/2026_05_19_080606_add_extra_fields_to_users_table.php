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
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('baptism')->default(false);
            $table->string('user_type')->default('individual_buyer');
            
            // Transport Company info
            $table->string('company_name')->nullable();
            $table->string('company_reg_number')->nullable();
            $table->text('transport_routes')->nullable();
            
            // Evangelist info
            $table->string('evangelist_ministry')->nullable();
            $table->string('evangelist_region')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
