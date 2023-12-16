<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Demo Project</title>
    <style>
        #alert-close {
            width: 50%;
        }

        @media (max-width: 768px) {
            #alert-close {
                width: 95%;
            }
        }
    </style>
    @yield('css')
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #8a0303">
        <div class="container-fluid">
            <a class="navbar-brand " href="{{ route('user.dashboard') }}">Demo Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>
                @php
                    $profile = Auth::user();
                @endphp
                <form class="d-flex">
                    <a class="navbar-brand" href=" ">
                        Image
                    </a>
                </form>
            </div>
        </div>
    </nav>
    @if (session()->has('message'))
        <div class="position-fixed fixed-bottom  alert alert-success alert-dismissible fade show my-2 mx-auto py-2 text-center"
            role="alert" id="alert-close">
            {{ session()->get('message') }}
        </div>
    @endif

    @yield('content')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.navbar-nav a.navbar-link').on('click', function() {
                var navbarToggle = $('.navbar-toggle');
                if (navbarToggle.is(':visible')) {
                    navbarToggle.trigger('click');
                }
            });
        });
    </script>

    {{-- Script for Closing Alert Automatically --}}
    <script>
        setTimeout(function() {
            // Closing the alert
            $('#alert-close').alert('close');
        }, 2000);
    </script>
    @yield('script')
</body>

</html>
