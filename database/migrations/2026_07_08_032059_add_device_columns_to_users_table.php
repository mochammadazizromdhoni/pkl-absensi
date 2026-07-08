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
            // Fingerprint (hash) dari browser/perangkat yang pertama kali dipakai login.
            $table->string('device_id')->nullable()->after('remember_token');

            // Kapan device_id pertama kali dikunci (login pertama).
            $table->timestamp('device_locked_at')->nullable()->after('device_id');

            // Kapan admin terakhir mereset perangkat user ini (untuk audit).
            $table->timestamp('device_reset_at')->nullable()->after('device_locked_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['device_id', 'device_locked_at', 'device_reset_at']);
        });
    }
};