<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $hero = 'assets/img/zenvello-software/hero-software.svg';

        $pages = DB::table('pages')
            ->where(function ($q) {
                $q->where('system_key', 'filehippo')
                    ->orWhere('slug', 'download-free-software')
                    ->orWhere('slug', 'filehippo')
                    ->orWhere('slug', 'software');
            })
            ->get(['id', 'sections']);

        foreach ($pages as $page) {
            $sections = json_decode((string) $page->sections, true);
            if (! is_array($sections)) {
                $sections = [];
            }

            $current = (string) ($sections['hero_image'] ?? '');
            if ($current === $hero) {
                continue;
            }

            if ($current === ''
                || str_contains($current, 'softwaretechcompany.com')
                || str_contains($current, 'dashboard.jpg')
            ) {
                $sections['hero_image'] = $hero;
                DB::table('pages')->where('id', $page->id)->update([
                    'sections' => json_encode($sections),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        // no-op: do not restore broken external hero URLs
    }
};
