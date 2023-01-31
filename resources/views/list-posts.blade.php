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
        <p>Post title --> {{$post->title}}</p>
    @endforeach

</body>

</html>
