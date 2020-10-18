<?php

namespace App\Http\Controllers;

use App\user;
use App\wallpaper;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function general()
    {
        //
    }

    public function upload(user $user)
    {
        $wallpapers = wallpaper::where('user_id',$user->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);

        return view('profile.index', compact(['wallpapers','user']));
    }

    public function favorite()
    {
        // 
    }
}
