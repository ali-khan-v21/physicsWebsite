@php

    use App\Models\Article;
    $locale = $app->getLocale();
@endphp
@extends('layouts.master')
@section('title', __('public.home'))
@section('content')

    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase fw-semibold text-white display-3">{{ __('public.site_name') }}</h1>
                    <h4 class="text-white mt-3">{{ __('public.hero_text') }}</h4>
                    <div class="mt-5 col-sm-12 col-lg-5 mx-auto">
                        <form class="d-flex mt-3">
                            <input class="form-control me-2" name="q" type="search"
                                placeholder="{{ __('public.search') }}" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>



    <div id="subjects" class="section-padding border-top">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.subjects') }}</h1>
                        <div class="line"></div>

                    </div>

                </div>
            </div>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-sm-6 text-center">
                        <a href="#{{ $category['category_key'] }}" class="section-link">
                            <div class="subject theme-shadow p-lg-5 p-4">
                                <div class="iconbox">
                                    <i class="bi bi-book"></i>
                                </div>
                                <h5 class="mt-4 mb-3">{{ $category['name_' . $locale] }}</h5>
                                <p>{{ $category['desc_' . $locale] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
    @foreach ($categories as $category)
        <section id="{{ $category['category_key'] }}" class="section-padding border-top">
            <div class="container">


                <div class="row">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h1 class="display-4 fw-semibold">{{ $category['name_' . $locale] }}</h1>
                            <div class="line"></div>

                        </div>

                    </div>
                </div>
            </div>
            @php
                $posts = $category->articles->take(3);

            @endphp
            <div class="row justify-content-start align-items-start mx-auto">
                <div class="col-3 fixed">

                    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                        <a href="#{{$category->category_key}}"
                            class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                            <svg class="bi me-2" width="30" height="24">
                                <use xlink:href="#bootstrap" />
                            </svg>
                            <span class="fs-5 fw-semibold">{{ $category['name_' . app()->getLocale()] }}</span>
                        </a>


                        <div class="list-group list-group-flush border-bottom scrollarea">
                            @foreach ($category->tags as $tag)
                                <a href="/tag/{{ $tag->tag_key }}" class="list-group-item list-group-item-action py-3 lh-tight"
                                    aria-current="true">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <strong class="mb-1">{{ $tag['name_' . app()->getLocale()] }}</strong>
                                        <small>{{ count($tag->articles) }}</small>
                                    </div>
                                    <div class="col-10 mb-1 small">{{ $tag['desc_' . app()->getLocale()] }}</div>
                                </a>
                            @endforeach





                        </div>
                    </div>

                </div>
                @foreach ($posts as $post)
                    @php

                        $writer = $post->writer;
                    @endphp
                    @component('components.articleCard',
                    ['writer'=>$writer,'category'=>$category,'post'=>$post,
                    'locale'=>$locale
                    ])

                    @endcomponent
                @endforeach

                <div class="text-center pt-5">
                    <a href="/article/{{ $category['category_key'] }}" class="btn btn-secondary mx-auto p-2 fw-semibold ">
                        <h5 class="text-white">{{ __('public.more') }}</h5>
                    </a>
                </div>


            </div>





        </section>
    @endforeach


    <section id="contact" class="section-padding border-top bg-dark">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title text-white">
                        <h1 class="display-4 fw-semibold text-white">{{ __('public.contact') }}</h1>
                        <div class="line bg-white"></div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam hic voluptatum soluta
                            exercitationem aspernatur natus harum nulla dignissimos, ex quidem. Quaerat libero a
                            delectus</p>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <form action="#" method="post" class="row g-4 p-lg-5 p-4 bg-white theme-shadow">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="firstName"
                                placeholder="{{ __('public.enter_firstName') }}">

                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="lastName"
                                placeholder="{{ __('public.enter_lastName') }}">

                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" name="email"
                                placeholder="{{ __('public.enter_email') }}">

                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" name="subject"
                                placeholder="{{ __('public.enter_subject') }}">

                        </div>
                        <div class="form-group col-lg-12">
                            <textarea rows="5" class="form-control" name="message" placeholder="{{ __('public.enter_message') }}"></textarea>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button class="btn btn-primary">{{ __('public.submit') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </section>


@endsection
