<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use App\Models\User;
use App\Notifications\NewChirp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendChirpCreatedNotifications
{
    use InteractsWithQueue;

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
    public function handle(ChirpCreated $event): void
    {
        Log::debug("handle notify from SendChirpCreatedNotifications");

        foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) {
            $user->notify(new NewChirp($event->chirp));
        }
    }

    /**
     * Handle a job failure.
     */
    // public function failed(ChirpCreated $event, Throwable $exception): void
    // {
    //     Log::debug("failed notify from SendChirpCreatedNotifications");
    // }

    /**
     * The number of times the queued listener may be attempted.
     *
     * @var int
     */
    // public $tries = 5;
}
