<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('assets/img/restau.ico') }}" rel="icon">

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
		@include('admin/partials.navbar')

		<div class="main">
			@include('admin/partials/header')
			<div class="modal fade" id="showDetails" tabindex="-1" aria-labelledby="showDetailsLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="showDetailsLabel">Message de l'utilisateur</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p class="message" style="text-align: justify;"></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
			<main class="content">
				<div class="container-fluid p-0">
					<div id="success_message"></div>
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
											<th> Details</th>
											<th> Delete</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($messages as $message)
                                        <tr>
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->object }}</td>
											<td><a data-bs-toggle="modal" id="showdetails" data-bs-target="#showDetails" data-custom-value="{{ $message->id }}" class="btn btn-primary btn-sm">Details</a></td>
											<td><a href="{{ route('message.delete', $message->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
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

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
			$(document).on('click', '#showdetails', function(e) {
				var message_id = $(this).data("custom-value");
				console.log(message_id);
				$.ajax({
					type: "GET",
					url: "/admin/get-messages/" + message_id,
					success: function (response) {
						if (response.status == 404) {
							$('#success_message').html("");
							$('#success_message').addClass('alert alert-danger');
							$('#success_message').text(response.message);
							$('#showDetails').modal('hide');

						} else {
							// console.log(response.student.name);
							$('.message').text(response.message.message);
						}
					}
                });
	    	});
		});
	</script>

</body>

</html>