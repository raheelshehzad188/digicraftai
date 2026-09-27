<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('system_key', 40)->nullable()->unique()->after('slug');
        });

        foreach (['marketplace', 'filehippo'] as $key) {
            DB::table('pages')->where('slug', $key)->whereNull('system_key')->update(['system_key' => $key]);
        }
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('system_key');
        });
    }
};
