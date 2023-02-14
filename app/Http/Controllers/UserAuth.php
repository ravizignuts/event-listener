<?php

namespace App\Http\Controllers;
use App\Event\UserCreated;
use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    public function index(){
        event(new UserCreated("Email has been send on your mail address"));
    }
}
