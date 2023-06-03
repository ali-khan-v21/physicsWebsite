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
                            <input class="form-control me-2" name="s" type="search"
                                placeholder="{{ __('public.search') }}" aria-label="Search"
                                value="{{ request()->input('s') }}">
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
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="display-5 fw-semibold d-inline">{{ __('public.searchresults') }} :</h2>
                        <h3 class="d-inline"> {{ request()->input('s') }}</h3>

                        <div class="line m-0 mt-4"></div>

                    </div>

                </div>
            </div>

            <div class="row justify-content-start align-items-start mx-auto">
                @forelse ($posts as $post)
                    @component('components.articleCard', [
                        'writer' => $post->writer,
                        'category' => $post->category,
                        'post' => $post,
                        'locale' => $locale,'lgCol'=>4
                    ])
                    @endcomponent

                @empty
                <h3>{{__('public.noresults')}}</h3>
                @endforelse


            </div>
        </div>
    </div>
@endsection
