@php
    use App\Models\Category;
    use App\Models\Writer;
    $locale = $app->getLocale();

@endphp
@extends('admin.panel')
@section('pagetitle')
    {{ __('public.dashboard') }}
@endsection

@section('maincontent')
    <div class="row justify-content-start align-items-stretch g-5 mx-3 my-4">
        @foreach ($posts as $post)
            @php

                $writer = $post->writer;
                $category = $post->category;
            @endphp
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="@if ($post->image['image_url'] == null) {{ asset('/images/posts/default.jpg') }} @else {{ asset('/images/posts/' . $post->image['image_url']) }} @endif"
                        class="card-img-top h-auto" alt="{{ $post->image['image_url'] }}">
                    <div class="card-body">

                        @if ($post['title_' . $locale] != null)
                            <h5 class="card-title my-3"> {{ $post['title_' . $locale] }} </h5>
                        @else
                            <span class="text-danger"><sub>only persain title available for this post</sub></span>
                            <br />

                            <h5 class="card-title  my-3"> {{ $post['title_fa'] }} </h5>
                        @endif

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
                    <ul class="list-group list-group-flush py-2">
                        <li class="list-group-item">{{ __('public.category') }} :
                            <a href="/article/{{ $post->category['category_key'] }}"
                                style="text-decoration: none;">{{ $post->category['name_' . $locale] }}</a>,
                            @foreach ($post->tags as $tag)
                                <a href="/tag/{{ $tag['tag_key'] }}"
                                    style="text-decoration: none;">{{ $tag['name_' . $locale] }}</a>,
                            @endforeach
                            <br>

                        </li>
                        <li>
                            {{ __('public.writer') }} :
                            {{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}
                        </li>

                    </ul>

                    <div class="card-body">
                        <a href="/article/{{ $category['category_key'] }}/{{ $post['id'] }}"
                            class="btn btn-primary">{{ __('public.goTo') }}</a>
                        <a href="/admin/edit/{{ $post['id'] }}" class="btn btn-warning">{{ __('public.edit') }}</a>
                        <a href="/admin/softDelete/{{ $post['id'] }}"
                            class="btn btn-danger">{{ __('public.delete') }}</a>
                        <a href="/admin/pending_posts/deactivate/{{$post->id}}"
                            class="btn btn-secondary">{{ __("public.deactivate") }}</a>

                    </div>
                    <div class="card-footer text-muted">
                        {{ __('public.lastupdate') }} :
                        {{ $post['updated_at'] }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
