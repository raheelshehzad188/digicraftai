<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('software_items', function (Blueprint $table) {
            $table->string('download_file')->nullable()->after('download_url');
        });
    }

    public function down(): void
    {
        Schema::table('software_items', function (Blueprint $table) {
            $table->dropColumn('download_file');
        });
    }
};
