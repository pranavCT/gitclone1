@extends('layouts.frontend')
@section('content')
<div class="register-form pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-12 col-md-10 col-lg-7">
				<div class="register-form-section pb-3">
					<div class="row">
						<div class="col-12 col-sm-12 order-sm-12">
							<h2 class="text-center page-heading mt-0">Profile - {{ $data['first_name'] . ' ' . $data['last_name'] }}</h2>
							<div class="row">
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Email - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<span>{{ $data['email'] }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Gender - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<span>{{ ucfirst($data['gender']) }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Mobile Number - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<span>{{ $data['phone_number'] }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Qualification - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<span>{{ $data['qualification'] }}</span>
								</div>
								
								
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Location - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<span>{{ $data['city'] }}, {{ $data['state'] }}, {{ $data['country'] }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Course - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<span>{{ $data['course']['title'] }}</span>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Pdf File - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<a target="_blank" href="{{ url('') }}{{ $data['course']['materials']['pdf_file_path'] }}">Download</a>
									<a target="_blank" href="{{ url('') }}/course-materials-logs/{{ $data['course']['materials']['id'] }}/{{ FILE_TYPE_PDF }}">View History</a>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Doc File - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<a href="{{ url('') }}{{ $data['course']['materials']['doc_file_path'] }}">Download</a>
									<a target="_blank" href="{{ url('') }}/course-materials-logs/{{ $data['course']['materials']['id'] }}/{{ FILE_TYPE_DOC }}">View History</a>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<label>Zip File - </label>
								</div>
								<div class="col-12 col-sm-12 col-md-6 mb-3">
									<a href="{{ url('') }}{{ $data['course']['materials']['zip_file_path'] }}">Download</a>
									<a target="_blank" href="{{ url('') }}/course-materials-logs/{{ $data['course']['materials']['id'] }}/{{ FILE_TYPE_ZIP }}">View History</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop