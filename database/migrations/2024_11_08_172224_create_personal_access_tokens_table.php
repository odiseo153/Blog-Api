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
    

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing bigint ID
            $table->string('name');
            $table->string('token');
            $table->dateTime('last_used_at')->nullable();
            $table->json('abilities')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->string('tokenable_id'); // Change this to string if using ULIDs
            $table->string('tokenable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
