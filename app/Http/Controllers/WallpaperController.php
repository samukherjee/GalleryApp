<?php

namespace App\Http\Controllers;

use App\wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WallpaperController extends Controller
{

    public function latest()
    {
        $wallpapers = wallpaper::orderBy('created_at', 'desc')->paginate(42);
        
        return view('wallpapers.latest', compact('wallpapers'));
    }

    public function random()
    {
        $wallpapers = wallpaper::inRandomOrder()->paginate(42);
        
        return view('wallpapers.random', compact('wallpapers'));
    }

    public function show($id)
    {
        $wallpaper = wallpaper::with(['user','tags'])->find($id);
        $wallpaper->increment('views');

        $mode = $wallpaper->height > $wallpaper->width ? 'h-screen w-auto':'w-full h-auto';

        return view('wallpapers.show', compact(['wallpaper','mode']));
    }
}
