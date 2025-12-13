<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('weekly_stock')->default(0)->after('stok_akhir');
            $table->date('last_weekly_update')->nullable()->after('weekly_stock');
        });
    }

    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn(['weekly_stock', 'last_weekly_update']);
        });
    }
};
