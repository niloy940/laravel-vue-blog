<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user', 'category')->latest()->get();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $attributes = $post->validatePost($request);
        $attributes['photo'] = $post->imageProcessing($request);
        $post->addPost($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $id = $post->id;
        return $post->with('user', 'category')->where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $post->validatePost($request);

        if ($request->photo != $post->photo) {
            $attributes['photo'] = $post->imageProcessing($request);

            $up_folder_path = public_path() . "/upload_img/";
            $image = $up_folder_path . $post->photo;

            if (file_exists($image)) {
                unlink($image);
            }
        } else {
            $attributes['photo'] = $post->photo;
        }

        $post->updatePost($attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $up_folder_path = public_path() . "/upload_img/";
        $image = $up_folder_path . $post->photo;

        if (file_exists($image)) {
            unlink($image);
        }
        $post->deletePost();
    }
}
