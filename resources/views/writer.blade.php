@php

    use App\Models\Article;
    $locale = $app->getLocale();
@endphp
@extends('layouts.master')
@section('title', __('public.writer'))

@section('content')
    <section class="section-padding">

        <div class="row jostify-content-beetween align-items-center">
            <div class="col-lg-6">
                <img src="{{asset('images').'/'.$writer->profile->image->image_url}}" class="rounded img-thumbnail" alt="writer-image">
            </div>
            <div class="col-lg-5">
                <h1>{{ __('public.about_writer') }}</h1>
                <br>
                <h4>{{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}</h4>

                <div class="d-flex pt-3 mb-2">
                    <div class="iconbox mx-4">
                        <i class="bi bi-bookmark-star"></i>
                    </div>
                    <div>
                        <h4> resume here</h4>
                        <p class="mt-3 mb-4"></p>
                    </div>
                </div>


            </div>
        </div>

    </section>
    <section class="mb-4">
        <div class="row justify-content-start align-items-start gy-5 mx-auto">
            @forelse ($posts as $post)


                @component('components.articleCard', [
                    'writer' => $writer,
                    'category' => $post->category,
                    'post' => $post,
                    'locale' => $locale,
                    'lgCol' => 3,
                ])
                @endcomponent

            @empty
                no posts found for writer
            @endforelse

        </div>

    </section>




@endsection
