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
        Schema::table('holders', function (Blueprint $table) {
            // Change 'name' column from string to text and make it nullable
            $table->decimal('rate',8,2)->nullable()->change();

            // Example: Change 'email' column to be unique and not nullable
            // $table->string('email')->unique()->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
