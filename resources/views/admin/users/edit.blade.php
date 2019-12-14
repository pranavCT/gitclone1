@extends('layouts.admin')
@section('content')
<section class="col-lg-12">
    <div class="row">
        <div class="page-title text-blue p-15">Users Management&nbsp;<label style="color:#000;font-size:14px;margin-left:5px;">Edit User</label>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{URL::route('admin-dashboard')}}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{URL::route('admin-users')}}">Users</a>
                </li>
                <li class="breadcrumb-item active">Edit User</li>
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

            <div class="col-lg-12">
                <form class="mt-20" action="{{url('admin/update-user')}}/<?php echo $data['user_detail']->id; ?>" method="post">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>First Name&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="first_name" value="<?php echo $data['user_detail']->first_name; ?>" class="form-control">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Last Name&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="last_name" value="<?php echo $data['user_detail']->last_name; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone Number&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="phone_number" value="<?php echo $data['user_detail']->phone_number; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $data['user_detail']->email; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gender<small class="text-danger">*</small></label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option <?php echo $data['user_detail']->gender == GENDER_MALE ? 'selected="selected"' : ""; ?> value="GENDER_MALE"><?php echo GENDER_MALE; ?></option>
                                <option <?php echo $data['user_detail']->gender == GENDER_FEMALE ? 'selected="selected"': ""; ?> value="GENDER_FEMALE"><?php echo GENDER_FEMALE; ?></option>
                                <option <?php echo $data['user_detail']->gender == GENDER_OTHERS ? 'selected="selected"' : ""; ?> value="GENDER_OTHERS"><?php echo GENDER_OTHERS; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="religiosity">Religiosity&nbsp;<small class="text-danger">*</small></label>
                            <input type="religiosity" name="religiosity" value="<?php echo $data['user_detail']->religiosity; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="flavor">Flavor&nbsp;<small class="text-danger">*</small></label>
                            <input type="flavor" name="flavor" value="<?php echo $data['user_detail']->flavor; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="qualification">Qualification&nbsp;<small class="text-danger">*</small></label>
                            <input type="qualification" name="qualification" value="<?php echo $data['user_detail']->qualification; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="occupation">Occupation&nbsp;<small class="text-danger">*</small></label>
                            <input type="occupation" name="occupation" value="<?php echo $data['user_detail']->occupation; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="greetings">Greetings&nbsp;<small class="text-danger">*</small></label>
                            <input type="greetings" name="greetings" value="<?php echo $data['user_detail']->greetings; ?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="about_me">About Me&nbsp;<small class="text-danger">*</small></label>
                            <input type="about_me" name="about_me" value="<?php echo $data['user_detail']->about_me; ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <label>&nbsp;&nbsp;</label><br>
                            <a type="button" class="btn btn-default" href="{{URL::route('admin-users')}}">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{!! Html::script(config('app.url').'public/js/backend/users.js') !!} 
@stop