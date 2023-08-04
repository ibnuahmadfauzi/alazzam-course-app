<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('partials.import-head')


    </head>
    <body>
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-lg-3">

                    {{-- Import Sidebar --}}
                    @include('partials.sidebar')
                    {{-- end Import Sidebar --}}

                </div>
                <div class="col-lg-9">

                    {{-- Set Content --}}
                    @yield('content')
                    {{-- end Set Content --}}

                </div>
            </div>
        </div>

        @include('partials.import-body')
    </body>
</html>
