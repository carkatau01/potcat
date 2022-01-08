<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<h1>Каталог Компаний!</h1>
<div>
    @foreach ($companies as $company)
        @if ($loop->first)
            This is the first iteration.
        @endif

        @if ($loop->last)
            This is the last iteration.
        @endif

        <p>This is user {{ $company->id }} - {{ $company->name }}</p>
        <p>
            <a href="{{ route('company.show', [$company->id]) }}">Details</a></p>
    @endforeach
</div>
</body>
</html>
