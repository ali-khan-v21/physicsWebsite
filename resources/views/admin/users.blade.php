@php
    use App\Models\Role;
    use Carbon\Carbon;
    $locale = $app->getLocale();
@endphp
@extends('admin.panel')
@section('maincontent')
    <div class="row">

        @forelse ($users as $user)
            <div class="card col-sm-10 col-lg-3" style="width: 18rem;">
                <div class="card-body p-1">
                    <img src="{{ asset('images/'.$user->profile->image->image_url) }}" alt="user image" class="card-img-top">

                    <h4 class="card-title my-3">{{ $user['firstname_' . $locale]." ".$user['lastname_' . $locale] }}</h4>
                    <h5 class="card-subtitle my-2 ">{{ $user->email }}</h5>
                    <hr>
                    <div class="card-text">


                        @php

                        $role=$user->role

                        @endphp
                            <li>{{ $role['name_' . $locale] }}</li>


                    </div>

                    <div class="container">

                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @php

                                // dd($user->roles->first->role_value->id);
                            @endphp
                            <select name="role_id" id="">

                                @foreach (Role::all() as $role)
                                    <option value="{{ $role->id }}"
                                        
                                        @if ($role->role_value == $user->role->role_value)
                                        selected
                                        @endif >
                                        {{ $role['name_' . $locale] }}</option>
                                @endforeach
                            </select>
                            <button type="submit">{{ __('public.edit') }}</button>
                        </form>

                        <hr>
                        <div class="row ">

                            <a href="/admin/users/delete/{{ $user->id }}"
                                class="btn btn-danger col-4">{{ __('public.delete') }}</a>
                            <a href="/admin/users/deactivate/{{ $user->id }}"
                                class="btn btn-warning col-4">{{ __('public.deactivate') }}</a>
                            <a href="/admin/users/edit/{{ $user->id }}"
                                class="btn btn-secondary col-4">{{ __('public.edit') }}</a>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    @php
                        $created_at = Carbon::parse($user->created_at);
                        $updated_at = Carbon::parse($user->updated_at);
                    @endphp
                    <li>{{ __('public.created_at') }} : {{ $created_at->diffForHumans() }}</li>
                    <li>{{ __('public.updated_at') }} : {{ $updated_at->diffForHumans() }}</li>
                </div>
            </div>

        @empty
            no users found
        @endforelse
    </div>

@endsection
