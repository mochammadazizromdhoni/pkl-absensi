<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->enum('role',[
                'super_admin',
                'admin',
                'sales',
                'teknisi',
                'pkl',
                'billing',
                'noc',
                'cs',
                'pelanggan',
                'manager'
            ])->default('pkl')->after('email');

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('role');

        });
    }
};