@extends('layouts.master')
@section('title', __('public.home'))

@section('content')
<ul>
    @php
        $lacale=$app->getLocale();
    @endphp

    @foreach ($categories as $category)
    <li>{{$category['id']}}-{{$category['name_'.$lacale]}}</li>
    @endforeach
    {{$lacale}}
</ul>
@endsection
