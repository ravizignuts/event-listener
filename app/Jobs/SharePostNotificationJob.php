<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\SharePostNotification;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SharePostNotificationJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $postuser;
    public function __construct($postuser)
    {
        $this->postuser = $postuser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // dd($this->postuser);
        // $this->postuser->notify(new SharePostNotification($this->postuser));
        $users = User::all();
        foreach($users as $user)
        {
            if($user != $this->postuser){
            $user->notify(new SharePostNotification($this->postuser));
            }
        }
    }
}
