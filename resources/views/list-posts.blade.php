<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List posts</title>
</head>

<body>
    @include('components.navbar')
    <h3>Total number of posts: {{ $posts->count() }}</h3>

    @foreach ($posts as $post)
        <p>Post title: {{ $post->title }}</p>
        <p>Post author: {{$post->name}}</p>
        <form id="edit-post" method="GET" action="{{ route('posts.edit', $post->id) }}">
            <input style="width: 50px; height: 30px;" type="submit" value="🖋">
            @csrf
        </form>
        <br>
        <form id="delete-post" method="POST" action="{{ route('posts.destroy', $post->id) }}">
            <input style="width: 50px; height: 30px;" type="submit" value="🗑">
            @csrf @method('DELETE')
        </form>
    @endforeach

</body>

</html>
