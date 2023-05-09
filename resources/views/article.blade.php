@php
    use App\Models\Writer;

    $locale = $app->getLocale();
    if ($post['title_' . $locale] != null) {
        $title = $post['title_' . $locale];
    } else {
        $title = $post['title_fa'];
    }
@endphp

@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section id="{{ $category['category_key'] }}" class="section-padding border-top px-4">

        <div class="container-fluid">

            <div class="row">
                <div class="col-10 ">
                    <div class="section-title row">
                        <h2 class="display-5 fw-semibold">{{ $category['name_' . $locale] }} - {{ $title }}
                        </h2>

                        <div class="border border-3 border-primary w-25 my-4"></div>
                        {{-- <div class="line"></div> --}}

                    </div>

                </div>
                <div class="col-2">
                    <a href="{{ url()->previous() }}">{{__('public.return')}}</a>

                </div>
            </div>
        </div>


        @php

            $writer = $post->writer;
        @endphp

        <div class="card col-lg-8 col-sm-12 col-md-10">
            <img src="@if ($post['image_url'] == null) {{ asset('/images/posts/default.jpg') }} @else {{ asset('/images/posts/' . $post['image_url']) }} @endif"
                        class="card-img-top h-auto" alt="post">
            <div class="card-body">
                <h5 class="card-title my-5">
                    @if ($post['title_' . $locale] != null)
                        {!! $post['title_' . $locale] !!}
                    @else
                        <span class="text-danger"><sub>only persain title available for this post</sub></span>
                        <br />

                        {!! $post['title_fa'] !!}
                    @endif
                </h5>
                <p class="card-text">
                    @if ($post['text_' . $locale] != null)
                        {!! $post['text_' . $locale] !!}
                    @else
                        <span class="text-danger"><sub>only persain text available for this post</sub></span>
                        <br />

                        {!! $post['text_fa'] !!}
                    @endif
                </p>

                <footer class="blockquote-footer">
                    {{ $writer['firstname_' . $locale] . ' ' . $writer['lastname_' . $locale] }}
                </footer>
            </div>
            <div class="card-footer text-muted">
                {{ __('public.lastupdate') }} :
                {{ $post['updated_at'] }}
            </div>
        </div>









    </section>
    <section id="comment-form" class="section-padding border-top px-4">

        <div class="container-fluid">

            <div class="row">
                <div class="col-3 ">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{__('public.sendcomment')}}</h1>
                        <div class="border border-3 border-primary w-25 my-4"></div>
                        {{-- <div class="line"></div> --}}

                    </div>

                </div>
                <div class="col-9">
                    <form action="" method="post" class="row">
                        <div class="form-group col-sm-10 col-lg-4">
                            <label for="name">{{__('public.enter_name')}}</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group col-sm-10 col-lg-4">
                            <label for="email" class="form-label">{{__('public.enter_email')}}</label>

                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group col-sm-10 col-lg-8">
                            <textarea class="form-control" name="message" id="message" cols="10" rows="5" placeholder="{{__('public.enter_message')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('public.submit')</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
