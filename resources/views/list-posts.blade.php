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
    <p>Total number of posts: {{ $posts->count() }}</p>

    @foreach ($posts as $post)
        <p>Post title --> {{ $post->title }}</p>
        <form id="delete-post" method="POST" action="{{ route('posts.destroy', $post->id) }}">
            <input style="width: 50px; height: 20px;" type="submit" value="delete">
            @csrf @method('DELETE')
        </form>
        <form id="edit-post" method="GET" action="{{ route('posts.edit', $post->id) }}">
            <input style="width: 50px; height: 20px;" type="submit" value="edit">
            @csrf
        </form>
    @endforeach

</body>

</html>
