<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title_line2');
            $table->longText('content')->nullable()->after('description');
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
            $table->longText('content')->nullable()->after('bio');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['slug', 'content']);
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn(['slug', 'content']);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('content');
        });
    }
};
