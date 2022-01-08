<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<h1>Детали коммпании</h1>
<div>
    <h2>
        {{ $company->name }}
    </h2>
    <div class="redirect-block">
        <a target="_blank" href="{{ route('tracking.redirect', [ 'company_id' => $company->id]) }}">
            {{ $company->website }}
        </a>
    </div>
    <div>
        <a href="{{ url()->previous() }}">Back</a>
    </div>
</div>
</body>
</html>
