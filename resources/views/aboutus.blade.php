@php
    use App\Models\User;

    $locale = $app->getLocale();
    // dd($writers);
@endphp

@extends('layouts.master')

@section('title')
    {{ __('public.about') }}
@endsection

@section('content')
    <section id="about" class="section-padding">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.about') }}</h1>
                        <div class="line"></div>
                        <p>انجمن علوم اعصاب شناختی دانشگاه علوم پزشکی کرمان</p>
                    </div>

                </div>
            </div>
            <div class="row jostify-content-beetween align-items-center">
                <div class="col-lg-6">
                    <img src="{{ asset('images') . '/' . $writers[0]->profile->image->image_url }}"
                        class="rounded img-thumbnail" alt="writers image">
                </div>
                <div class="col-lg-5">
                    <h1>{{ __('public.about_writer') }}</h1>
                    <h3>{{ $writers[0]->profile['firstname_' . $locale] . ' ' . $writers[0]->profile['lastname_' . $locale] }}</h3>

                    <div class="row">
                        @forelse ($writers[0]->resumes as $resume)
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
        </div>
    </section>
    <section id="writers" class="mb-5">

        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.writers') }}</h1>
                        <div class="line"></div>
                    </div>

                </div>
            </div>
            <div class="row jostify-content-beetween align-items-center">
                @forelse ($writers as $writer)
                    <div class="col-sm-10 col-lg-3" style="width: 22rem;">
                        <a href="/writer/{{ $writer->id }}" style="text-decoration:none;color:black;">
                            <div class="card cardh">
                                <img class="card-img-top"
                                    src="{{ asset('images') . '/' . $writer->profile->image->image_url }}"
                                    alt="writer-img">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}
                                    </h4>
                                    <h6 class="text-primary">{{ $writer->role['name_' . $locale] }}</h6>
                                    <ul style="list-style-type:none;">
                                        @foreach ($writer->resumes as $resume)
                                            <li>{{ $resume['title_' . $locale] }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>

                @empty
                    no writers found !
                @endforelse

            </div>
        </div>
    </section>
@endsection
