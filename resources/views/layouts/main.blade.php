<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('include.styleadmin')

</head>

<body class="animsition">
    <div class="page-wrapper">

        @extends('parcial.sidebar')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            @extends('parcial.header')

            @yield('content')
        </div>

    </div>

</body>

@include('include.jsadmin')

</html>
<!-- end document-->
