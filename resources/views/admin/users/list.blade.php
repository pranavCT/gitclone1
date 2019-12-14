@extends('layouts.admin')
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="page-title text-blue p-15">Users Management&nbsp;
                <h4 class="page-sub-title"><small>List All</small></h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin-dashboard') }}"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin-users') }}">Users</a>
                    </li>
                    <li class="breadcrumb-item active">List All</li>
                </ol>
            </div>

            <div class="action-buttons p-15 mb-15 text-right">
                <a href="{{ URL::route('admin-add-user') }}" class="btn btn-orange">Add New</a>
            </div>
        </div>
        
        @if (Session::has('message'))
            <div class="alert <?php echo Session::get('alert-class'); ?>">
                <span><?php echo Session::get('message'); ?></span>
            </div>
        @endif

        <div>
            <table class="table table-striped table-bordered" id="users_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="4%">#</th>
                        <th width="15%">Name</th>
                        <th width="15%">Course</th>
                        <th width="15%">Age</th>
                        <th width="7%">Gender</th>
                        <th width="7%">Email</th>
                        <th width="12%">Phone Number</th>
                        <th width="12%">Qualification</th>
                        <th width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (sizeof($data['all_users']) > 0)
                        @foreach ($data['all_users'] as $keyU => $valueU)
                            <tr>
                                <td>{{ $keyU + 1 }}</td>
                                <td>{{ $valueU->first_name . ' ' . $valueU->last_name }}</td>
                                <td>{{ courseDetails($valueU->course_id) ? courseDetails($valueU->course_id)->title : 'N/A' }}</td>
                                <td>{{ $valueU->age }}</td>
                                <td>{{ ucfirst($valueU->gender) }}</td>
                                <td>{{ ucfirst($valueU->email) }}</td>
                                <td>{{ $valueU->phone_number }}</td>
                                <td>{{ $valueU->qualification }}</td>

                                <td style="padding:8px 0px;">
                                    <a onclick="return confirm('Are you sure to delete user?')" style="padding:0px 8px;" href="{{url('admin/delete-user')}}/{{ $valueU->id }}"><small>Delete</small></i></a>
                                    <hr style='margin: 5px 0px;border-top:1px solid #ddd;'>

                                    <a style="padding:0px 8px;" href="{{ route('admin-view-user', ['id' => $valueU->id]) }}"><small>View</small></a>
                                </td>
                            </tr>
                        @endforeach
                        <script>
                            $(document).ready(function() {
                                $('#users_table').DataTable({
                                    responsive: true
                                });
                            });
                        </script>
                    @else
                        <tr class="text-center">
                            <td colspan="9"><small><i>-- No Users Found --</i></small></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop