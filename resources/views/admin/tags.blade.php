@php
    use App\Models\Role;
    use Carbon\Carbon;
    $locale = $app->getLocale();
@endphp
@extends('admin.panel')
@section('maincontent')
    <div class="container">
        <div class="row">
            <h3 class="text-danger">{{__('public.newTag')}}</h3>
            <div class="card col-sm-10 col-lg-6">
                <div class="card-body">
                    <form action="{{ route('tag-new') }}" method="post">
                        @csrf



                        <div class="input-group mb-3">
                            <input type="text" id="tag_title" class="form-control"
                                placeholder="نام فارسی" name="tag_title_fa"
                                value="{{ old('tag_title_fa') }}" required>
                                <input type="text" id="tag_title" class="form-control"
                                placeholder="english name" name="tag_title_en"
                                value="{{ old('name_en') }}" required>
                        </div>

                        <div class="input-group mb-3">
                            <label for="category" class="form-label">{{__('public.category')}}</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach ($categories as $category)

                                <option value="{{$category->id}}">{{$category['name_'.$locale]}}</option>
                                @endforeach

                            </select>



                        </div>


                        <div class="form-group mb-3">


                            <textarea name="tag_desc_fa" id="tag_desc_fa" cols="30" rows="10" required placeholder="توضیحات فارسی">{{ old('desc_fa') }}</textarea>
                        </div>


                        <div class="form-group mb-3">


                            <textarea name="tag_desc_en" id="tag_desc_en" cols="30" rows="10" required placeholder="english description">{{ old('desc_en') }}</textarea>
                        </div>
                        <button class="btn btn-secondary" type="submit" id="button">{{ __('public.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>



        @forelse ($categories as $category)
            <div class="row my-4">
                <div class="col-12 t">
                    <div class="section-title">
                        <h4 class="fw-semibold">{{ $category['name_' . $locale] }}</h4>
                        <div class="line mx-0"></div>

                    </div>

                </div>
            </div>

            <div class="row">
                @forelse ($category->tags as $tag)
                    <div class="card col-sm-10 col-lg-5">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-10 col-lg-10">
                                    <form action="{{ route('tag-edit') }}" method="post">
                                        @csrf


                                        <div class="input-group mb-3">
                                            <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                                            <input type="text" id="tag_title" class="form-control"
                                                placeholder="{{ __('public.categoryFaName') }}" name="tag_title_fa"
                                                value="{{ $tag->name_fa }}" required>
                                            <button class="btn btn-secondary" type="submit"
                                                id="button">{{ __('public.edit') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-10 col-lg-10">

                                    <form action="{{ route('tag-edit') }}" method="post">
                                        @csrf

                                        <div class="input-group mb-3">
                                            <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                                            <input type="text" id="tag_title" class="form-control"
                                                placeholder="{{ __('public.categoryFaName') }}" name="tag_title_en"
                                                value="{{ $tag->name_en }}" required>
                                            <button class="btn btn-secondary" type="submit"
                                                id="button">{{ __('public.edit') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-10 col-lg-10">
                                    <form action="{{route('tag-edit')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="tag_id" value="{{ $tag->id }}">

                                        <label for="category">{{__("public.category")}}</label>
                                        <select name="category_id" id="category">

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($tag->category_id == $category->id) {{ 'selected' }} @endif>
                                                    {{ $category['name_' . $locale] }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-secondary">{{__('public.edit')}}</button>
                                    </form>
                                </div>
                                <div class="col-sm-10 col-lg-10">

                                    <form action="{{ route('tag-edit') }}" method="post">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <input type="hidden" name="tag_id" value="{{ $tag->id }}">

                                            <textarea name="tag_desc_fa" id="tag_desc_fa" cols="30" rows="10" required>{{ $tag->desc_fa }}</textarea>
                                        </div>
                                        <button class="btn btn-secondary" type="submit"
                                            id="button">{{ __('public.edit') }}</button>
                                    </form>
                                </div>
                                <div class="col-sm-10 col-lg-10">

                                    <form action="{{ route('tag-edit') }}" method="post">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <input type="hidden" name="tag_id" value="{{ $tag->id }}">

                                            <textarea name="tag_desc_en" id="tag_desc_en" cols="30" rows="10" required>{{ $tag->desc_en }}</textarea>
                                        </div>
                                        <button class="btn btn-secondary" type="submit"
                                            id="button">{{ __('public.edit') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/admin/tag/delete/{{ $tag->id }}"
                                class="btn btn-danger">{{ __('public.delete') }}</a>
                        </div>
                    </div>

                @empty
                    <h3>no tags found</h3>
                @endforelse
            </div>


        @empty
            <h4>no categories found</h4>
        @endforelse
    </div>
@endsection
