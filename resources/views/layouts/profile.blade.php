<!DOCTYPE html>
<html lang="en" dir=@php if(app()->getLocale()=='fa'){echo 'rtl';}else{echo 'ltr';} @endphp>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('public.site_name') }} | @yield('title')</title>


    @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        ul,
        li {
            list-style-type: none;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
<link href="dashboard.css" rel="stylesheet">

</head>

<body>
    @includeIf('../partials.header')

    <section class="section-padding">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('user-profile')}}">
                                <i class="bi bi-house-door"></i>
                                <span data-feather="home"></span>
                                {{ __('public.dashboard') }}
                            </a>
                        </li>




                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-key"></i>

                                {{ __('public.changepassword') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-card-checklist"></i>

                                {{ __('public.resume') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-chat-right-text"></i>
                                <span data-feather="shopping-cart"></span>
                                {{ __('public.comments') }}
                            </a>
                        </li>



                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{ __('public.managing_users') }}</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{----}}">
                                <i class="bi bi-person-bounding-box"></i>
                                <span data-feather="file-text"></span>
                                {{ __('public.members') }}
                            </a>
                        </li>



                    </ul>
                </div>
            </nav>
            <div class="col-md-9 col-lg-10">
                @yield('content')

            </div>
        </div>

    </section>












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
