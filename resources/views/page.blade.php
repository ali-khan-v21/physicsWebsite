@php

    $locale = $app->getLocale();

@endphp

@extends('layouts.master')
@section('title', $category['name_' . $locale])

@section('content')


    <section id="{{ $category['category_key'] }}" class="section-padding border-top px-4">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12 ">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ $category['name_' . $locale] }}</h1>
                        <div class="border border-3 border-primary w-25 my-4"></div>
                        {{-- <div class="line"></div> --}}

                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-between align-items-center mx-auto">

            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">{{__("public.goTo")}}</a>

                    </div>
                </div>
            </div>
        </div>

        {{ $category->id }}
    </section>
    {{-- @foreach ($articles as $article)
{{$row->id}}

@endforeach --}}

@endsection
