<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            '_form' => ['nullable', 'string', 'max:50'],
        ]);

        $exists = NewsletterSubscriber::query()
            ->where('email', $data['email'])
            ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'email' => 'This email is already subscribed.',
            ]);
        }

        NewsletterSubscriber::query()->create([
            'email' => $data['email'],
        ]);

        return back()
            ->withInput(['_form' => $data['_form'] ?? null])
            ->with('newsletter_success', 'Thanks for subscribing to our newsletter.');
    }
}
