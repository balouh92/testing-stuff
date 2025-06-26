<?php


use App\Http\Requests\CreatePostRequest;
use App\Models\User;

beforeEach(function () {
   User::factory()->create();
});

it('passes validation with valid data', function () {
    $data = [
        'user_id' => 1,
        'title' => 'Hello World',
        'body' => 'This is my first post!',
    ];

    $request = new CreatePostRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->passes())->toBeTrue();
});

it('dont passes validation when user is not set', function () {
    $data = [
        'title' => 'Hello World',
        'body' => 'This is my first post!',
    ];

    $request = new CreatePostRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('user_id'))->toBeTrue();
});

it('dont passes validation when title is not set', function () {
    $data = [
        'user_id' => 1,
        'body' => 'This is my first post!',
    ];

    $request = new CreatePostRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('title'))->toBeTrue();
});

it('dont passes when user is not in database', function () {
    $data = [
        'user_id' => 9999,
        'title' => 'Hello World',
        'body' => 'This is my first post!',
    ];

    $request = new CreatePostRequest();
    $validator = Validator::make($data, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('user_id'))->toBeTrue();
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
