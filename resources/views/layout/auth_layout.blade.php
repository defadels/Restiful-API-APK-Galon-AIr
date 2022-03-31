
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Syndash - Bootstrap4 Admin Template</title>
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/icons.css')}}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/app.css')}}" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								@yield('content')
							</div>
							<div class="col-lg-6">
								<img src="{{asset('assets/images/login-images/login-frent-img.jpg')}}" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>