@php
    use App\Models\Role;
    use Carbon\Carbon;
    $locale = $app->getLocale();
@endphp
@extends('admin.panel')

@section('maincontent')
    <table class="table table-responsive table-striped">
        <legend>{{ __('public.newcomment') }}</legend>
        <thead>
            <tr>
                <th>{{ __('public.article_title') }}</th>
                <th>{{ __('public.name') }}</th>
                <th>{{ __('public.email') }}</th>
                <th>{{ __('public.text') }}</th>
                <th>{{ __('public.time') }}</th>
                <th>{{ __('public.action') }}</th>
            </tr>


        </thead>
        <tbody>
            @forelse ($newcomments as $comment)
                <tr>


                    <td><a
                            href="/article/{{ $comment->article->category->category_key }}/{{ $comment->article->id }}">{{ $comment->article['title_' . $locale] }}</a>
                    </td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->created_at }}</td>

                    <td><a href="/admin/deletecomment/{{ $comment->id }}"
                            class="btn btn-danger">{{ __('public.delete') }}</a>

                        <a href="/admin/acceptcomment/{{ $comment->id }}"
                            class="btn btn-success">{{ __('public.accept') }}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endforelse


        </tbody>

    </table>
    {{$newcomments->onEachSide(2)->links()}}
    
@endsection
