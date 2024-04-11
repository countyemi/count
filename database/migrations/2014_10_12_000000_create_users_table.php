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
        // Check if the migrations table doesn't exist
        if (!Schema::hasTable('migrations')) {
            // Create the migrations table
            Schema::create('migrations', function (Blueprint $table) {
                $table->id();
                $table->string('migration');
                $table->integer('batch');
            });
        }

        // Check if the 'users' table doesn't exist
        if (!Schema::hasTable('users')) {
            // Create the 'users' table
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'users' table if it exists
        if (Schema::hasTable('users')) {
            Schema::dropIfExists('users');
        }

        // Drop the migrations table if it exists
        if (Schema::hasTable('migrations')) {
            Schema::dropIfExists('migrations');
        }
    }
};
