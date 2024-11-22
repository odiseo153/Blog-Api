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
        Schema::create('notifications', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('type');
            $table->string('data')->nullable();
            $table->dateTime('read_at');
            $table->foreignUlid('user_id')->constrained();

            $table->timestamps();
        });
    }

    protected $fillable = [
        'user_id',
        'type',       // Type of notification (e.g., new_comment, new_reply)
        'data',       // JSON data for additional information
        'read_at'     // Timestamp for when the notification was read
    ];

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
