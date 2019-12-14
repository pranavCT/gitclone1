@extends('layouts.admin')
@section('content')
<section class="col-lg-12">
    <div class="row">
        <div class="page-title text-blue p-15">Users Management&nbsp;<label style="color:#000;font-size:14px;margin-left:5px;">Add User</label>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-dashboard') }}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-users') }}">Users</a>
                </li>
                <li class="breadcrumb-item active">Add User</li>
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

            @if ($errors->any())
                <div class="alert alert-danger pad-0">
                        @foreach ($errors->all() as $error)
                            <label style="display:block;">{{ $error }}</label>
                        @endforeach
                </div>
            @endif

            <div class="col-lg-12">
                <form id="add_user" class="mt-20" action="{{ route('admin-save-user') }}" method="post">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="first_name">First Name&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="first_name" class="form-control">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="last_name">Last Name&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="age">Age&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="age" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="{{ GENDER_MALE }}">MALE</option>
                                <option value="{{ GENDER_FEMALE }}">FEMALE</option>
                                <option value="{{ GENDER_OTHERS }}">OTHERS</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email&nbsp;<small class="text-danger">*</small></label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password&nbsp;<small class="text-danger">*</small></label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="qualification">Qualification&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="qualification" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="phone_number" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="course_id">Course</label>
                            <select class="form-control" name="course_id">
                                <option value="">Select Course</option>
                                @foreach($data['courses'] as $keyC => $valueC)
                                    <option value="{{ $valueC['id'] }}">{{ $valueC['title'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="city">City&nbsp;<small class="text-danger">*</small></label>
                            <input type="input" name="city" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="state">State&nbsp;<small class="text-danger">*</small></label>
                            <input type="input" name="state" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="country">Country&nbsp;<small class="text-danger">*</small></label>
                            <input type="input" name="country" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <label>&nbsp;&nbsp;</label><br>
                            <a type="button" class="btn btn-default" href="{{ route('admin-users') }}">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop