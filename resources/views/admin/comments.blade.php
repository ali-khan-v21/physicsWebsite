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
                    <td>
                        @php
                            // if($comment->aritcle==Null){
                            //     dd($comment->article->id);
                            // }
                        @endphp
                        <a href="/article/{{ $comment->article->category->category_key }}/{{ $comment->article->id }}">{{ $comment->article['title_'.$locale]}}</a>

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
                                                <input type="hidden" name="parent_id" value="@if(is_null($comment->parent_id)){{$comment->id}}@else {{$comment->parent_id}}@endif">
                                                <input type="hidden" name="replied_to" value="@if(is_null($comment->parent_id))@else {{$comment->id}}@endif">
                                               <input type="hidden" name="article_id" value="{{$comment->article_id}}">
                                               <input type="hidden" name="article_writer_id" value="{{$comment->article_writer_id}}">
                                                <textarea name="body" id="body" cols="30" rows="5" placeholder="{{__('public.enter_message')}}"></textarea>
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
