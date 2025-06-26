<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): void
    {
        //
    }
}
