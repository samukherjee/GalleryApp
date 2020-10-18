<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    private $image_path;

    public function __construct()
    {
        $this->image_path = storage_path('app/public');

        $this->middleware('auth')
             ->only([ 'edit', 'update', 'editimage', 'updateimage']);
    }

    public function showGeneral()
    {
        $user = auth()->user();
        return view('profile.generalsetting',compact('user'));
    }

    public function updateGeneral(Request $request)
    {
        $user = auth()->user();

        $attributes = request()->validate([
            'username' => ['bail','required','string','max:255',
            			Rule::unique('users')->ignore($user),'alpha_dash'],
            'email' => ['bail','required','string','email','max:255',
            			Rule::unique('users')->ignore($user)],
            'password' => ['bail','required','string','min:8','confirmed'],
        ]);

        $user->update($attributes);

        return redirect('/setting/general');
    }

    public function showAvatar()
    {
        $user = auth()->user();
        return view('profile.imagesetting',compact('user'));
    }

    public function updateAvatar(Request $request)
    {
        $user = auth()->user();

        $attributes = request()->validate([
            'avatar' => ['bail','file','image','mimes:jpeg,jpg,png'],
            'cover' => ['bail','file','image','mimes:jpeg,jpg,png']
        ]);

        if(request('avatar')){
            $avatar = sha1(date('YmdHis') . Str::random(30));
            $avatar_name = $avatar . '.' . request('avatar')->getClientOriginalExtension();
            $attributes['avatar'] = request('avatar')->move($this->image_path . '/avatars', $avatar_name);

            $attributes['avatar'] = $avatar_name;
        }

        if(request('cover')){
            $cover = sha1(date('YmdHis') . Str::random(30));
            $cover_name = $cover . '.' . request('cover')->getClientOriginalExtension();
            $attributes['cover'] = request('cover')->move($this->image_path . '/covers', $cover_name);

            $attributes['cover'] = $cover_name;
        }

        $user->update($attributes);

        return redirect('/setting/avatar-and-cover');
    }
}
