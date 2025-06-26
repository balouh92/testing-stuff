<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="{{route('post.store')}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{auth()->id()}}">
    <div>
        <input type="text" name="title" placeholder="Titel">
        @error('title') {{$message}} @enderror
    </div>
    <div>
        <textarea placeholder="Inhalt" name="body"></textarea>
        @error('body') {{$message}} @enderror

    </div>
    <button>Speichern</button>
</form>

<div style="padding-top: 20px">
    @foreach($posts as $post)
        {{$post->id}}
        {{$post->title}}
        {{$post->body}}
        <form action="{{route('post.destroy',$post)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>X</button>
        </form>
        <form action="{{route('comment.store')}}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <div>
                <input type="text" name="title" placeholder="Titel">
                @error('title') {{$message}} @enderror
            </div>
            <div>
                <textarea placeholder="Inhalt" name="body"></textarea>
                @error('body') {{$message}} @enderror

            </div>
            <button>Speichern</button>
        </form>
    @endforeach
</div>
</body>
</html>
