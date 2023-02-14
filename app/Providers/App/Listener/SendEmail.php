<?php

namespace App\Providers\App\Listener;

use App\Providers\App\Event\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\App\Event\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        //
    }
}
