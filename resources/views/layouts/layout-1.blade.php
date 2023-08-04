<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('partials.import-head')


    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>

        @include('partials.import-body')
    </body>
</html>
