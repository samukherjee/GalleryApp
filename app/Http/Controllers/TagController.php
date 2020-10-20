<?php

namespace App\Http\Controllers;

// use \Str;
use App\Tag;
use App\Wallpaper;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store','create']);
    }

    public function index()
    {
        $tags = tag::withCount('wallpapers')->paginate(20);

        return view('tags.index',compact('tags'));
    }

    public function create()
    {
        $wallpapers = wallpaper::where([
                'status' => 0,
                'user_id'=> auth()->user()->id
        ])->take(20)->get();

        return view('tags.untag', compact('wallpapers'));
    }

    public function store(Request $request, $wallpaperId)
    {
        // validation for tags
        request()->validate([
            'tags' => ['bail','required','string']
        ]);

        $tags = explode(',', $request->tags);
        $ids = [];

        foreach($tags as $tag) // write logic for "tag should not be null"
        {
            $ids[] = Tag::firstOrCreate([
                'name' => trim($tag),
                'slug' => \Str::slug(trim($tag)),
                'username' => auth()->user()->username
            ])->id;
        }

        $wallpaper = wallpaper::findOrFail($wallpaperId);
        $wallpaper->tags()->attach($ids);
    }

    public function show($slug)
    {
        $tags = Tag::with('wallpapers')->whereSlug($slug)->firstOrFail();

        $wallpapers = $tags->wallpapers()->paginate(42);

        return view('tags.show', compact(['tags','wallpapers']));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}