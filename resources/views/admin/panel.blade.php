@php
use App\Models\Article;
    $locale = $app->getLocale();
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir=@php if(app()->getLocale()=='fa'){echo 'rtl';}else{echo 'ltr';} @endphp>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('public.site_name') }} | @yield('title')</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.24.7/jodit.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.24.7/jodit.min.js"></script>


    @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>


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


<!-- Custom styles for this template -->
<link href="dashboard.css" rel="stylesheet">
</head>

<body>


   @include('partials.header')

    <div class="container-fluid section-padding">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/admin/">
                                <i class="bi bi-house-door"></i>
                                <span data-feather="home"></span>
                                {{ __('public.dashboard') }}
                            </a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pendingPosts') }}">
                                <i class="bi bi-question-octagon"></i>
                                <span data-feather="file"></span>
                                {{ __('public.pending_posts') }}
                                @php
                                    $res=Article::withoutGlobalScope('order')->where("status",0)->get();
                                @endphp
                                <span class="text-danger">{{count($res)}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('comments') }}">
                                <i class="bi bi-chat-right-text"></i>
                                <span data-feather="shopping-cart"></span>
                                {{ __('public.comments') }}
                            </a>
                        </li>
                        @if (Auth::user()->role->role_value<=2)

                        <li class="nav-item">
                            <a class="nav-link" href="/admin/trashed">
                                <i class="bi bi-trash3 "></i>
                                <span data-feather="trash"></span>
                                {{ __('public.trashbin') }}
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->role->role_value<=2)

                        <li class="nav-item">
                            <a class="nav-link" href="/admin/category">
                                <i class="bi bi-tags"></i>
                                <span data-feather="trash"></span>
                                {{ __('public.editCategory') }}
                            </a>
                        </li>
                        @endif
                        @if (Auth::user()->role->role_value<=2)

                        <li class="nav-item">
                            <a class="nav-link" href="/admin/tag">
                                <i class="bi bi-tags"></i>
                                <span data-feather="trash"></span>
                                {{ __('public.editSubcats') }}
                            </a>
                        </li>
                        @endif


                    </ul>
                    @if (Auth::user()->role->role_value<=2)

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{ __('public.managing_users') }}</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                                <i class="bi bi-person-bounding-box"></i>
                                <span data-feather="file-text"></span>
                                {{ __('public.members') }}
                            </a>
                        </li>


                    </ul>
                    @endif
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('pagetitle')</h1>
                    @if (session()->get('status_message'))
                        <span
                            class="alert alert-{{ session('status_type') }}">{{ session()->get('status_message') }}</span>
                    @endif


                    <div class="btn-toolbar mb-2 mb-md-0">

                        @php
                            $url = url()->current();
                            $url = explode('/', $url);

                        @endphp
                        @unless (end($url) == 'newpost')
                            <a href="/admin/newpost" class="btn btn-success">{{ __('public.new_post') }}</a>
                        @endunless
                    </div>
                </div>



                @yield('maincontent')

            </main>
        </div>
    </div>



    @vite(['resources/js/app.js'])
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script>
        const editor = Jodit.make('#editor1');
        const editor = Jodit.make('#editor2');
    </script>
</body>

</html>
