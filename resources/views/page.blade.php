@php
    use App\Models\Writer;

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
        <div class="row justify-content-start align-items-start gy-5 mx-auto">
            @foreach ($posts as $post)
                @php

                    $writer = Writer::find($post['writer_id']);
                @endphp
                <div class="col-lg-3 col-sm-10 col-md-6">
                    <div class="card" style="width: 18rem;">
                    <img src="@if ($post['image_url'] == null) {{ asset('/images/posts/default.jpg') }} @else {{ asset('/images/posts/' . $post['image_url']) }} @endif"
                    class="card-img-top" alt="post">
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($post['title_' . $locale] != null)
                                    {{ $post['title_' . $locale] }}
                                @else
                                    <span class="text-danger"><sub>only persain title available for this post</sub></span>
                                    <br />

                                    {{ $post['title_fa'] }}
                                @endif
                            </h5>
                            <p class="card-text">
                                @if ($post['text_' . $locale] != null)
                                    @php echo mb_strimwidth($post['text_' . $locale], 0, 125, "..."); @endphp
                                @else
                                    <span class="text-danger"><sub>only persain text available for this post</sub></span>
                                    <br />

                                    @php echo mb_strimwidth($post['text_fa'], 0, 125, "..."); @endphp
                                @endif
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ __('public.category') }} : {{ $category['name_' . $locale] }}
                                <br>

                            {{ __('public.writer') }} :
                            {{ $writer['firstname_' . $locale] . ' ' . $writer['lastname_' . $locale] }}</li>

                        </ul>
                        <div class="card-body">
                            <a href="/article/{{$category['category_key']}}/{{$post['id']}}" class="btn btn-primary">{{ __('public.goTo') }}</a>

                        </div>
                        <div class="card-footer text-muted">
                            {{ __('public.lastupdate') }} :
                            {{ $post['updated_at'] }}
                        </div>
                    </div>
                </div>
            @endforeach




        </div>


    </section>
    {{-- @foreach ($articles as $article)
{{$row->id}}

@endforeach --}}

@endsection
