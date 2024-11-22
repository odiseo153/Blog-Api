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
        Schema::create('views', function (Blueprint $table) {
            $table->ulid('id')->primaryKey();
            $table->ulid('post_id');
            $table->ulid('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Added onDelete for referential integrity
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); // Added onDelete for referential integrity

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('views');
    }
};
