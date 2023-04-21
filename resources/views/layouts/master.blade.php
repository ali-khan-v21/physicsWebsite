<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>انجمن X | @yield('title')</title>
</head>

<body>
    <header>
        <ul>
            <li><a href="#" target="_self"> {{ __('public.home') }} </a></li>
            <li><a href="#" target="_self"> {{ __('public.about') }} </a></li>
            <li><a href="#" target="_self"> {{ __('public.contact') }} </a></li>
            <ul>

                <li><a href="#" target="_self"> {{ __('public.language') }} </a></li>
                @foreach (config('app.available_lacales') as $locale)
                    <li><a href={{ request()->url() }}/{{$locale}}> {{ __('public.'.$locale) }} </a></li>
                @endforeach
            </ul>
        </ul>
    </header>

    @yield('content')


    <footer>
        <h3>footer here</h3>
    </footer>

</body>

</html>
