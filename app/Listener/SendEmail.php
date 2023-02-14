<?php

namespace App\Listener;

use Carbon\Carbon;
use App\Event\UserCreated;
use App\Jobs\SendMailJob;
use App\Mail\userlogin;
use App\Models\UserLoginHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
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
     * @param  \App\Event\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        // echo $event->user;
        $loginTime = Carbon::now()->toDateTimeLocalString();
        $current_timestamp = Carbon::now()->toDateTimeString();
        $userDetails = $event->user;
        $saveHistory = DB::table('user_login_histories')->insert([
            'name'=>$userDetails->name,
            'email'=>$userDetails->email,
            'login_time'=>$loginTime,
            'created_at'=>$current_timestamp,
            'updated_at'=>$current_timestamp,
        ]);
        SendMailJob::dispatch($userDetails)->delay(now()->addSeconds(5));
        return$saveHistory;
    }
}
