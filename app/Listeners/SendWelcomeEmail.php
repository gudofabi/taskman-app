<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        try {
            Mail::send('emails.welcome', ['user' => $event->user], function ($message) use ($event) {
                $message->to($event->user->email)->subject('Welcome to Our Platform!');
            });
        } catch (\Exception $e) {
            \Log::error('Email could not be sent. Error: ' . $e->getMessage());
        }
    }
}
