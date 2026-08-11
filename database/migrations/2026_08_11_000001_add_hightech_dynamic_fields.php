<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->text('description')->nullable()->after('subtitle');
            $table->string('button_2_text')->nullable()->after('button_url');
            $table->string('button_2_url')->nullable()->after('button_2_text');
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->string('category')->nullable()->after('author');
            $table->string('author_image')->nullable()->after('category');
            $table->unsignedInteger('shares_count')->default(0)->after('comments_count');
        });

        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('phone_cta_label')->nullable()->after('phone');
            $table->string('contact_display_address')->nullable()->after('address');
            $table->string('contact_map_link')->nullable()->after('contact_display_address');
            $table->text('contact_form_notice')->nullable()->after('map_embed_url');
            $table->string('contact_background_image')->nullable()->after('contact_form_notice');
            $table->string('brand_accent')->nullable()->after('site_name');
            $table->json('footer_help_links')->nullable()->after('copyright_text');
        });
    }

    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn(['description', 'button_2_text', 'button_2_url']);
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['category', 'author_image', 'shares_count']);
        });

        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'phone_cta_label', 'contact_display_address', 'contact_map_link',
                'contact_form_notice', 'contact_background_image', 'brand_accent', 'footer_help_links',
            ]);
        });
    }
};
