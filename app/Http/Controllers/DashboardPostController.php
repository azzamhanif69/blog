<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('/dashboard/post/index', [

            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',  // Pastikan category di ketik dengan benar
            'body' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/post')->with('success', 'berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard.post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard.post.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
        if ($post->author->id !== auth()->user()->id) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'tittle' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/post')->with('success', 'berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/dashboard/post')->with('success', 'deleted sukses');
    }

    public function cekSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
