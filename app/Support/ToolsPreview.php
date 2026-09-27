<?php

namespace App\Support;

class ToolsPreview
{
    public static function enabled(): bool
    {
        $cookie = (string) config('tools-preview.cookie', 'dc_tools_preview');

        return request()->cookie($cookie) === '1';
    }

    public static function tokenMatches(string $token): bool
    {
        $expected = (string) config('tools-preview.token');

        return $expected !== '' && hash_equals($expected, $token);
    }
}
