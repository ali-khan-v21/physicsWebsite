@extends('layouts.master')
@section('title', __('public.home'))
@section('content')

    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-uppercase fw-semibold text-white display-1">{{ __('public.site_name') }}</h1>
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

                <div class="col-lg-4 col-sm-6 text-center">
                    <a href="#section1" class="section-link">
                        <div class="subject theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <h5 class="mt-4 mb-3">item 1</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, assumenda.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <a href="#section2" class="section-link">
                        <div class="subject theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="bi bi-book"></i>
                            </div>
                            <h5 class="mt-4 mb-3">item 2</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, assumenda.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 text-center">
                    <a href="#section3" class="section-link">
                        <div class="subject theme-shadow p-lg-5 p-4">
                            <div class="iconbox">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <h5 class="mt-4 mb-3">item 3</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, assumenda.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
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
                            <input type="text" class="form-control" name="firstName" placeholder="{{__("public.enter_firstName")}}">

                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" name="lastName" placeholder="{{__("public.enter_lastName")}}">

                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" name="email" placeholder="{{__("public.enter_email")}}">

                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" name="subject" placeholder="{{__("public.enter_subject")}}">

                        </div>
                        <div class="form-group col-lg-12">
                            <textarea rows="5" class="form-control" name="message" placeholder="{{__("public.enter_message")}}"></textarea>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button class="btn btn-primary">{{__("public.submit")}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>


    </section>

    <h1>index page</h1>
    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه
        روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود
        ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد،
        تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد
        کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان
        مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
    </p>
@endsection
