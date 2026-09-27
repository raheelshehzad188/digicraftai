<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

require_once __DIR__.'/helpers/seo_columns.php';

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('software_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->boolean('is_chip')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('software_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('version')->nullable();
            $table->text('description')->nullable();
            $table->json('overview')->nullable();
            $table->string('icon_class')->nullable();
            $table->string('icon')->nullable();
            $table->string('icon_text')->nullable();
            $table->string('image')->nullable();
            $table->json('tags')->nullable();
            $table->string('license')->default('free');
            $table->json('platforms')->nullable();
            $table->string('rating')->nullable();
            $table->string('votes')->nullable();
            $table->string('downloads')->nullable();
            $table->string('download_url')->nullable();
            $table->string('publisher')->nullable();
            $table->string('file_size')->nullable();
            $table->string('release_date')->nullable();
            $table->string('os')->nullable();
            $table->string('language')->nullable();
            $table->json('key_features')->nullable();
            $table->json('versions')->nullable();
            $table->json('faqs')->nullable();
            $table->boolean('show_mock_screenshots')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            add_seo_columns($table);
            $table->timestamps();
        });

        Schema::create('software_category_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('software_category_id')->constrained('software_categories')->cascadeOnDelete();
            $table->foreignId('software_item_id')->constrained('software_items')->cascadeOnDelete();
            $table->unique(['software_category_id', 'software_item_id'], 'software_cat_item_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('software_category_item');
        Schema::dropIfExists('software_items');
        Schema::dropIfExists('software_categories');
    }
};
