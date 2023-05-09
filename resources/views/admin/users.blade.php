@extends('admin.panel')
@section('maincontent')
    <div class="row">

        @forelse ($users as $user)
            <div class="card col-sm-10 col-lg-3 p-3" style="width: 18rem;">
                <div class="card-body p-1">
                    <img src="{{ asset('images/users/default.jpg') }}" alt="user image" class="card-img-top">

                    <h4 class="card-title my-3">{{ $user->name }}</h4>
                    <h5 class="card-subtitle my-2 wrap">{{$user->email}}</h5>
                    <div class="card-text">


                        @forelse ($user->roles as $role)
                            <li>{{ $role->role_value }}</li>
                        @empty
                            no role found
                        @endforelse

                    </div>
                    <div class="container">

                        <a href="/admin/users/delete/{{$user->id}}" class="btn btn-danger">{{__('public.delete')}}</a>
                        <a href="/admin/users/deactivate/{{$user->id}}" class="btn btn-warning">{{__('public.deactivate')}}</a>
                        <a href="/admin/users/edit/{{$user->id}}" class="btn btn-secondary">{{__('public.edit')}}</a>
                    </div>

                </div>
            </div>

        @empty
            no users found
        @endforelse
    </div>

@endsection
