@php
    use App\Models\Writer;
    $locale=$app->getLocale();

@endphp
@extends('admin.panel')
@section('pagetitle')
    {{ __('public.dashboard') }}
@endsection

@section('maincontent')
    <div class="row justify-content-between align-items-center g-5 mx-3 my-4" >
        @foreach ($posts as $post)
            @php

                $writer = Writer::find($post['writer_id']);
            @endphp
            <div class="col-lg-3 col-sm-10 col-md-6">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('/images/posts/'.$post['id'].".jpg")}}" class="card-img-top" alt="writer">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post['title_' . $locale] }}</h5>
                        <p class="card-text">@php echo mb_strimwidth($post['text_' . $locale], 0, 125, "..."); @endphp</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ __('public.created_at') }} : {{ $post['created_at'] }}</li>
                        <li class="list-group-item">{{ __('public.writer') }} :
                            {{ $writer['firstname_' . $locale] . ' ' . $writer['lastname_' . $locale] }}</li>

                    </ul>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">{{ __('public.goTo') }}</a>
                        <a href="/admin/edit/{{$post['id']}}" class="btn btn-warning">{{ __('public.edit') }}</a>
                        <a href="/admin/softDelete/{{$post['id']}}" class="btn btn-danger">{{ __('public.delete') }}</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
