<header>


    <ul>
        <li><a href="/" target="_self"> {{ __('public.home') }} </a></li>
        <li><a href="/about" target="_self"> {{ __('public.about') }} </a></li>
        <li><a href="/contactus" target="_self"> {{ __('public.contact') }} </a></li>
        <ul>

            <li><a href="#" target="_self"> {{ __('public.language') }} </a></li>
            @foreach (config('app.available_lacales') as $locale)
                <li><a href=/lang/{{$locale}}> {{ __('public.'.$locale) }} </a></li>
            @endforeach
        </ul>
    </ul>
</header>
