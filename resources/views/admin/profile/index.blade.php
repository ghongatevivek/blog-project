@extends('admin.layouts.admin')

@section('content')

<div class="pagetitle">
	<h1>Profile</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Home</a></li>
			<li class="breadcrumb-item active">My Profile</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section profile">
	<div class="row">
		<div class="col-xl-4">

			<div class="card">
				<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

					<img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
					<h2>{{Auth::user()->name??'-'}}</h2>

				</div>
			</div>

		</div>

		<div class="col-xl-8">

			<div class="card">
				<div class="card-body pt-3">
					<!-- Bordered Tabs -->
					<ul class="nav nav-tabs nav-tabs-bordered">

						<li class="nav-item">
							<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
						</li>

						<li class="nav-item">
							<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
						</li>

					</ul>
					<div class="tab-content pt-2">

						<div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

							<!-- Profile Edit Form -->
							<form action="{{route('profile-update')}}" method="POST">
								@csrf
								<div class="row mb-3">
									<label for="name" class="col-md-4 col-lg-3 col-form-label">User Name</label>
									<div class="col-md-8 col-lg-9">
										<input name="name" type="text" class="form-control" id="name" value="{{Auth::user()->name??'-'}}">
									</div>
								</div>

								<div class="row mb-3">
									<label for="mobile" class="col-md-4 col-lg-3 col-form-label">Mobile</label>
									<div class="col-md-8 col-lg-9">
										<input name="mobile" type="text" class="form-control" id="mobile" value="{{Auth::user()->mobile??'-'}}">
									</div>
								</div>

								<div class="row mb-3">
									<label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
									<div class="col-md-8 col-lg-9">
										<input name="email" type="email" class="form-control" id="email" value="{{Auth::user()->email??'-'}}">
									</div>
								</div>

								<div class="text-center">
									<button type="submit" class="float-end btn btn-primary">Save Changes</button>
								</div>
							</form><!-- End Profile Edit Form -->

						</div>

						<div class="tab-pane fade pt-3" id="profile-change-password">
							<!-- Change Password Form -->
							<form>

								<div class="row mb-3">
									<label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="password" type="password" class="form-control" id="currentPassword">
									</div>
								</div>

								<div class="row mb-3">
									<label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="newpassword" type="password" class="form-control" id="newPassword">
									</div>
								</div>

								<div class="row mb-3">
									<label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
									<div class="col-md-8 col-lg-9">
										<input name="renewpassword" type="password" class="form-control" id="renewPassword">
									</div>
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-primary float-end">Change Password</button>
								</div>
							</form><!-- End Change Password Form -->

						</div>

					</div><!-- End Bordered Tabs -->

				</div>
			</div>

		</div>
	</div>
</section>

@endsection


@push('scripts')
<script>
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$("#reminderTypeFrm").submit(function(e) {
			e.preventDefault();
			$.ajax({
				url: "{{route('remindertype.store')}}",
				type: 'POST',
				data: $(this).serialize(),
				beforeSend: function() {
					$(".submitBtn").attr('disabled', true);
				},
				success: function(response) {
					if (response.status) {
						$(".submitBtn").removeAttr('disabled');
						alert(response.message);
						$("#reminderTypeFrm")[0].reset();
						$("#basicModal").modal('hide');
						table.draw();
					}
				}
			})
		})
	})
</script>
@endpush