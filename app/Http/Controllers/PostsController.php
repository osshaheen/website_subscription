<?php

namespace App\Http\Controllers;

use App\Http\Requests\newPostRequest;
use App\Jobs\addSubscripersToPostToBeMailed;
use App\Http\Resources\createNewPostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use function MongoDB\Driver\Monitoring\addSubscriber;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(newPostRequest $request)
    {
        $post = Post::create($request->all());
        $job = new addSubscripersToPostToBeMailed($post);
        dispatch($job)->delay(now()->addMinutes(1));
        return new createNewPostResource($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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
}
