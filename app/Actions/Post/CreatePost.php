<?php

namespace App\Actions\Post;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class CreatePost
{
    public function handle(CreatePostRequest $request): Post
    {
       return DB::transaction(function () use ($request) {
           $post = new Post();
           $post->title = $request->title;
           $post->body = $request->body;
           $post->user_id = $request->user_id;
           $post->save();
           return $post;
       });

    }
}
