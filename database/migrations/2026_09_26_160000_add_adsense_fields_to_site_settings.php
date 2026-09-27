<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->boolean('ads_enabled')->default(true)->after('custom_body_code');
            $table->longText('ads_head_script')->nullable()->after('ads_enabled');
            $table->longText('ads_slot_top')->nullable()->after('ads_head_script');
            $table->longText('ads_slot_sidebar')->nullable()->after('ads_slot_top');
            $table->longText('ads_slot_inline')->nullable()->after('ads_slot_sidebar');
            $table->longText('ads_slot_bottom')->nullable()->after('ads_slot_inline');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'ads_enabled',
                'ads_head_script',
                'ads_slot_top',
                'ads_slot_sidebar',
                'ads_slot_inline',
                'ads_slot_bottom',
            ]);
        });
    }
};
