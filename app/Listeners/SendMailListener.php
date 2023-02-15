<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Mail\userlogin;
use App\Events\SendMailEvent;
use App\Jobs\SendMailJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailListener
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
     * @param  \App\Events\SendMailEvent  $event
     * @return void
     */
    public function handle(SendMailEvent $event)
    {
        $loginTime = Carbon::now()->toDateTimeLocalString();
        $current_timestamp = Carbon::now()->toDateTimeString();
        $userDetails = $event->user;
        $saveHistory = DB::table('user_login_histories')->insert([
            'name'=>$userDetails['name'],
            'email'=>$userDetails['email'],
            'login_time'=>$loginTime,
            'created_at'=>$current_timestamp,
            'updated_at'=>$current_timestamp,
        ]);
        // SendMailJob::dispatch($userDetails);
        // Mail::to($event->user['email'])->send(new userlogin($event->user));
    }
}
