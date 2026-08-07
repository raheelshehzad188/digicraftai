<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('menu_text_color', 20)->nullable()->after('dark_color');
            $table->string('menu_hover_color', 20)->nullable()->after('menu_text_color');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['menu_text_color', 'menu_hover_color']);
        });
    }
};
