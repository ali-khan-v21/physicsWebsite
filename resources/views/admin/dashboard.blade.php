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

                $writer = Writer::find($post['writer_id']);
                $category = Category::find($post['category_id']);
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
                        <li class="list-group-item">{{ __('public.category') }} : {{ $category['name_' . $locale] }}</li>

                        {{ __('public.writer') }} :
                        {{ $writer['firstname_' . $locale] . ' ' . $writer['lastname_' . $locale] }}</li>

                    </ul>
                    <div class="card-footer text-muted">
                        {{ __('public.created_at') }} :
                        {{ $post['created_at'] }}
                    </div>
                    <div class="card-body">
                        <a href="/article/{{ $category['category_key'] }}/{{ $post['id'] }}"
                            class="btn btn-primary">{{ __('public.goTo') }}</a>
                        <a href="/admin/edit/{{ $post['id'] }}" class="btn btn-warning">{{ __('public.edit') }}</a>
                        <a href="/admin/softDelete/{{ $post['id'] }}"
                            class="btn btn-danger">{{ __('public.delete') }}</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
