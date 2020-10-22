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

    public function store(Request $request, $imageId)
    {
        $image = Wallpaper::findOrFail($imageId);

        $request->validate([
            'tags' => 'bail|required|string'
        ]);

        $tags = collect([]);

        foreach (explode(',', $request->tags) as $tag) {
            $tags->push(Tag::firstOrCreate([
                'name' => $name = trim($tag),
                'slug' => \Str::slug($name),
                'username' => auth()->user()->username
            ]));
        }

        $image->tags()->attach($tags->pluck('id'));

        return $tags;
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

    public function tagDetachFromWallpaper(Request $request, $wallpaperId)
    {
        $wallpaper = Wallpaper::findOrFail($wallpaperId);

        $wallpaper->tags()->detach($request->id);
        
        return response()->json(['success' => 'success']);
    }

    public function destroy($id)
    {
        //
    }
}