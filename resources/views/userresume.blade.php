@extends('layouts.profile')

@section('content')
    <section class="section-padding">
        <div class="row">
            <h3>{{__('public.newResume')}}</h3>
            <div class="col-sm-10 col-lg-5">
                <form action="{{ route('create-resume') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="form-group py-3">

                        <input placeholder="{{ __('public.titleFa') }}" class="form-control" type="text" name="title_fa" id="title_fa"
                            value="{{ old('title_fa') }}">
                    </div>
                    <div class="form-group py-3">

                        <input placeholder="{{ __('public.titleEn') }}" class="form-control" type="text" name="title_en" id="title_en"
                            value="{{ old('title_en') }}">
                    </div>
                    <div class="row justify-content-between">
                    <div class="form-group col-sm-10 col-lg-4 py-3">

                        <textarea placeholder="{{ __('public.descFa') }}" name="desc_fa" id="desc_fa" cols="30" rows="10">{{ old('desc_fa') }}</textarea>
                    </div>
                    <div class="form-group col-sm-10 col-lg-4 py-3">

                        <textarea placeholder="{{ __('public.descEn') }}" name="desc_en" id="desc_en" cols="30" rows="10">{{ old('desc_en') }}</textarea>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary py-3">{{ __('public.submit') }}</button>

                </form>
            </div>
        </div>
        <div class="row section-padding">
            <h4>all resumes</h4>
            <hr>

            @forelse ($resumes  as $resume)
                <div class="col-sm-10 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('edit-resume') }}" method="post">
                                @csrf
                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">

                                <label for="title_fa">{{__("public.titleFa")}}</label>

                                <div class="input-group">
                                    <input class="form-control" type="text" name="title_fa" id="title_fa"
                                        value="{{ $resume->title_fa }}">
                                        <button type="submit" class="btn btn-secondary">{{ __('public.edit') }}</button>
                                </div>
                            </form>
                            <form action="{{ route('edit-resume') }}" method="post">
                                @csrf
                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">

                                <label for="title_en">{{__("public.titleEn")}}</label>
                                <div class="input-group">

                                    <input class="form-control" type="text" name="title_en" id="title_en"
                                        value="{{ $resume->title_en }}">
                                        <button type="submit" class="btn btn-secondary">{{ __('public.edit') }}</button>
                                </div>
                            </form>
                            <form action="{{ route('edit-resume') }}" method="post">
                                @csrf
                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                <label for="desc_fa">{{__("public.descFa")}}</label>

                                <div class="form-group">
                                    <textarea class="form-control" name="desc_fa" id="desc_fa" cols="30" rows="10">{{ $resume->desc_fa }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-secondary">{{ __('public.edit') }}</button>
                            </form>
                            <form action="{{ route('edit-resume') }}" method="post">
                                @csrf
                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                <label for="desc_en">{{__("public.descEn")}}</label>

                                <div class="form-group">
                                    <textarea class="form-control" name="desc_en" id="desc_en" cols="30" rows="10">{{ $resume->desc_en }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-secondary">{{ __('public.edit') }}</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('edit-resume') }}" method="post">
                                @csrf
                                <input type="hidden" name="delete_id" value="{{ $resume->id }}">
                                <input type="hidden" name="resume_id" value="{{ $resume->id }}">
                                <button type="submit" class="btn btn-danger">{{ __('public.delete') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            @empty
                <h4 class="text-danger">no resume found</h4>
            @endforelse
        </div>
    </section>
@endsection
