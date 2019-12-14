@extends('layouts.admin')
@section('content')
<section class="col-lg-12">
    <div class="row">
        <div class="page-title text-blue p-15">Course Material Management&nbsp;<label style="color:#000;font-size:14px;margin-left:5px;">Edit Course Materials</label>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-dashboard') }}"><i class="fas fa-home"></i></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin-course-materials') }}">Courses Materials</a>
                </li>
                <li class="breadcrumb-item active">Edit Course Materials</li>
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
                <form id="update_course" class="mt-20" action="{{ url('admin/update-course-material') }}/{{ $data['course_material_details']['id'] }}" method="post" enctype="multipart/form-data">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Title&nbsp;<small class="text-danger">*</small></label>
                            <input type="text" name="title" value="{{ $data['course_material_details']->title }}" class="form-control">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Course&nbsp;<small class="text-danger">*</small></label>
                            <select class="form-control" name="course_id">
                                <option value="">Select Course</option>
                                @foreach($data['courses'] as $keyC => $valueC)
                                    <option value="{{ $valueC['id'] }}" @if($valueC['id'] == $data['course_material_details']->course_id) selected @endif>
                                        {{ $valueC['title'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Upload PDF&nbsp;<small class="text-danger">*</small></label>
                            <input type="file" name="pdf_file" class="" accept=".pdf">
                            <span>{{ $data['course_material_details']->pdf_file }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Upload Doc&nbsp;<small class="text-danger">*</small></label>
                            <input type="file" name="doc_file" class="" accept=".doc, .docx,.txt">
                            <span>{{ $data['course_material_details']->doc_file }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Upload Zip&nbsp;<small class="text-danger">*</small></label>
                            <input type="file" name="zip_file" class="" accept=".zip,.rar,.7zip">
                            <span>{{ $data['course_material_details']->zip_file }}</span>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <label>&nbsp;&nbsp;</label><br>
                            <a type="button" class="btn btn-default" href="{{ route('admin-course-materials') }}">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop