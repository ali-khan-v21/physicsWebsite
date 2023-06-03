@php

    use App\Models\Comment;
    use Illuminate\Support\Facades\Auth;

    // dd($post->comments);
    $locale = $app->getLocale();

    if ($post['title_' . $locale] != null) {
        $title = $post['title_' . $locale];
    } else {
        $title = $post['title_fa'];
    }
@endphp

@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <section id="{{ $category['category_key'] }}" class="section-padding border-top px-4">


        <div class="container-fluid">

            <div class="row">
                <div class="col-10 ">
                    <div class="section-title row">
                        @unless (isset($tag))

                        <h3 class=" fw-semibold pt-3"><a href="/article/{{ $category->category_key }}"
                                style="text-decoration: none">{{ $category['name_' . $locale] }}</a>  <h3 class="pt-2">{{ $title }}</h3>
                        </h3>
                        @else

                        <h3 class=" fw-semibold"><a href="/article/{{$tag->category->category_key}}" style="text-decoration: none">{{ $tag->category['name_' . $locale] }}</a> > <a href="/tag/{{$tag->tag_key}}" style="text-decoration: none">{{ $tag['name_' . $locale] }}</a> <br><h3 class="pt-2"> {{ $title }}</h3>
                        </h3>
                        @endunless

                        <div class="border border-3 border-primary w-25 my-4"></div>
                        {{-- <div class="line"></div> --}}

                    </div>

                </div>
                <div class="col-2">
                    <a href="{{ url()->previous() }}">{{ __('public.return') }}</a>

                </div>
            </div>
        </div>


        @php

            $writer = $post->writer;
        @endphp

        <div class="card col-lg-8 col-sm-12 col-md-10">
            <img src="@if ($post->image['image_url'] == null) {{ asset('/images/posts/default.jpg') }} @else {{ asset('/images/posts/' . $post->image['image_url']) }} @endif"
                class="card-img-top h-auto" alt="{{ $post->id }} image">
            <div class="card-body">
                <h5 class="card-title my-5">
                    @if ($post['title_' . $locale] != null)
                        {!! $post['title_' . $locale] !!}
                    @else
                        <span class="text-danger"><sub>only persain title available for this post</sub></span>
                        <br />

                        {!! $post['title_fa'] !!}
                    @endif
                </h5>
                <p class="card-text">
                    @if ($post['text_' . $locale] != null)
                        {!! $post['text_' . $locale] !!}
                    @else
                        <span class="text-danger"><sub>only persain text available for this post</sub></span>
                        <br />

                        {!! $post['text_fa'] !!}
                    @endif
                </p>

                <footer class="blockquote-footer">
                    {{ $writer->profile['firstname_' . $locale] . ' ' . $writer->profile['lastname_' . $locale] }}
                </footer>
            </div>
            <div class="card-footer text-muted">
                {{ __('public.lastupdate') }} :
                {{ $post['updated_at'] }}
            </div>
        </div>









    </section>
    <section id="comment-form" class="section-padding border-top px-4">

        <div class="container-fluid">

            <div class="row">
                <div class="col-3 ">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.sendcomment') }}</h1>
                        <div class="border border-3 border-primary w-25 my-4"></div>
                        {{-- <div class="line"></div> --}}

                    </div>

                </div>

            </div>
            @guest
                <div class="col-9">
                    <form action="/postcomment" method="post" class="row">
                        @if ($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <input type="hidden" name="article_id" value="{{ $post->id }}">
                        <div class="form-group col-sm-10 col-lg-4 my-3">

                            <input type="text" name="name" value="{{ old('name') }}" id="name"
                                placeholder='{{ __('public.enter_name') }}' class="form-control">
                        </div>
                        <div class="form-group col-sm-10 col-lg-4  my-3">

                            <input value="{{ old('email') }}" type="email" name="email" id="email"
                                placeholder='{{ __('public.enter_email') }}' class="form-control">
                        </div>
                        <div class="form-group col-sm-10 col-lg-8  my-3">
                            <textarea class="form-control" name="body" id="body" cols="10" rows="5"
                                placeholder="{{ __('public.enter_message') }}">{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary mx-3">@lang('public.submit')</button>
                        </div>


                    </form>
                </div>
            @else
                <div class="col-9">
                    <form action="/postcomment" method="post" class="row">
                        @if ($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <input type="hidden" name="article_id" value="{{ $post->id }}">
                        <div class="form-group col-sm-10 col-lg-4 my-3">
                            @php

                                $fullname = Auth::user()->profile['firstname_' . app()->getLocale()] . ' ' . Auth::user()->profile['lastname_' . app()->getLocale()];
                                if ($fullname != '') {
                                    $val = $fullname;
                                } else {
                                    $val = Auth::user()->email;
                                }
                            @endphp

                            <input type="text" name="name" id="name" placeholder='{{ __('public.enter_name') }}'
                                class="form-control" value="{{ $val }}">
                        </div>
                        <div class="form-group col-sm-10 col-lg-4  my-3">


                            <input value="{{ Auth::user()->email }}" type="email" name="email" id="email"
                                placeholder='{{ __('public.enter_email') }}' class="form-control">
                        </div>
                        <div class="form-group col-sm-10 col-lg-8  my-3">
                            <textarea class="form-control" name="body" id="body" cols="10" rows="5"
                                placeholder="{{ __('public.enter_message') }}">{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary mx-3">@lang('public.submit')</button>
                        </div>


                    </form>
                </div>

            @endguest

            <div class="row mt-4">
                <div class="col-3 ">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">{{ __('public.comments') }}</h1>
                        <div class="border border-3 border-primary w-25 my-4"></div>
                        {{-- <div class="line"></div> --}}

                    </div>

                </div>
            </div>
            <div class="row">
                @forelse ($post->comments as $comment)
                    <div class="container col-12 my-3" style="">

                        <div class="card " style="max-width: 45rem;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi bi-person-circle"></i>
                                    {{ $comment->name }}
                                </h5>
                                <small
                                    class="card-subtitle mb-2 text-muted">{{ $comment->role['name_' . $locale] }}</small>
                                <p class="card-text mt-3">{{ $comment->body }}</p>



                            </div>
                            @if (count($comment->replies) > 0)
                                @foreach ($comment->replies as $reply)
                                    <div class="container col-12 my-3" id="reply-container-{{ $reply->id }}"
                                        style="">

                                        <div class="card" style="max-width: 35rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <i class="bi bi-person-circle"></i>
                                                    {{ $reply->name }}
                                                </h5>
                                                <small
                                                    class="card-subtitle mb-2 text-muted">{{ $reply->role['name_' . $locale] }}</small>
                                                @unless (is_null($reply->replied_to))
                                                    <p class="my-1"><a href="#reply-container-{{ $reply->replied_to }}"
                                                            style="text-decoration:none;">@lang('public.repliedto')
                                                            @php

                                                                $mother_comment = Comment::where('id', $reply->replied_to)->get()[0];
                                                                // $mother_body=$mother_comment["body"];
                                                                // dd($mother_comment->body);
                                                                // dd($reply->replied_to,$mother_comment);
                                                            @endphp
                                                            {{ mb_strimwidth($mother_comment->body, 0, 30, ' ...') }}
                                                        </a></p>
                                                @endunless
                                                <p class="card-text mt-3">{{ $reply->body }}</p>



                                            </div>
                                            <div class="card-footer text-muted d-flex justify-content-between">
                                                {{ $reply->created_at }}
                                                <button class="card-link reply-btn"
                                                    id="reply-{{ $reply->id }}">{{ __('public.reply') }}<i
                                                        class="bi bi-reply"></i></button>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container hidden-form" style="display: none;"
                                        id="form-{{ $reply->id }}">
                                        @guest
                                            <div>
                                                <form action="/postcomment" method="post" class="row">
                                                    @if ($errors->all())
                                                        <div class="alert alert-danger">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="article_id" value="{{ $post->id }}">
                                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                    <input type="hidden" name="replied_to" value="{{ $reply->id }}">
                                                    <div class="form-group col-sm-10 col-lg-4 my-3">

                                                        <input type="text" name="name" value="{{ old('name') }}"
                                                            id="name" placeholder='{{ __('public.enter_name') }}'
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-sm-10 col-lg-4  my-3">

                                                        <input value="{{ old('email') }}" type="email" name="email"
                                                            id="email" placeholder='{{ __('public.enter_email') }}'
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-sm-10 col-lg-8  my-3">
                                                        <textarea class="form-control" name="body" id="body" cols="10" rows="5"
                                                            placeholder="{{ __('public.enter_message') }}">{{ old('body') }}</textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <button type="submit"
                                                            class="btn btn-primary mx-3">@lang('public.submit')</button>
                                                    </div>


                                                </form>
                                            </div>
                                        @else
                                            <div>
                                                <form action="/postcomment" method="post" class="row">
                                                    @if ($errors->all())
                                                        <div class="alert alert-danger">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="article_id" value="{{ $post->id }}">
                                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                    <input type="hidden" name="replied_to" value="{{ $reply->id }}">

                                                    <div class="form-group col-sm-10 col-lg-4 my-3">
                                                        @php

                                                            $fullname = Auth::user()->profile['firstname_' . app()->getLocale()] . ' ' . Auth::user()->profile['lastname_' . app()->getLocale()];
                                                            if ($fullname != '') {
                                                                $val = $fullname;
                                                            } else {
                                                                $val = Auth::user()->email;
                                                            }
                                                        @endphp

                                                        <input type="text" name="name" id="name"
                                                            placeholder='{{ __('public.enter_name') }}' class="form-control"
                                                            value="{{ $val }}">
                                                    </div>
                                                    <div class="form-group col-sm-10 col-lg-4  my-3">


                                                        <input value="{{ Auth::user()->email }}" type="email"
                                                            name="email" id="email"
                                                            placeholder='{{ __('public.enter_email') }}'
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-sm-10 col-lg-8  my-3">
                                                        <textarea class="form-control" name="body" id="body" cols="10" rows="5"
                                                            placeholder="{{ __('public.enter_message') }}">{{ old('body') }}</textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <button type="submit"
                                                            class="btn btn-primary mx-3">@lang('public.submit')</button>
                                                    </div>


                                                </form>
                                            </div>

                                        @endguest
                                    </div>
                                @endforeach
                            @endif
                            <div class="card-footer text-muted d-flex justify-content-between">
                                {{ $comment->created_at }}
                                <button class="card-link reply-btn"
                                    id="reply-{{ $comment->id }}">{{ __('public.reply') }}<i
                                        class="bi bi-reply"></i></button>
                            </div>

                        </div>

                    </div>
                    {{-- primary comments hidden reply form is here --}}
                    <div class="container hidden-form" style="display: none;" id="form-{{ $comment->id }}">
                        @guest
                            <div class="col-9">
                                <form action="/postcomment" method="post" class="row">
                                    @if ($errors->all())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </div>
                                    @endif
                                    {{ csrf_field() }}
                                    <input type="hidden" name="article_id" value="{{ $post->id }}">
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <div class="form-group col-sm-10 col-lg-4 my-3">

                                        <input type="text" name="name" value="{{ old('name') }}" id="name"
                                            placeholder='{{ __('public.enter_name') }}' class="form-control">
                                    </div>
                                    <div class="form-group col-sm-10 col-lg-4  my-3">

                                        <input value="{{ old('email') }}" type="email" name="email" id="email"
                                            placeholder='{{ __('public.enter_email') }}' class="form-control">
                                    </div>
                                    <div class="form-group col-sm-10 col-lg-8  my-3">
                                        <textarea class="form-control" name="body" id="body" cols="10" rows="5"
                                            placeholder="{{ __('public.enter_message') }}">{{ old('body') }}</textarea>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary mx-3">@lang('public.submit')</button>
                                    </div>


                                </form>
                            </div>
                        @else
                            <div class="col-9">
                                <form action="/postcomment" method="post" class="row">
                                    @if ($errors->all())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </div>
                                    @endif
                                    {{ csrf_field() }}
                                    <input type="hidden" name="article_id" value="{{ $post->id }}">
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                                    <div class="form-group col-sm-10 col-lg-4 my-3">
                                        @php

                                            $fullname = Auth::user()->profile['firstname_' . app()->getLocale()] . ' ' . Auth::user()->profile['lastname_' . app()->getLocale()];
                                            if ($fullname != '') {
                                                $val = $fullname;
                                            } else {
                                                $val = Auth::user()->email;
                                            }
                                        @endphp

                                        <input type="text" name="name" id="name"
                                            placeholder='{{ __('public.enter_name') }}' class="form-control"
                                            value="{{ $val }}">
                                    </div>
                                    <div class="form-group col-sm-10 col-lg-4  my-3">


                                        <input value="{{ Auth::user()->email }}" type="email" name="email"
                                            id="email" placeholder='{{ __('public.enter_email') }}'
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-sm-10 col-lg-8  my-3">
                                        <textarea class="form-control" name="body" id="body" cols="10" rows="5"
                                            placeholder="{{ __('public.enter_message') }}">{{ old('body') }}</textarea>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary mx-3">@lang('public.submit')</button>
                                    </div>


                                </form>
                            </div>

                        @endguest
                    </div>
                    {{-- </div>
                            <div class="container test2" style="display: none" id="form-{{ $comment->id }}">

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="name">name</label>
                                        <input type="text" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">email</label>
                                        <input type="text" name="email" id="email">
                                    </div>
                                </form>
                            </div> --}}

                @empty

                    no comments found!
                @endforelse

            </div>
        </div>


    </section>
    <script>
        const allReplyButtons = document.querySelectorAll(".reply-btn")

        allReplyButtons.forEach(element => {

            const myId = element.id
            const myArray = myId.split("-");
            const newId = `form-${myArray[1]}`;
            element.addEventListener("click", function(element) {

                document.querySelectorAll(".not-hidden").forEach(form => {
                    form.style.display = 'none';
                    form.classList.remove('not-hidden');
                })
                document.getElementById(newId).style.display = 'block'; //
                document.getElementById(newId).classList.add("not-hidden"); //




            })
        });
    </script>
@endsection
