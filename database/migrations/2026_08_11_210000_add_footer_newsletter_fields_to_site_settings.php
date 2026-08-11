<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('site_settings', 'newsletter_enabled')) {
                $table->boolean('newsletter_enabled')->default(true)->after('newsletter_text');
            }
            if (! Schema::hasColumn('site_settings', 'newsletter_title')) {
                $table->string('newsletter_title')->nullable()->after('newsletter_enabled');
            }
            if (! Schema::hasColumn('site_settings', 'newsletter_placeholder')) {
                $table->string('newsletter_placeholder')->nullable()->after('newsletter_title');
            }
            if (! Schema::hasColumn('site_settings', 'newsletter_button_text')) {
                $table->string('newsletter_button_text')->nullable()->after('newsletter_placeholder');
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $cols = ['newsletter_enabled', 'newsletter_title', 'newsletter_placeholder', 'newsletter_button_text'];
            foreach ($cols as $col) {
                if (Schema::hasColumn('site_settings', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
