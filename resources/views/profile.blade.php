@extends('layouts.profile')

@section('content')
    <section class="section-padding">

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4">
                    <div class="card text-start" style="width: 22rem;height:auto;">
                        <img class="card-img-top" src="{{ asset('images') . '/' . $user->profile->image->image_url }}"
                            alt="user-image">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row g-3 align-items-start">
                                        <div class="col-auto">
                                            <label for="name"
                                                class="col-form-label">{{ __('public.profile-image') }}</label>
                                        </div>
                                        <div class="col-auto">
                                            <input class="form-control" type="file" id="formFile" name="profile_image">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit"
                                                class="btn btn-primary mb-3">{{ __('public.edit') }}</button>
                                        </div>
                                    </div>

                                </li>

                            </ul>


                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        <form action="" class="col-sm-12 col-lg-6 ">
                            <div class="input-group mb-3">
                                <input type="text" name="username" class="form-control"
                                    placeholder="{{ __('public.username') }}" value="{{ $user->username }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="" class="col-sm-12 col-lg-6 ">
                            <div class="input-group mb-3">
                                <input type="text" name="useremail" class="form-control"
                                    placeholder="{{ __('public.email') }}" value="{{ $user->email }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="" class="col-sm-12 col-lg-6 ">
                            <div class="input-group mb-3">
                                <input type="text" name="useremail" class="form-control"
                                    placeholder="{{ __('public.firstname_fa') }}"
                                    value="{{ $user->profile->firstname_fa }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="" class="col-sm-12 col-lg-6 ">
                            <div class="input-group mb-3 ">
                                <input type="text" name="useremail" class="form-control"
                                    placeholder="{{ __('public.firstname_en') }}"
                                    value="{{ $user->profile->firstname_en }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="" class="col-sm-12 col-lg-6 ">
                            <div class="input-group mb-3 ">
                                <input type="text" name="useremail" class="form-control"
                                    placeholder="{{ __('public.lastname_fa') }}"
                                    value="{{ $user->profile->lastname_fa }}">
                                <button class="btn btn-secondary" type="submit"
                                    id="button">{{ __('public.edit') }}</button>
                            </div>
                        </form>
                        <form action="" class="col-sm-12 col-lg-6 ">
                            <div class="input-group mb-3 ">
                                <input type="text" name="useremail" class="form-control"
                                    placeholder="{{ __('public.lasename_en') }}"
                                    value="{{ $user->profile->lastname_en }}">
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
