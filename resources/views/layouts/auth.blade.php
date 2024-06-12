<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adem Ayem - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/css/main/app.css" />
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/css/pages/auth.css" />
    <link rel="shortcut icon" href="{{asset('Mazer')}}/assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset('Mazer')}}/assets/images/logo/favicon.png" type="image/png" />
    @livewireStyles
</head>

<body>

    <div>
        @yield('content')
    </div>

</body>

<!--sweetalert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('Mazer')}}/assets/js/bootstrap.js"></script>
<script src="{{asset('Mazer')}}/assets/js/app.js"></script>
<script src="{{asset('Mazer')}}/assets/js/pages/horizontal-layout.js"></script>
@livewireScripts

</html>
