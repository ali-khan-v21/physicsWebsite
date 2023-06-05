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
                        <p>انجمن علوم و اعصاب شناختی دانشگاه علوم پزشکی کرمان</p>
                    </div>

                </div>
            </div>
            <div class="row jostify-content-beetween align-items-center">
                <div class="col-lg-6">
                    <img src="/images/writer.jpg" class="rounded img-thumbnail" alt="writers image">
                </div>
                <div class="col-lg-5">
                    <h1>{{ __('public.about_writer') }}</h1>
                    <p>محمد رضا واحد</p>

                    <div class="d-flex pt-3 mb-2">
                        <div class="iconbox mx-4">
                            <i class="bi bi-bookmark-star"></i>
                        </div>
                        <div>
                            <h4>بنیانگذار ودبیر انجمن</h4>
                            <p class="mt-3 mb-4"></p>
                        </div>
                    </div>

                    <div class="d-flex pt-4 mb-3">
                        <div class="iconbox mx-4">
                            <i class="bi bi-bookmark-star"></i>
                        </div>
                        <div>
                            <h4>فیزیک پزشک </h4>
                            <p class="mt-3 mb-4">متخصص علوم اعصاب شناختی</p>
                        </div>
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
                        <a href="/writer/{{ $writer->id}}"
                            style="text-decoration:none;color:black;">
                            <div class="card cardh" >
                                <img class="card-img-top" src="{{ asset('images') . '/' . $writer->profile->image->image_url }}"
                                    alt="writer-img">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}
                                    </h4>
                                    <h6 class="text-primary">{{ $writer->role['name_' . $locale] }}</h6>
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
