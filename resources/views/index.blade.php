@extends('layouts.master')
@section('title', __('public.home'))
@php
    $lacale = $app->getLocale();
@endphp
@section('content')

    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase fw-semibold text-white display-3">{{ __('public.site_name') }}</h1>
                    <h4 class="text-white mt-3">{{ __('public.hero_text') }}</h4>
                    <div class="mt-5 col-sm-12 col-lg-5 mx-auto">
                        <form class="d-flex mt-3">
                            <input class="form-control me-2" name="s" type="search"
                                placeholder="{{ __('public.search') }}" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section-padding">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.about') }}</h1>
                        <div class="line"></div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam hic voluptatum soluta
                            exercitationem aspernatur natus harum nulla dignissimos, ex quidem. Quaerat libero a
                            delectus</p>
                    </div>

                </div>
            </div>
            <div class="row jostify-content-beetween align-items-center">
                <div class="col-lg-6">
                    <img src="/images/writer.jpg" class="rounded img-thumbnail" alt="writers image">
                </div>
                <div class="col-lg-5">
                    <h1>{{ __('public.about_writer') }}</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde alias vitae corporis ipsam illo
                        eius impedit quos quasi quisquam praesentium.</p>

                    <div class="d-flex pt-3 mb-2">
                        <div class="iconbox mx-4">
                            <i class="bi bi-bookmark-star"></i>
                        </div>
                        <div>
                            <h4>item</h4>
                            <p class="mt-3 mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem,
                                vitae!</p>
                        </div>
                    </div>

                    <div class="d-flex pt-4 mb-3">
                        <div class="iconbox mx-4">
                            <i class="bi bi-bookmark-star"></i>
                        </div>
                        <div>
                            <h4>item 2</h4>
                            <p class="mt-3 mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem,
                                vitae!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="subjects" class="section-padding border-top">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.subjects') }}</h1>
                        <div class="line"></div>

                    </div>

                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-sm-6 text-center">
                    <a href="#cognitive_neuroscience" class="section-link">
                        <div class="subject theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <h5 class="mt-4 mb-3">{{ __('public.cognitive_neuroscience') }}</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, assumenda.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <a href="#neurophilosophy" class="section-link">
                        <div class="subject theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="bi bi-book"></i>
                            </div>
                            <h5 class="mt-4 mb-3">{{ __('public.neurophilosophy') }}</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, assumenda.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <a href="#beginner_tutorials" class="section-link">
                        <div class="subject theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <h5 class="mt-4 mb-3">{{ __('public.beginner_tutorials') }}</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, assumenda.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 text-center">
                    <a href="#news" class="section-link">
                        <div class="subject theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <h5 class="mt-4 mb-3">{{ __('public.news') }}</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, assumenda.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <section id="cognitive_neuroscience" class="section-padding border-top">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.cognitive_neuroscience') }}</h1>
                        <div class="line"></div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row jostify-content-between align-items-center mx-auto">
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="text-center pt-5">
                <a href="/article/cognitive_neuroscience" class="btn btn-secondary mx-auto p-2 fw-semibold ">
                    <h5 class="text-white">{{ __('public.more') }}</h5>
                </a>
            </div>


        </div>





    </section>

    <section id="neurophilosophy" class="section-padding border-top">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.neurophilosophy') }}</h1>
                        <div class="line"></div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row jostify-content-between align-items-center mx-auto">
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="text-center pt-5">
                <a href="/article/neurophilosophy" class="btn btn-secondary mx-auto p-2 fw-semibold ">
                    <h5 class="text-white">{{ __('public.more') }}</h5>
                </a>

            </div>


        </div>





    </section>
    <section id="beginner_tutorials" class="section-padding border-top">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.beginner_tutorials') }}</h1>
                        <div class="line"></div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row jostify-content-between align-items-center mx-auto">
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="text-center pt-5">
                <a href="/article/beginner_tutorials" class="btn btn-secondary mx-auto p-2 fw-semibold ">
                    <h5 class="text-white">{{ __('public.more') }}</h5>
                </a>

            </div>


        </div>





    </section>

    <section id="news" class="section-padding border-top">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.news') }}</h1>
                        <div class="line"></div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row jostify-content-between align-items-center mx-auto">
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="./images/writer.jpg" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">publish date</li>
                        <li class="list-group-item">writer</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Go to</a>

                    </div>
                </div>
            </div>
            <div class="text-center pt-5">
                <a href="/article/news" class="btn btn-secondary mx-auto p-2 fw-semibold ">
                    <h5 class="text-white">{{ __('public.more') }}</h5>
                </a>

            </div>


        </div>





    </section>

    <section id="contact" class="section-padding border-top bg-dark">
        <div class="container">

            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title text-white">
                        <h1 class="display-4 fw-semibold text-white">{{ __('public.contact') }}</h1>
                        <div class="line bg-white"></div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam hic voluptatum soluta
                            exercitationem aspernatur natus harum nulla dignissimos, ex quidem. Quaerat libero a
                            delectus</p>
                    </div>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <form action="#" method="post" class="row g-4 p-lg-5 p-4 bg-white theme-shadow">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="firstName"
                                placeholder="{{ __('public.enter_firstName') }}">

                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="lastName"
                                placeholder="{{ __('public.enter_lastName') }}">

                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" name="email"
                                placeholder="{{ __('public.enter_email') }}">

                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" name="subject"
                                placeholder="{{ __('public.enter_subject') }}">

                        </div>
                        <div class="form-group col-lg-12">
                            <textarea rows="5" class="form-control" name="message" placeholder="{{ __('public.enter_message') }}"></textarea>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button class="btn btn-primary">{{ __('public.submit') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </section>


@endsection
