@php

    use App\Models\Tag;
    use App\Models\Category;
    $categories = Category::all();
    $tags = Tag::all();
    $locale = app()->getLocale();
    $taged_categories = Category::where('navbar', 1)->get();
@endphp

@extends('admin.panel')
@section('pagetitle')
    {{ __('public.edit_post') }}
@endsection
@section('maincontent')
    <div class="row">

        <form action="{{ url()->current() }}" method="POST" class="row" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $post['id'] }}">
            <input type="hidden" name="image_url" value="{{ $post['image_url'] }}">

            <div class="col-lg-6 col-sm-10">
                <div class="row  my-3">


                    <div class="form-group col-lg-6 col-sm-10 ">

                        <input type="text" placeholder="عنوان فارسی پست" class="form-control " name="title_fa"
                            value="{{ $post->title_fa }}">
                        @if ($errors->has('title_fa'))
                            <span class="text-danger">{{ $errors->first('title_fa') }}</span>
                        @endif
                    </div>
                    <div class="form-group  col-lg-6 col-sm-10">

                        <select class="form-select" name="category_id" aria-label="Default select example">
                            {{-- <option selected>{{ __('public.choose_category') }}</option> --}}
                            @foreach ($categories as $category)
                                <option @if ($category['id'] == $post['category_id']) {{ 'selected' }} @endif
                                    value="{{ $category['id'] }}">{{ $category['name_' . $app->getLocale()] }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <textarea name="text_fa" id="editor" cols="30" rows="20" class="form-control" placeholder="متن فارسی پست">{{ $post['text_fa'] }}</textarea>
                    <script>
                        const editor = Jodit.make('#editor');
                    </script>
                    @if ($errors->has('text_fa'))
                        <span class="text-danger">{{ $errors->first('text_fa') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-sm-10">

                <div class="row my-3">

                    <div class="form-group col-lg-12 col-sm-12 text-start">

                        <input type="text" name="title_en" placeholder="english title" class="form-control "
                            value="{{ $post['title_en'] }}">
                        @if ($errors->has('title_en'))
                            <span class="text-danger">
                                {{ $errors->first('title_en') }}
                            </span>
                        @endif
                    </div>

                </div>
                <div class="form-group">

                    <textarea id="editor2" cols="30" name="text_en" rows="10" class="form-control"
                        placeholder="english post text">{{ $post['text_en'] }}</textarea>
                    <script>
                        const editor2 = Jodit.make('#editor2');
                    </script>
                    @if ($errors->has('text_en'))
                        <span class="text_en">{{ $errors->first('text_en') }}</span>
                    @endif
                </div>
            </div>
            <div class="row my-2">
                @foreach ($taged_categories as $category)
                    <div class="col-lg-3 col-sm-6 border border-1">
                        <b>{{ $category['name_' . $locale] }}</b>
                        @foreach ($category->tags as $tag)
                            <div class="form-check">

                                <input class="form-check-input " type="checkbox" name="tags[]" id="{{ $tag->tag_key }}"
                                    value="{{ $tag->id }}">
                                <label class="form-check-label"
                                    for="{{ $tag->tag_key }}">{{ $tag['name_' . app()->getLocale()] }}</label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="row my-3 align-items-center">
                <div class="col-9  ">

                    <label for="formFile" class="form-label">{{ __('public.choose_image') }}</label>
                    <input class="form-control" name="new_img" type="file" id="formFile">
                    @if ($errors->has('new_img'))
                        <span class="text-danger">
                            {{ $errors->first('new_img') }}
                        </span>
                    @endif


                </div>
                <div class="col-2 text-center">


                    <button type="submit" class="btn btn-primary">{{ __('public.submit') }}</button>
                    {{-- <button type="submit" form="a-form">Submit</button> --}}
                </div>

            </div>
        </form>
    </div>
@endsection
