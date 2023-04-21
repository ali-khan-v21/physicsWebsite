<!DOCTYPE html>
<html lang="en" dir=@php if(app()->getLocale()=='fa'){echo 'rtl';}else{echo 'ltr';} @endphp>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انجمن X | @yield('title')</title>

    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
    @vite(['resources/sass/app.scss'])
    {{-- <link rel="stylesheet" href="{{asset("css/main.css")}}"> --}}
</head>

<body>
    @includeIf('../partials.header')



    @yield('content')


    @includeIf('../partials.footer')



    @vite(['resources/js/app.js'])
</body>

</html>
