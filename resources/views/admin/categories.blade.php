@php
    use App\Models\Role;
    use Carbon\Carbon;
    $locale = $app->getLocale();
@endphp
@extends('admin.panel')
@section('maincontent')
    <div class="row">
        <div class="card col-sm-10 col-lg-5">

            <div class="card-body">
                <div class="container">

                    <h3 class="text-danger">{{__('public.newCat')}}</h3>


                <form action="{{ route('category-new') }}" method="post">
                    @csrf


                    <div class="input-group mb-3">
                        <input type="text" id="category_title" class="form-control"
                            placeholder="نام فارسی" name="category_title_fa"
                            required>

                    </div>



                    <div class="input-group mb-3">
                        <input type="text" id="category_title" class="form-control"
                            placeholder="english name" name="category_title_en"
                             required>

                    </div>
                    <div class="form-group mb-3">
                        <textarea name="category_desc_fa" id="category_desc_fa" cols="30" rows="10" placeholder="توضیحات فارسی" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="category_desc_en" id="category_desc_en" cols="30" rows="10" placeholder="english description" required></textarea>
                    </div>

                    <button class="btn btn-secondary" type="submit" id="button">{{ __('public.submit') }}</button>
                </form>
            </div>
            </div>
        </div>

        @forelse ($categories as $category)
            <div class="card col-sm-10 col-lg-5">

                <div class="card-body">
                    <form action="{{ route('category-edit') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="text" id="category_title" class="form-control"
                                placeholder="{{ __('public.categoryFaName') }}" name="category_title_fa"
                                value="{{ $category->name_fa }}" required>
                            <button class="btn btn-secondary" type="submit"
                                id="button">{{ __('public.edit') }}</button>
                        </div>
                    </form>
                    <form action="{{ route('category-edit') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="text" id="category_title" class="form-control"
                                placeholder="{{ __('public.categoryFaName') }}" name="category_title_en"
                                value="{{ $category->name_en }}" required>
                            <button class="btn btn-secondary" type="submit"
                                id="button">{{ __('public.edit') }}</button>
                        </div>
                    </form>
                    <form action="{{ route('category-edit') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">

                            <textarea name="category_desc_fa" id="category_desc_fa" cols="30" rows="10" required>{{ $category->desc_fa }}</textarea>
                        </div>
                        <button class="btn btn-secondary" type="submit" id="button">{{ __('public.edit') }}</button>
                    </form>
                    <form action="{{ route('category-edit') }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <input type="hidden" name="category_id" value="{{ $category->id }}">

                            <textarea name="category_desc_en" id="category_desc_en" cols="30" rows="10" required>{{ $category->desc_en }}</textarea>
                        </div>
                        <button class="btn btn-secondary" type="submit" id="button">{{ __('public.edit') }}</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="/admin/category/delete/{{ $category->id }}"
                        class="btn btn-danger">{{ __('public.delete') }}</a>
                </div>
            </div>
        @empty
            <h4>no category available</h4>
        @endforelse

    </div>
@endsection
