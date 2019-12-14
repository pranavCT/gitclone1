@extends('layouts.frontend')
@section('content')
<div class="register-form pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-12 col-md-10 col-lg-7">
				<div class="register-form-section pb-3">
					<div class="row">
						<div class="col-12 col-sm-12 order-sm-12">
							<h2 class="text-center page-heading mt-0">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h2>
							<div class="row">
								@if(sizeof($data) > 0)
									@foreach($data as $key => $val)
										<div class="col-12 col-sm-12 col-md-6 mb-3">
											<label>Uploaded Time({{ $val->created_at }}) </label>
										</div>
										<div class="col-12 col-sm-12 col-md-6 mb-3">
											<a href="{{ url('') }}/{{ $val->file_path }}">Download</a>
										</div>
									@endforeach
								@else
									<div>
										<span class="text-danger">No History Found</span>	
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop