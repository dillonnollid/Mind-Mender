<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>

    <body class="mainContainer">
        <div class="app">

            <header class="row">
                @include('includes.header')
            </header>

            <div id="main" class="row">
                @yield('content')
            </div>

            <footer class="row">
                @include('includes.footer')
            </footer>

        </div>
    </body>

</html>



