<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Gigaland - NFT Marketplace Website</title>
    <link rel="icon" href="images/icon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Gigaland - NFT Marketplace Website" name="description" />
    <meta content="" name="keywords" />
    <meta content="" name="author" />
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Styles -->
    @include('layouts-frontend.partials.styles')
</head>

<body>
    <div id="wrapper">
        @include('layouts-frontend.partials.header')
        {{ $slot }}
        @include('layouts-frontend.partials.footer')
        <a href="#" id="back-to-top"></a>
    </div>
    @include('layouts-frontend.partials.scripts')
</body>

</html>
