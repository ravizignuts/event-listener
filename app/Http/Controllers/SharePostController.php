<?php

namespace App\Http\Controllers;

use App\Events\SharePostNotificationEvent;
use App\Models\SharePost;
use App\Models\User;
use App\Notifications\SharePostNotification;
use Illuminate\Http\Request;

class SharePostController extends Controller
{
    public function AddPost(Request $request,$id){
        $user = User::find($id);
        $user->post()->create([
            'title' => $request->title,
            'content'=> $request->content,
        ]);
        event(new SharePostNotificationEvent($user));
        //$user->notify(new SharePostNotification($user));
        return redirect('/dashboard');
    }
}
