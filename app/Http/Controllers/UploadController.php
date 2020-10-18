<?php

namespace App\Http\Controllers;

use App\wallpaper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\WallpapersUploadRequest;

class UploadController extends Controller
{
    private $wallpaper_path;

    public function __construct()
    {
        $this->wallpaper_path = storage_path('app/public');
        $this->middleware('auth')->only(['create','store','destroy']);
    }

    public function create()
    {
        return view('wallpapers.upload');
    }

    public function store(WallpapersUploadRequest $request)
    {
        $wallpaper = $request->validated()['file'];

        if (!is_dir($this->wallpaper_path)) { mkdir($this->wallpaper_path, 0777); }

        $original_name = basename($wallpaper->getClientOriginalName());
        $name = sha1(date('YmdHis') . Str::random(30));
        $save_name = $name . '.' . $wallpaper->getClientOriginalExtension();
        $resize_name = $name . '.' . $wallpaper->getClientOriginalExtension();

        // Making a thumbnail image
        Image::make($wallpaper)
            ->resize(300, null, function ($constraints) {
                $constraints->aspectRatio();
            })
            ->save($this->wallpaper_path . '/thumbnail/' . $resize_name);

        // Saving to stoage
        $wallpaper->move($this->wallpaper_path . '/wallpapers', $save_name);

        // Getting the size of image
        $size = round(Storage::size('public/wallpapers/'.$save_name)/1048576, 1);

        // Saving to database
        wallpaper::create([
            'filename'          => $save_name,
            'user_id'           => auth()->user()->id,
            'width'             => $request->validated()['width'],
            'height'            => $request->validated()['height'],
            'size'              => $size,
            'original_name'     => $original_name
        ]);

        return response()->json(['message' => $original_name.' saved Successfully.'], 200);
    }
}
