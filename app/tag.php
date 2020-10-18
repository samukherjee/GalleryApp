<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['name','slug','username'];

    public function wallpapers()
    {
    	return $this->belongsToMany(wallpaper::class);
    }
}
