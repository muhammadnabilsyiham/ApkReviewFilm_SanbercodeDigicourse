<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();

        return view('post.index', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 2 karakter',
            'exists' => 'Inputan :attribute tidak terdaftar',
            'image' => 'Inputan :attribute harus berupa gambar'
        ]);

        $postImageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads'), $postImageName);

        $post = new Post;
 
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->image = $postImageName;
 
        $post->save();
 
        return redirect('/post');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        return view('post.detail', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:2',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:png,jpg,jpeg'
        ],
        [
            'required' => 'Inputan :attribute harus diisi!',
            'min' => 'Inputan :attribute minimal 2 karakter',
            'exists' => 'Inputan :attribute tidak terdaftar',
            'image' => 'Inputan :attribute harus berupa gambar'
        ]);

        $post = Post::find($id);

        if($request->has('image')) {
            File::delete('uploads/' . $post->image);

            $postImageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads'), $postImageName);

            $post->image = $postImageName;
        }

        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->category_id = $request['category_id'];

        $post->update();

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if($post->image) {
            File::delete('uploads/' . $post->image);
        }

        $post->delete();

        return redirect('/post');
    }
}
