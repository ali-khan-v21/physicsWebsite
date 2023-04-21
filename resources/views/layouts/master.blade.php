<!DOCTYPE html>
<html lang="en" dir=@php if(app()->getLocale()=='fa'){echo 'rtl';}else{echo 'ltr';} @endphp>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('public.site_name') }} | @yield('title')</title>


    @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    @includeIf('../partials.header')



    @yield('content')


    @includeIf('../partials.footer')



    @vite(['resources/js/app.js'])
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
