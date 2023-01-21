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
    <h1>{{__('posts')}}</h1>
    <form id="postform" method="post" action="submit-data">
        @csrf
        <label>{{__('messages.post_title')}}</label><br>
        <input id="title" type="text" name="title" value="{{ old('title') }}" class="regular-input"
            placeholder='{{__('messages.post_title_placeholder')}}'><br><br>
        <label>{{__('messages.post_extract')}}</label><br>
        <input id="extract" type="text" name="extract" class="regular-input"
            placeholder='{{__('messages.post_extract_placeholder')}}'><br><br>
        <fieldset>
            <label for="caducable">{{__('expirable')}}</label>
            <input type="checkbox" id="expirable" name="expirable">
            <label for="comentable">{{__('comentable')}}</label>
            <input type="checkbox" id="comentable" name="comentable"><br><br>
        </fieldset>
        <fieldset>
            <label for="private_access">{{__('messages.private_access')}}</label>
            <input type="radio" id="private_access" name="name">
            <label for="public_access">{{__('messages.public_access')}}</label>
            <input type="radio" id="public_access" name="name">
        </fieldset>
        <br><br>
        <label>{{__('messages.post_content')}}</label><br><br>
        <textarea cols="50" rows="5" style="border: 1px solid black" name="content" form="postform"
            placeholder='{{__('messages.post_content_placeholder')}}'></textarea>
        <br><br>
        <button type="submit">{{__('messages.submit')}}</button>
    </form>

</body>

</html>
