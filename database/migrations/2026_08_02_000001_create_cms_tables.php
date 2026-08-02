<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('DOT.NET');
            $table->string('tagline')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('footer_about')->nullable();
            $table->text('newsletter_text')->nullable();
            $table->string('map_embed_url')->nullable();
            $table->string('primary_color')->default('#FFAA17');
            $table->string('secondary_color')->default('#6c757d');
            $table->string('dark_color')->default('#212529');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('copyright_text')->nullable();
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('template')->default('default');
            $table->string('banner_title')->nullable();
            $table->longText('content')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->nullOnDelete();
            $table->string('label');
            $table->string('type')->default('custom'); // custom, page, route
            $table->string('url')->nullable();
            $table->string('route_name')->nullable();
            $table->foreignId('page_id')->nullable()->constrained('pages')->nullOnDelete();
            $table->string('target')->default('_self');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->longText('content')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('image')->nullable();
            $table->json('extra')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('project_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('filter_class')->nullable();
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('client')->nullable();
            $table->string('project_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_line2')->nullable();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profession')->nullable();
            $table->text('content');
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->string('period')->default('/ Mo');
            $table->string('currency')->default('$');
            $table->json('features')->nullable();
            $table->string('button_text')->default('Order Now');
            $table->string('button_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->json('extra')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_sections');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('pricing_plans');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('services');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_categories');
        Schema::dropIfExists('home_sections');
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('site_settings');
    }
};
