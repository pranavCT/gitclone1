@extends('layouts.admin')
@section('content')
<section class="col-lg-12">
    <div class="row">
        <div class="page-title text-blue p-15">Course Management&nbsp;<label style="color:#000;font-size:14px;margin-left:5px;">Add Course</label>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-dashboard') }}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-courses') }}">Courses</a>
                </li>
                <li class="breadcrumb-item active">Add Course</li>
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
                <form id='add_course' class="mt-20" action="{{ route('admin-save-course') }}" method="post">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Title&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="title" class="form-control">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <label>&nbsp;&nbsp;</label><br>
                            <a type="button" class="btn btn-default" href="{{ route('admin-courses') }}">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop