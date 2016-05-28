<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.head')

</head>

<body>

    @include('layouts.navbar')

    <div class="container">
        @yield('content')
    </div>
    
    <footer>
        @include('layouts.footer')
    </footer>
    
    @include('links.js_home')


</body>

</html>
