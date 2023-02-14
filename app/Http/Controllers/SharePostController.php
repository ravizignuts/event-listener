<?php

namespace App\Http\Controllers;

use App\Models\SharePost;
use App\Models\User;
use Illuminate\Http\Request;

class SharePostController extends Controller
{
    public function AddPost(Request $request,$id){
        $user = User::find($id);
        // $post = SharePost::create([
        //     'title' => $request->title,
        //     'content'=> $request->content,
        // ]);
        $user->post()->create([
            'title' => $request->title,
            'content'=> $request->content,
        ]);
        return redirect('/dashboard');
    }
}
