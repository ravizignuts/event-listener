<?php

namespace App\Listeners;

use App\Events\SharePostNotificationEvent;
use App\Jobs\SharePostNotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SharePostNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SharePostNotificationEvent  $event
     * @return void
     */
    public function handle(SharePostNotificationEvent $event)
    {
        // dd($event->user);
        $userDetails = $event->user;
        SharePostNotificationJob::dispatch($userDetails);
        // return $userDetails;
    }
}
