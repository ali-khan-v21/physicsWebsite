@extends('admin.panel')
@section('pagetitle')
{{__('public.new_post')}}
@endsection
@section('maincontent')
    <div class="row">

        <form action="" class="row">

            <div class="col-lg-6 col-sm-10">
                <div class="row  my-3">


                    <div class="form-group col-lg-6 col-sm-10 ">

                        <input type="text" placeholder="عنوان فارسی پست" class="form-control ">
                    </div>
                    <div class="form-group  col-lg-6 col-sm-10" >

                        <select class="form-select" aria-label="Default select example">
                            <option selected>{{__("public.choose_category")}}</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="متن فارسی پست"></textarea>
            </div>
            <div class="col-lg-6 col-sm-10">

                <div class="row my-3">

                    <div class="form-group col-lg-12 col-sm-12 text-start">

                        <input type="text" placeholder="english title" class="form-control ">
                    </div>

                </div>
                <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="english post text"></textarea>
            </div>
            <div class="row my-3 align-items-center">
                <div class="col-9  ">

                        <label for="formFile" class="form-label">{{__('public.choose_image')}}</label>
                        <input class="form-control" type="file" id="formFile">


                </div>
                <div class="col-2 text-center">


                    <button type="submit" class="btn btn-primary">{{__('public.submit')}}</button>
                    {{-- <button type="submit" form="a-form">Submit</button> --}}
                </div>

            </div>
        </form>
    </div>
@endsection
