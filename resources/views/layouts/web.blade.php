<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TUJ Owl Nest</title>
        @viteReactRefresh
        @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/js/app.tsx'])
    </head>
    <body>
        @yield('content')
    </body>
</html>
