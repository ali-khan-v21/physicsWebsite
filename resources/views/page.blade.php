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

                        @endforeach
                        <div >


                        </div>




                    </div>
                </div>
                {{$posts->onEachSide(2)->links()}}
            </div>
        </div>



    </section>

    {{-- @foreach ($articles as $article)
{{$row->id}}

@endforeach --}}

@endsection
