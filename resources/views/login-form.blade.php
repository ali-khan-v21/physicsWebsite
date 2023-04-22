<!DOCTYPE html>
<html lang="en" dir=@php if(app()->getLocale()=='fa'){echo 'rtl';}else{echo 'ltr';} @endphp>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('public.site_name') }} | @yield('title')</title>


    @vite(['resources/sass/app.scss'])
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    @includeIf('./partials.header')
    <div class="container">


        <div class="row " style="margin-top: 250px">


            <form action="{{ route('login-user') }}" method="POST"
                class="col-lg-4 mx-auto text-center border border-1 py-4 shadow-theme">
                {{ csrf_field() }}

                @if ($errors->all())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                <div class="form-group my-4 p-3">
                    <input class="form-control" type="email" name="email"
                        placeholder="{{ __('public.enter_email') }}">

                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group my-4 p-3">
                    <input class="form-control" type="password" name="password"
                        placeholder="{{ __('public.enter_password') }}">

                        @if ($errors->has("password"))
                            <span class="text-danger">{{$errors->first("password")}}</span>
                        @endif
                </div>
                <div>

                    <button type="submit " class="mx-auto btn btn-primary my-3 ">{{ __('public.submit') }}</button>
                </div>

            </form>

        </div>
    </div>
</body>
