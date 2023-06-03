@php
    use App\Models\Role;
    use Carbon\Carbon;
    $locale = $app->getLocale();
@endphp
@extends('admin.panel')
@section('maincontent')
    <div class="row">

        @forelse ($posts as $post)
            <div class="col-lg-4 col-sm-10 col-md-6">
                <a href="/article/{{ $post->category['category_key'] }}/{{ $post['id'] }}@if (isset($articleTag)) {{ '?tagId=' . $articleTag->id }} @endif"
                    style="text-decoration:none;color:black;">
                    <div class="card" style="width: 22rem;">
                        <img src="@if ($post->image['image_url'] == null) {{ asset('/images/posts/default.jpg') }} @else {{ asset('/images/posts/' . $post->image['image_url']) }} @endif"
                            class="card-img-top h-auto" alt="{{ $post->id }} post image">
                        <div class="card-body">

                            @if ($post['title_' . $locale] != null)
                                <h5 class="card-title  my-3"> {{ $post['title_' . $locale] }}</h5>
                            @else
                                <span class="text-danger"><sub>only persain title available for this
                                        post</sub></span>
                                <br />

                                <h5 class="card-title my-3"> {{ $post['title_fa'] }}</h5>
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
                        <ul class="list-group list-group-flush p-2">
                            <li class="list-group-item">{{ __('public.tags') }} :
                                <a href="/article/{{ $post->category['category_key'] }}"
                                    style="text-decoration: none;">{{ $post->category['name_' . $locale] }}</a>,
                                @foreach ($post->tags as $tag)
                                    <a href="/tag/{{ $tag['tag_key'] }}"
                                        style="text-decoration: none;">{{ $tag['name_' . $locale] }}</a>,
                                @endforeach
                                <br>

                            <li class="list-group-item">{{ __('public.writer') }} :
                                {{ $post->writer->profile['firstname_' . $locale] . ' ' . $post->writer->profile['lastname_' . $locale] }}</li>
                            <br>
                            {{ __('public.lastupdate') }} :
                            {{ $post['updated_at'] }}


                        </ul>

                        <div class="card-footer text-muted">
                            <a href="/admin/pending_posts/accept/{{$post->id}}" class="btn btn-success">{{__("public.accept")}}</a>
                            <a href="/admin/pending_posts/delete/{{$post->id}}" class="btn btn-danger">{{__("public.delete")}}</a>
                        </div>
                    </div>
                </a>
            </div>
        @empty
        no posts found
        @endforelse

    </div>
@endsection
