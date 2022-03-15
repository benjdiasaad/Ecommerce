<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('static/img/icons/icon-48x48.png') }}" />

	<title> Admin | BENJDIA Saad </title>

	{{-- CDN bootstrap and font-awesome --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="{{ asset('static/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/admin/dashboard">
					<span class="align-middle">BENJDIA Saad</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/dashboard">
							<i class="align-middle" data-feather="sliders"></i> <span
								class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/category">
							<i class="align-middle" data-feather="menu"></i> <span class="align-middle">Categorie</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/product">
							<i class="align-middle" data-feather="shopping-bag"></i> <span
								class="align-middle">Product</span>
						</a>
					</li>
					
					<li class="sidebar-item active">
                        <a class="sidebar-link" href="/admin/message">
                            <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Messages</span>
                        </a>
                    </li>

				</ul>

			</div>
		</nav>

		<div class="main">
			@include('admin/partials/header')

			<main class="content">
				<div class="container-fluid p-0">

					<h3 class="mb-3"><strong>Messages</strong> </h3>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">List of messages
									</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Nom</th>
											<th>Email</th>
											<th>Object</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($messages as $message)
                                        <tr>
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->object }}</td>
                                        </tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>

					</div>


				</div>
			</main>

			@include('admin/partials/footer')

		</div>
	</div>

	<script src="{{ asset('static/js/app.js') }}"></script>

	{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script> --}}
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>