<?php


test('can create post', function () {
    $postAction = new \App\Actions\Post\CreatePost();
    $postRequest = new \App\Http\Requests\CreatePostRequest();
    $postRequest->setJson([
        'title' => '1',
        'body' => '2'
    ]);
    $postAction->handle(
        $postRequest
    );
});
