@extends('layouts.profile')

@section('content')
    <section class="section-padding">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="card text-start" style="width: 22rem;height:auto;">
                        <img class="card-img-top" src="{{ asset('images') . '/' . $profile->image->image_url }}"
                            alt="user-image">
                        <div class="card-body">
                            <div class="card-title text-danger">
                                {{$profile->user->role['name_'.app()->getLocale()]}}
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <form action="{{ route('edit-profile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="profile-id" value="{{$profile->id}}">
                                        <div class="row g-3 align-items-start">
                                            <div class="col-auto">
                                                <label for="name"
                                                    class="col-form-label">{{ __('public.profile-image') }}</label>
                                            </div>
                                            <div class="col-auto">
                                                <input class="form-control" type="file" id="formFile"
                                                    name="profile_image">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit"
                                                    class="btn btn-primary mb-3">{{ __('public.edit') }}</button>
                                            </div>
                                        </div>
                                    </form>

                                </li>

                            </ul>


                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        <form action="{{ route('edit-profile') }}" method="POST" class="col-sm-12 col-lg-6 ">
                            @csrf
                            <input type="hidden" name="profile-id" value="{{ $profile->id }}">

                            <div class="input-group mb-3">
                                <label for="username">{{ __('public.username') }}</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="{{ __('public.username') }}" value="{{ $profile->user->username }}" required>
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="{{ route('edit-profile') }}" method="POST" class="col-sm-12 col-lg-6 ">
                            @csrf
                            <input type="hidden" name="profile-id" value="{{ $profile->id }}">

                            <div class="input-group mb-3">
                                <label for="useremail">{{ __('public.email') }}</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="useremail" id="useremail" class="form-control"
                                    placeholder="{{ __('public.email') }}" value="{{ $profile->user->email }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="{{ route('edit-profile') }}" method="POST" class="col-sm-12 col-lg-6 ">
                            @csrf
                            <input type="hidden" name="profile-id" value="{{ $profile->id }}">

                            <div class="input-group mb-3">
                                <label for="firstname_fa">{{ __('public.firstname_fa') }}</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="firstname_fa" id='firstname_fa' class="form-control"
                                    placeholder="{{ __('public.firstname_fa') }}" value="{{ $profile->firstname_fa }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="{{ route('edit-profile') }}" method="POST" class="col-sm-12 col-lg-6 ">
                            @csrf
                            <input type="hidden" name="profile-id" value="{{ $profile->id }}">
                            <div class="input-group mb-3">
                                <label for="firstname_en">{{ __('public.firstname_en') }}</label>
                            </div>

                            <div class="input-group mb-3 ">
                                <input type="text" name="firstname_en" id="firstname_en" class="form-control"
                                    placeholder="{{ __('public.firstname_en') }}" value="{{ $profile->firstname_en }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="{{ route('edit-profile') }}" method="POST" class="col-sm-12 col-lg-6 ">
                            @csrf
                            <input type="hidden" name="profile-id" value="{{ $profile->id }}">
                            <div class="input-group mb-3">
                                <label for="lastname_fa">{{ __('public.lastname_fa') }}</label>
                            </div>

                            <div class="input-group mb-3 ">
                                <input type="text" name="lastname_fa" id="lastname_fa" class="form-control"
                                    placeholder="{{ __('public.lastname_fa') }}" value="{{ $profile->lastname_fa }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="{{ route('edit-profile') }}" method="POST" class="col-sm-12 col-lg-6 ">
                            @csrf
                            <input type="hidden" name="profile-id" value="{{ $profile->id }}">

                            <div class="input-group mb-3">
                                <label for="lastname_en">{{ __('public.lastname_en') }}</label>
                            </div>

                            <div class="input-group mb-3 ">



                                <input type="text" name="lastname_en" id="lastname_en" class="form-control"
                                    placeholder="{{ __('public.lasename_en') }}" value="{{ $profile->lastname_en }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>

                            </div>
                        </form>

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
