@extends('layouts.admin')
@section('content')
<section class="col-lg-12">
    <div class="row">
        <div class="page-title text-blue p-15">Users Management&nbsp;<label style="color:#000;font-size:14px;margin-left:5px;">View User - <strong>{{ $data['userDetails']->first_name . ' ' . $data['userDetails']->last_name }}</strong></label>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::route('admin-dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-users') }}">Users Management</a>
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
                        <span class="form-control">{{ $data['userDetails']->first_name . ' ' . $data['userDetails']->last_name }}</span>
                       
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Age</label>
                        <span class="form-control">{{ $data['userDetails']->age }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <span class="form-control">{{ $data['userDetails']->gender }}</span>
                       
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email</label>
                        <span class="form-control">{{ $data['userDetails']->email }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Qualification</label>
                        <span class="form-control">{{ $data['userDetails']->qualification }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <span class="form-control">{{ $data['userDetails']->phone_number }}</span>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Course</label>
                        <span class="form-control">{{ courseDetails($data['userDetails']->course_id) ? courseDetails($data['userDetails']->course_id)->title : 'N/A' }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>City</label>
                        <span class="form-control">{{ $data['userDetails']->city }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>State</label>
                        <span class="form-control">{{ $data['userDetails']->state }}</span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Country</label>
                        <span class="form-control">{{ $data['userDetails']->country }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop