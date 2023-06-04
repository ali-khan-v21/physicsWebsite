<?php
use App\Models\Category;
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="width:140px;height:auto;" href="/"><img src="{{asset("images\logo3.svg")}}"
                    alt="{{ __('public.site_name') }}"></a>
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
                        <a class="nav-link mx-3" href="/about">{{ __('public.about') }}</a>
                    </li>
                    @php
                        $categories = Category::where('navbar', 1)->get();

                    @endphp
                    @foreach ($categories as $category)
                        @php
                            $tags = $category->tags;
                            // dd($tags);
                        @endphp
                        <li class="nav-item @unless (count($tags) < 2) dropdown @endunless">
                            <a
                                class="nav-link @unless (count($tags) < 2) dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"@endunless>
                          {{ $category['name_' . app()->getLocale()] }}
                        </a>
                        @if (count($tags) > 0)
<ul class="dropdown-menu">
                                @foreach ($tags as $tag)
                        <li><a class="dropdown-item" href="/tag/{{$tag->tag_key}}">{{ $tag['name_' . app()->getLocale()] }}</a></li>
                    @endforeach
                </ul>
                @endif

                </li>
                @endforeach
                {{-- <li class="nav-item">
                        <a class="nav-link mx-3"
                            href="/article/cognitive_neuroscience">{{ __('public.cognitive_neuroscience') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3" href="/article/neurophilosophy">{{ __('public.neurophilosophy') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-3"
                            href="/article/beginner_tutorials">{{ __('public.beginner_tutorials') }}</a>
                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link mx-3" href="/article/news">{{ __('public.news') }}</a>
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
                @guest
                    <div class="navbar-nav">
                        <a href="{{ route('login') }}" class="btn btn-primary">{{ __('public.signin_up') }}</a>

                    </div>
                @else
                    <li class="nav-item dropdown mx-5" style="list-style-type: none;">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}


                            <i class="bi bi-person-circle"></i>
                        </a>

                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            @if (Auth::user()->role['role_value'] <= 2)
                                <a class="dropdown-item" href="{{ route('admin_dashboard') }}">
                                    {{ __('auth.panel') }}

                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('user-profile') }}">
                                {{ __('public.profile') }}

                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('auth.Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest


            </div>


        </div>

    </nav>





</header>
