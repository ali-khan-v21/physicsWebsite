<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انجمن X | @yield('title')</title>
    @vite(['resources/js/app.js'])
    <script src="{{asset('js/main.js')}}"></script>
    @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
</head>

<body>
    @includeIf('../partials.header')
    <button class="btn btn-secondary m-4 p-3">submit</button>


    @yield('content')


    @includeIf('../partials.footer')




</body>

</html>
