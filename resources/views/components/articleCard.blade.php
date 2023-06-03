@php
    $lgCol=isset($lgCol)?$lgCol:3
@endphp
<div class="col-lg-{{$lgCol}} col-sm-10 col-md-6">
    <a href="/article/{{ $category['category_key'] }}/{{ $post['id'] }}@if (isset($articleTag)){{"?tagId=".$articleTag->id}}@endif"
        style="text-decoration:none;color:black;">
        <div class="card cardh" style="width: 22rem;">
            <img src="@if ($post->image['image_url'] == null) {{ asset('/images/posts/default.jpg') }} @else {{ asset('/images/posts/' . $post->image['image_url']) }} @endif"
            class="card-img-top h-auto" alt="{{$post->id}} post image">
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
                <li class="list-group-item">{{ __('public.category') }} :
                    <a href="/article/{{$post->category['category_key']}}" style="text-decoration: none;">{{$post->category['name_'.$locale]}}</a>,
                    @foreach ($post->tags as $tag)
                    <a href="/tag/{{$tag['tag_key']}}" style="text-decoration: none;">{{$tag['name_'.$locale]}}</a>,

                @endforeach
                    <br>

                <li class="list-group-item">{{ __('public.writer') }} :
                    {{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}</li>


            </ul>

            <div class="card-footer text-muted">
                {{ __('public.lastupdate') }} :
                {{ $post['updated_at'] }}
            </div>
        </div>
    </a>
</div>
