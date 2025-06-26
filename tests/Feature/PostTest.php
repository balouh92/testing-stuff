<?php


use App\Http\Requests\CreatePostRequest;
use App\Models\User;

it('validates post request', function () {
    $postRequest = new CreatePostRequest();
    $postRequest->merge([
        'body' => 'This is my first Post',
    ]);
    $postRequest->validate();


});
it('can create post', function () {
    User::factory()->create();
    $postRequest = new CreatePostRequest();
    $postRequest->merge([
        'user_id' => 1,
        'title' => 'Hello World',
        'body' => 'This is my first Post',
    ]);
    $postAction = new \App\Actions\Post\CreatePost();
    $post = $postAction->handle($postRequest);
    $this->assertDatabaseHas('posts', ['id' => 1, 'title' => 'Hello World']);
});
