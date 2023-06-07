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
                <img src="{{ asset('images') . '/' . $writer->profile->image->image_url }}" class="rounded img-thumbnail w-75"
                    alt="writer-image">
            </div>
            <div class="col-lg-6">

                <h1>{{ __('public.about_writer') }}</h1>
                <br>
                <h3>{{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}
                </h3>
                <div class="row">
                    @forelse ($writer->resumes as $resume)
                        <div class="col-sm-10 col-lg-10">

                            <div class="d-flex pt-3 mb-2">
                                <div class="iconbox mx-4">
                                    <i class="bi bi-bookmark-star"></i>
                                </div>
                                <div>


                                    <h4>{{ $resume['title_' . $locale] }}</h4>
                                    {{-- <h5>{{$resume['desc_'.$locale]}}</h5> --}}
                                    <p class="mt-3 mb-4">{{ $resume['desc_' . $locale] }}</p>

                                </div>


                            </div>
                        </div>
                    @empty
                        <div class="d-flex pt-3 mb-2">
                            <div class="iconbox mx-4">
                                <i class="bi bi-bookmark-star"></i>
                            </div>
                            <div>
                                <h5>{{ __('public.noresume') }}</h5>
                            </div>
                        </div>
                    @endforelse
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
