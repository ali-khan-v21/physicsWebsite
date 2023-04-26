<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="width:140px;height:auto;" href="/"><img src="images\logo3.svg" alt="{{ __('public.site_name') }}" ></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active mx-3" aria-current="page" href="/#hero">{{ __('public.home') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3"
                            href="/article/cognitive_neuroscience">{{ __('public.cognitive_neuroscience') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3" href="/article/neurophilosophy">{{ __('public.neurophilosophy') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="/article/beginner_tutorials">{{ __('public.beginner_tutorials') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="/article/news">{{ __('public.news') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="/#about">{{ __('public.about') }}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link mx-3" href="/#contact">{{ __('public.contact') }}</a>
                    </li>
                     {{-- @foreach (config('app.available_lacales') as $locale)
                        <li class="nav-item"><a href=/lang/{{ $locale }}  class="nav-link @php if (app()->getLocale()==$locale){echo "border-bottom active border-dark";} @endphp  mx-3"> {{ __('public.' . $locale) }} </a>
                        </li>
                    @endforeach --}}
                    <li class="nav-item dropdown mx-3 ">
                        <a class="nav-link dropdown-toggle active border-bottom border-dark" href="#"
                            id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('public.' . app()->getLocale()) }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (config('app.available_lacales') as $locale)
                                <li><a href=/lang/{{ $locale }}
                                        class="dropdown-item @php if (app()->getLocale()==$locale){echo "border-left active border-dark";} @endphp">
                                        {{ __('public.' . $locale) }} </a></li>
                            @endforeach

                        </ul>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <a href="{{ route('login-form') }}" class="btn btn-primary">{{ __('public.signin_up') }}</a>

                </div>

            </div>


        </div>

    </nav>





</header>
