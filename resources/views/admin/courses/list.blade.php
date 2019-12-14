@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="page-title text-blue p-15">Courses Management&nbsp;
                <h4 class="page-sub-title"><small>List All</small></h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin-dashboard') }}"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin-courses') }}">Courses</a>
                    </li>
                    <li class="breadcrumb-item active">List All</li>
                </ol>
            </div>

            <div class="action-buttons p-15 mb-15 text-right">
                <a href="{{ URL::route('admin-add-course') }}" class="btn btn-orange">Add New</a>
            </div>
        </div>
        
        @if (Session::has('message'))
            <div class="alert <?php echo Session::get('alert-class'); ?>">
                <span><?php echo Session::get('message'); ?></span>
            </div>
        @endif

        <div>
            <table class="table table-striped table-bordered" id="pages_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Last Updated on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (sizeof($data['allCourse']) > 0)
                        @foreach ($data['allCourse'] as $keyC => $valueC)
                            <tr>
                                <td><?php echo $keyC + 1; ?></td>
                                <td><?php echo $valueC['title']; ?></td>
                                <td><?php echo date('d-m-Y | H:i A', strtotime($valueC['updated_at'])); ?></td>
                                <td style="padding:8px 0px;">
                                    <a onclick="return confirm('Are you sure to delete course?')" style="padding:0px 8px;" href="{{url('admin/delete-course')}}/{{ $valueC->id }}"><small>Delete</small></i></a>
                                    <a style="padding:0px 8px;" href="{{url('admin/edit-course')}}/<?php echo $valueC['id']?>"><small>Edit</small></a>
                                </td>
                            </tr>
                        @endforeach
                        <script>
                            $(document).ready(function() {
                                $('#pages_table').DataTable({
                                    responsive: true
                                });
                            });
                        </script>
                    @else
                        <tr class="text-center">
                            <td colspan="8"><small><i>-- No Course Created Yet --</i></small></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop