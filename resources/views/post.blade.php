<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            padding-left: 40px;
        }

        .regular-input {
            border: 1px solid black;
            width: 20%;
        }
    </style>
</head>

<body>
    <h1>POSTS</h1>
    <form id="postform" method="post" action="submit-data">
        @csrf
        <label>Título de la publicación</label><br>
        <input id="title" type="text" name="title" value="{{ old('title') }}" class="regular-input"
            placeholder="Ingresa aquí el título de la publicación"><br><br>
        <label>Extracto publicación</label><br>
        <input id="extract" type="text" name="extract" class="regular-input"
            placeholder="Ingresa un extracto de la publicación"><br><br>
        <fieldset>
            <label for="caducable">expirable</label>
            <input type="checkbox" id="expirable" name="expirable">
            <label for="comentable">comentable</label>
            <input type="checkbox" id="comentable" name="comentable"><br><br>
        </fieldset>
        <fieldset>
            <label for="private_access">private</label>
            <input type="radio" id="private_access" name="name">
            <label for="public_access">public</label>
            <input type="radio" id="public_access" name="name">
        </fieldset>
        <br><br>
        <label>Contenido publicación</label><br><br>
        <textarea cols="50" rows="5" style="border: 1px solid black" name="content" form="postform"
            placeholder="Ingresa el contenido completo de la publicación"></textarea>
        <br><br>
        <button type="submit">Submit</button>
    </form>

</body>

</html>
