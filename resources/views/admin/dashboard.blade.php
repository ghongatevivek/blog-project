@extends('admin.layouts.admin')

@section('content')
<div class="pagetitle">
	<h1>Dashboard</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Home</a></li>
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section dashboard">
	<div class="row">

		<!-- Left side columns -->
		<div class="col-lg-12">
			<div class="row">

				<!-- Sales Card -->
				<div class="col-xxl-4 col-md-4">
					<div class="card info-card sales-card">


						<div class="card-body">
							<h5 class="card-title">Total Active Users </h5>

							<div class="d-flex align-items-center">
								<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-person-fill"></i>
								</div>
								<div class="ps-3">
									<h6>145</h6>
								</div>
							</div>
						</div>

					</div>
				</div><!-- End Sales Card -->

				<!-- Revenue Card -->
				<div class="col-xxl-4 col-md-4">
					<div class="card info-card revenue-card">

						<div class="card-body">
							<h5 class="card-title">Total Reminders</h5>

							<div class="d-flex align-items-center">
								<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
									<i class="bi bi-alarm-fill"></i>
								</div>
								<div class="ps-3">
									<h6>0</h6>
								</div>
							</div>
						</div>

					</div>
				</div><!-- End Revenue Card -->

			</div>
		</div>

	</div>
</section>

@endsection