<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('img/devchallenges.png') }}" />
        <link rel="shortcut icon" type="image/x-icon" href="https://devchallenges.io/" />
        <title>Image Uploader</title>

        <style>
            body {
                background-color: rgb(250, 250, 251);
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app">
            <home/>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
