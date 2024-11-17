<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DOMDocument;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.form', ['post' => new Post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:100|min:5',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $doc = new DOMDocument();
        $doc->loadHTML($request->get('body'));
        $images = $doc->getElementsByTagName('img');
        $scripts = $doc->getElementsByTagName('script');
        for ($i = 0; $i < $images->length; $i++) {
            $images->item($i)->parentNode->removeChild($images->item($i));
        }
        for ($i = 0; $i < $scripts->length; $i++) {
            $scripts->item($i)->parentNode->removeChild($scripts->item($i));
        }
        $escaped_doc = $doc->saveHTML();

        Post::create([
            'user_id' => auth()->id(),
            'title' => htmlspecialchars($request->get('title')),
            'body' => $escaped_doc,
            'img_url' => $this->imageParse($request),
        ]);
        return redirect()->route('posts.index')->with('success', 'Post created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Parse image
     */
    private function imageParse(Request $request): ?string
    {
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            return $imageName;
        }
        return null;
    }
}
