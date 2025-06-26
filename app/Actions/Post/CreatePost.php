<?php

namespace App\Actions\Post;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class CreatePost
{
    public function handle(CreatePostRequest $request): void
    {
        try {
            DB::beginTransaction();
            Post::create([
                'title' => $request->title,
                'body' => $request->body,
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
        }
    }
}
