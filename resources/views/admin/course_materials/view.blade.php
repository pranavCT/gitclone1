@extends('layouts.admin')
@section('content')
<section class="col-lg-12">
    <div class="row">
        <div class="page-title text-blue p-15">Users Management&nbsp;<label style="color:#000;font-size:14px;margin-left:5px;">View User - <strong>{{ $data['userDetails']['name'] }}</strong></label>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::route('admin-dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-users', ['list_type' => $data['userDetails']['status']])}}">Users Management</a>
                </li>
                <li class="breadcrumb-item active">View User</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('message'))
                <div class="alert <?php echo Session::get('alert-class'); ?>">
                    <label><?php echo Session::get('message'); ?></label>
                </div>
            @endif

            <div class="col-md-8 col-md-offset-2 mt-20">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Name</label>
                        <span class="form-control">{{ !empty($data['userDetails']['name']) ? $data['userDetails']['name'] : 'N/A' }}</span>
                       
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Age</label>
                        <span class="form-control">{{ !empty($data['userDetails']['age']) ? $data['userDetails']['age'] : 'N/A' }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <span class="form-control">{{ !empty($data['userDetails']['gender']) ? $data['userDetails']['gender'] : 'N/A' }}</span>
                       
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <span class="form-control">{{ $data['userDetails']['phone_number'] }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Qualification</label>
                        <span class="form-control">{{ $data['userDetails']['details']['qualification'] }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Occupation</label>
                        <span class="form-control">{{ $data['userDetails']['details']['occupation'] }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Greetings</label>
                        <span class="form-control">{{ $data['userDetails']['details']['greetings'] }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control" readonly="readonly">{{ urldecode($data['userDetails']['details']['about_me']) }}</textarea> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop