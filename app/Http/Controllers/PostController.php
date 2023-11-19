<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepostRequest;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tittle = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $tittle = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $tittle = ' by ' . $author->name;
        }

        return view('blog', [
            "tittle" => "All Blog" . $tittle,
            "active" => "blog",
            // "posts" => Post::all()
            "posts" => Post::latest()->filter(request(['cari', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post', [
            "tittle" => "Single Post",
            "active" => "blog",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
