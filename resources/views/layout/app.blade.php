<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Unit Conversion </title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    @livewireStyles
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Unit Conversion</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('units.index')}}">Units</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Products</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('convert')}}">Converter</a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<div class="container mt-5">

    @if(Session::has('success'))
        <div class="alert alert-success ">
            <i class=" fa fa-check cool-green "></i>
            {{ nl2br(Session::get('success')) }}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger ">
            <i class=" fa fa-check cool-green "></i>
            {{ nl2br(Session::get('error')) }}
        </div>
    @endif

    @yield('content')
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
@livewireScripts

</body>
</html>
