<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swim Club - Home</title>
    @Vite(['resources/css/style.css', 'resources/js/app.js', 'resources/css/app.css'])
{{--    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>--}}
{{--    <link rel="stylesheet" href= {{ Vite::asset('resources/css/style.css') }}>--}}
</head>

<body class="h-full">
    <div class="min-h-full">
