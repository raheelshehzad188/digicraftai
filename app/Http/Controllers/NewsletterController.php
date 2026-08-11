<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            '_form' => ['nullable', 'string', 'max:50'],
        ]);

        $exists = NewsletterSubscriber::query()
            ->where('email', $data['email'])
            ->exists();

        if ($exists) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This email is already subscribed.',
                ], 422);
            }

            throw ValidationException::withMessages([
                'email' => 'This email is already subscribed.',
            ]);
        }

        NewsletterSubscriber::query()->create([
            'email' => $data['email'],
        ]);

        $message = 'Thanks for subscribing to our newsletter.';

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $message,
            ]);
        }

        return back()
            ->withInput(['_form' => $data['_form'] ?? null])
            ->with('newsletter_success', $message);
    }
}
