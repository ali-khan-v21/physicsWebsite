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
                        <a href="/admin/replytocomment/{{ $comment->id }}"
                            class="btn btn-primary">{{ __('public.reply') }}</a>
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
    <table class="table table-responsive table-striped">
        <legend>{{ __('public.allcomments') }}</legend>
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
            @forelse ($allcomments as $comment)
                <tr>
                    <td><a
                            href="/article/{{ $comment->article->category->category_key }}/{{ $comment->article->id }}">{{ $comment->article['title_' . $locale] }}</a>
                    </td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->created_at }}</td>

                    <td>

                        <a href="/admin/deletecomment/{{ $comment->id }}"
                            class="btn btn-danger">{{ __('public.delete') }}</a>
                        {{-- <a href="/admin/replytocomment/{{ $comment->id }}"
                            class="btn btn-primary">{{ __('public.reply') }}</a> --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal">{{ __('public.reply') }}</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('public.reply') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="/admin/replytocomment/{{ $comment->id }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">

                                                <textarea name="answer" id="answer" cols="30" rows="5" placeholder="answer here"></textarea>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary">{{ __('public.submit') }}</button>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

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
@endsection
