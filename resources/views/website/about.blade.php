<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>

    @viteReactRefresh
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/js/app.tsx'])
</head>
<body>

    <div class="flex gird grid-cols-3">
        {{-- Gradient Div --}}
        <h1 class="text-center bg-yellow-400 text-xl">Hello World</h1>
    </div>

    <br /><br />

    <div>
        <h2>About us</h2>  
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit ab porro natus culpa possimus laborum eum cumque expedita, repellat, eius fugiat. Incidunt tempora blanditiis sunt repellendus animi ducimus libero fugit!</p>
    </div>
    
</body>
</html>