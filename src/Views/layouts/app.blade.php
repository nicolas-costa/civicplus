<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CivicPlus</title>
	<link href="../../../public/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../../public/css/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body style="height: 100vh; background: linear-gradient(to bottom, #fff 0%, #f0f8ff 100%);">
@if (isset($error))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		{{ $error }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
<div class="container d-flex justify-content-center align-items-center" style="height: 100%;">
	@yield('content')
</div>
<script src="../../../public/js/bootstrap.bundle.min.js"></script>
</body>
</html>