@php
    use App\Models\Category;
    $categories = Category::all();
@endphp

@extends('admin.panel')
@section('pagetitle')
    {{ __('public.new_post') }}
@endsection
@section('maincontent')
    <div class="row">

        <form action="{{ url()->current() }}" method="POST" class="row">
            {{ csrf_field() }}

            <div class="col-lg-6 col-sm-10">
                <div class="row  my-3">


                    <div class="form-group col-lg-6 col-sm-10 ">

                        <input type="text" placeholder="عنوان فارسی پست" class="form-control " name="title_fa">
                    </div>
                    <div class="form-group  col-lg-6 col-sm-10">

                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected>{{ __('public.choose_category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name_' . $app->getLocale()] }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <textarea name="text_fa" id="editor" cols="30" rows="20" class="form-control" placeholder="متن فارسی پست"></textarea>
                    <script>
                        const editor = Jodit.make('#editor');
                    </script>
                </div>
            </div>
            <div class="col-lg-6 col-sm-10">

                <div class="row my-3">

                    <div class="form-group col-lg-12 col-sm-12 text-start">

                        <input type="text" name="title_en" placeholder="english title" class="form-control ">
                    </div>

                </div>
                <div class="form-group">

                    <textarea id="editor2" cols="30" name="text_en" rows="10" class="form-control" placeholder="english post text"></textarea>
                    <script>
                        const editor2 = Jodit.make('#editor2');
                    </script>
                </div>
            </div>
            <div class="row my-3 align-items-center">
                <div class="col-9  ">

                    <label for="formFile" class="form-label">{{ __('public.choose_image') }}</label>
                    <input class="form-control" name="post_img" type="file" id="formFile">


                </div>
                <div class="col-2 text-center">


                    <button type="submit" class="btn btn-primary">{{ __('public.submit') }}</button>
                    {{-- <button type="submit" form="a-form">Submit</button> --}}
                </div>

            </div>
        </form>
    </div>

@endsection
