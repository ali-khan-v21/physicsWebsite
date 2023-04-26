@php
    use App\Models\Writer;

    $locale = $app->getLocale();

@endphp

@extends('admin.panel')
@section('pagetitle')
{{__('public.trashbin')}}
@endsection


@section('maincontent')


    <section id="" class="section-padding  px-4">


        <div class="row justify-content-start align-items-start gy-5 mx-auto">
            @foreach ($posts as $post)
                @php

                    $writer = Writer::find($post['writer_id']);
                @endphp
                <div class="col-lg-3 col-sm-10 col-md-6">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('images/posts/'.$post['image_url'])}}" class="card-img-top" alt="writer">
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($post['title_' . $locale] != null)
                                    {{ $post['title_' . $locale] }}
                                @else
                                    <span class="text-danger"><sub>only persain title available for this post</sub></span>
                                    <br />

                                    {{ $post['title_fa'] }}
                                @endif
                            </h5>
                            <p class="card-text">
                                @if ($post['text_' . $locale] != null)
                                    @php echo mb_strimwidth($post['text_' . $locale], 0, 125, "..."); @endphp
                                @else
                                    <span class="text-danger"><sub>only persain text available for this post</sub></span>
                                    <br />

                                    @php echo mb_strimwidth($post['text_fa'], 0, 125, "..."); @endphp
                                @endif
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-bottom-0">{{ __('public.created_at') }} : {{ $post['created_at'] }}
                                <br>
                                {{ __('public.writer') }}
                                :{{ $writer['firstname_' . $locale] . ' ' . $writer['lastname_' . $locale] }}
                            </li>


                        </ul>
                        <div class="card-body">
                            <a href="/admin/forceDelete/{{$post['id']}}" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                                {{ __('public.forceDelete') }}
                            </a>
                            <a href="/admin/restore/{{$post['id']}}" class="btn btn-warning">
                                <i class="bi bi-recycle"></i>
                                {{ __('public.restore') }}
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach




        </div>


    </section>
    {{-- @foreach ($articles as $article)
{{$row->id}}

@endforeach --}}

@endsection
