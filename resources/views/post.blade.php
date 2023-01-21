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

        .alert {
            color: red;
        }
    </style>
</head>

<body>
    <h1>{{ __('posts') }}</h1>
    <form id="postform" method="post" action="submit-data">
        @csrf

        <!-- TITLE -->
        <label>{{ __('messages.post_title') }}</label><br>
        <input id="title" type="text" name="title" value="{{ old('title') }}"
            class="@error('title') is-invalid @enderror regular-input"
            placeholder='{{ __('messages.post_title_placeholder') }}'>
        @error('title')
            <div class="alert">{{ $message }}</div>
        @enderror
        <br>

        <!-- EXTRACT -->
        <label>{{ __('messages.post_extract') }}</label><br>
        <input id="extract" type="text" name="extract" value="{{ old('extract') }}" class="regular-input"
            placeholder='{{ __('messages.post_extract_placeholder') }}'><br><br>

        <!-- CHECKS -->
        <fieldset>
            <label for="expirable">{{ __('expirable') }}</label>
            <input type="checkbox" id="expirable" name="expirable" @checked(old('expirable'))>
            <label for="comentable">{{ __('comentable') }}</label>
            <input type="checkbox" id="comentable" name="comentable" @checked(old('comentable'))><br>
        </fieldset>

        <!-- RADIOS -->
        <fieldset>
            <label for="private_access">{{ __('messages.private_access') }}</label>
            <input type="radio" id="private_access" name="private_access" @checked(old('private_access'))>
            <label for="public_access">{{ __('messages.public_access') }}</label>
            <input type="radio" id="public_access" name="public_access" @checked(old('public_access'))>
        </fieldset>
        <br>

        <!-- CONTENT -->
        <label>{{ __('messages.post_content') }}</label><br>
        <textarea cols="50" rows="5" class="@error('content') is-invalid @enderror regular-input" id="content"
            name="content" form="postform" placeholder='{{ __('messages.post_content_placeholder') }}'>{{ old('content') }}</textarea>
        @error('content')
            <div class="alert">{{ $message }}</div>
        @enderror
        <br><br>

        <button type="submit">{{ __('messages.submit') }}</button>
    </form>

</body>

</html>
