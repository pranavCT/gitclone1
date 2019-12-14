@extends('layouts.admin')
@section('content')
<section class="wrapper login-main-body">
    <div class="row">
        <div class="col-xs-12 col-lg-5 exact_center">
            <form class="form-login" action="{{ url('admin/login') }}" method="POST">
                <a href="javascript:void(0);" class="login_for_logo">
                    <img src="{{url('public/img/ITL_Logo2.png')}}">
                </a>
                <!-- <h2 class="form-login-heading">Git Clone |
                    <small>Admin Login</small>
                </h2> -->
                <div class="login-wrap">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <br>
                    @if (Session::has('message'))
                        <div>
                            <label class="login_error">{{ Session::get('message') }}</label>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>
@stop