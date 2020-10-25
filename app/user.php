<?php

namespace App;

use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'avatar' , 'cover', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
         if (Hash::needsRehash($value)) {
             $value = Hash::make($value);
         }

         $this->attributes['password'] = $value;
    }

    public function getAvatarAttribute($value)
    {
        if($value){
            return '/storage/avatars/'.$value;
        } else{
            return '/images/default-avatar.jpg';
        }
    }

    public function getCoverAttribute($value)
    {
        if($value){
            return '/storage/covers/'.$value;
        } else{
            return '/images/default-cover.jpg';
        }
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function wallpapers()
    {
        return $this->hasMany(wallpaper::class);
    }

    public function favourite_wallpaper(){
        return $this->belongsToMany(wallpaper::class,'favourite');
    }
}