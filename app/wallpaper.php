<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallpaper extends Model
{
    protected $fillable = ['filename', 'user_id', 'width', 'height', 'size', 'original_name'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(tag::class);
    }

    public function favourite_user()
    {
    	return $this->belongsToMany(user::class,'favourite');
    }
}
