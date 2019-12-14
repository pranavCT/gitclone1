@extends('layouts.frontend')
@section('content')
<div class="register-form pt-5 pb-5 h-100">
	<div class="container" style="height: 450px;">
		<div class="row justify-content-md-center">
			<div class="col-12 col-md-10 col-lg-6">
				<div class="register-form-section pb-3">
					<div class="row">
						<div class="col-12">
							
							<?php
							if (Session::has('message'))
							{
							?>
								<div class="alert alert-<?php echo Session::get('alert-class'); ?>">
									<span class="login_error"><small><?php echo Session::get('message')?></small></span>
								</div>
							<?php
							}
							?>
						</div>

						<div class="col-12 col-sm-10 offset-sm-1 order-sm-12">
							<h2 class="text-center page-heading mt-0">Sign In</h2>
							<form method="post" action="">
								<div class="row">
									<div class="col-12 col-sm-12 col-md-12 mb-3">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input class="form-control" placeholder="Email Address" type="email" name="email" required>
									</div>
									<div class="col-12 col-sm-12 col-md-12 mb-3">
										<input class="form-control" placeholder="Password" type="password" name="password" required>
									</div>
									<div class="col-12 col-sm-12 col-md-12 mb-3">
										<input class="custom_btn btn btn-block" placeholder="Sign in" type="submit" value="Sign in">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop