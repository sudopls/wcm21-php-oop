<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Eager loading posts med user
        $posts = Post::with('user')->get();
        // Hämta och sortera baserat på skapande-datum
        // $posts = Post::latest()->get();

        // Hämta och sortera i bokstavsordning (titel)
        // $posts = Post::orderBy('title', 'asc')->get();

        // Ni kan också hämta saker baserat på attribut
        // $posts = Post::where('title', 'titel-ni-söker')->get();

        return view('posts/index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all tags
        $tags = Tag::all();

        // Return view with $tags
        return view('posts/create', [
            'tags'  =>   $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->title = request('title');

        $post->content = request('content');

        $post->user_id = Auth::user()->id;

        $post->save();

        // Plockar ut tags->id direkt från $request här. Behöver inte loopa över som vi försökte innan. Kör sedan sync istället för attach, den var lite smidigare pga. Håller koll på våra relationer åt oss
        $post->tags()->sync($request->tags);

        return redirect('/posts/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $heroes = Hero::class->get();
        // return view('posts/edit', [
        //     'post' => $post
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content'   =>  'required',
        ]);

        $post->update($request->all());

        return redirect()
            ->route('posts.show', ['post' => $post])
            ->with('success', 'Post succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
