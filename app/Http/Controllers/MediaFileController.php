<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MediaFileController extends Controller
{
    /**
     * Stream public media/assets files through PHP to bypass Hostinger CDN image rewriting.
     */
    public function __invoke(string $path): BinaryFileResponse
    {
        $path = str_replace(['..', '\\'], '', $path);
        $path = ltrim($path, '/');

        $candidates = [
            public_path($path),
            public_path('media/'.$path),
            public_path('assets/'.$path),
            public_path('assets/img/'.basename($path)),
        ];

        $file = null;
        foreach ($candidates as $candidate) {
            if (is_file($candidate)) {
                $file = $candidate;
                break;
            }
        }

        abort_unless($file, 404);

        return response()->file($file, [
            'Cache-Control' => 'public, max-age=86400, no-transform',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
