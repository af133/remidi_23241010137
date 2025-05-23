<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','dasboard')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>
<body class="m-0 p-0">

    {{-----------------------------------------------}}
            {{-- This is the navbar section --}}
    {{-----------------------------------------------}}
    
        <?php
            $data=[
                [
                        'nav'=>'Dashboard',
                        'rute'=>'dashboard'
                ],
                [
                    'nav'=>'Profil',
                    'rute'=>'profile',
                ]
                ];
        ?>

    @include('components.navbar', $data)
    

    {{------------------------------------------------}}
        {{-- This is the main content section --}}   
    {{------------------------------------------------}}
    
    <main>
        <p>
             @yield('content')
        </p>
    </main>
    

    {{------------------------------------------------}}
             {{-- This is footer section --}}
    {{------------------------------------------------}}
    
    
    @include('components.footer')

</body>
</html>