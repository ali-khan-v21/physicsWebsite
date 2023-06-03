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

                        <h3 class="fw-semibold"><a href="{{ route('index') }}"
                                style="text-decoration: none;">{{ __('public.home') }}</a>{{ ' > ' . $category['name_' . $locale] }}
                        </h3>
                        <div class="border border-3 border-primary w-25 my-4"></div>
                        {{-- <div class="line"></div> --}}

                    </div>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-3 fixed">

                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                    <a href="/"
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

            <div class="col-9">
                <div class="container">



                    <div class="row justify-content-start align-items-start gy-5 mx-auto">
                        @foreach ($posts as $post)
                            @php

                                $writer = $post->writer;
                            @endphp

                            @component('components.articleCard',
                            ['writer'=>$writer,'category'=>$category,'post'=>$post,
                            'locale'=>$locale,'lgCol'=>4
                            ])
                            @endcomponent
                            {{-- <div class="col-lg-4 col-sm-10 col-md-6">
                                <a href="/article/{{ $category['category_key'] }}/{{ $post['id'] }}"
                                    style="text-decoration:none;color:black;">


                                    <div class="card cardh" style="width: 22rem;">
                                        <img src="@if ($post->image['image_url'] == null) {{ asset('/images/posts/default.jpg') }} @else {{ asset('/images/posts/' . $post->image['image_url']) }} @endif"
                                        class="card-img-top h-auto" alt="{{$post->id}} post image">
                                        <div class="card-body">
                                            <h5 class="card-title">

                                                @if ($post['title_' . $locale] != null)
                                                    {{ $post['title_' . $locale] }}
                                                @else
                                                    <span class="text-danger"><sub>only persain title available for this
                                                            post</sub></span>
                                                    <br />

                                                    {{ $post['title_fa'] }}
                                                @endif
                                            </h5>
                                            <p class="card-text">
                                                @if ($post['text_' . $locale] != null)
                                                    @php echo mb_strimwidth($post['text_' . $locale], 0, 125, "..."); @endphp
                                                @else
                                                    <span class="text-danger"><sub>only persain text available for this
                                                            post</sub></span>
                                                    <br />

                                                    @php echo mb_strimwidth($post['text_fa'], 0, 125, "..."); @endphp
                                                @endif
                                            </p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{ __('public.category') }} :
                                                <a href="/article/{{ $post->category['category_key'] }}"
                                                    style="text-decoration: none;">{{ $post->category['name_' . $locale] }}</a>,
                                                @foreach ($post->tags as $tag)
                                                    <a href="/tag/{{ $tag['tag_key'] }}"
                                                        style="text-decoration: none;">{{ $tag['name_' . $locale] }}</a>,
                                                @endforeach
                                                <br>

                                                {{ __('public.writer') }} :
                                                {{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}
                                            </li>

                                        </ul>
                                        <div class="card-body">


                                        </div>
                                        <div class="card-footer text-muted">
                                            {{ __('public.lastupdate') }} :
                                            {{ $post['updated_at'] }}
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                        @endforeach




                    </div>
                </div>
            </div>
        </div>



    </section>

    {{-- @foreach ($articles as $article)
{{$row->id}}

@endforeach --}}

@endsection
