<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallpaper extends Model
{
    protected $fillable = ['filename', 'user_id', 'width', 'height', 'size', 'original_name'];

    public function tags()
    {
    	return $this->belongsToMany(tag::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
