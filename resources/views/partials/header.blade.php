<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{__("public.site_name")}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">{{ __('public.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">{{ __('public.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contactus">{{ __('public.contact') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('public.language') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (config('app.available_lacales') as $locale)
                                <li><a href=/lang/{{ $locale }} class="dropdown-item"> {{ __('public.' . $locale) }} </a></li>
                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div>
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="{{__('public.search')}}" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </nav>
        </div>
    </nav>


</header>
