<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('shopping-cart.png') }}" />
</head>

<body>
    <div class="container">
        <div class="mx-auto">
            <div class="card text-center">
                <div class="card-header">
                    @yield('card-header')
                </div>
                @yield('body')
                <div class="card-footer text-muted">
                    <a href="https://lucasvscs.github.io/my-portfolio/" target="_blank">
                        Lucas VSCS <span id="yearNow"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>