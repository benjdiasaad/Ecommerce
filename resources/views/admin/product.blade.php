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

					<li class="sidebar-item active">
						<a class="sidebar-link" href="/admin/product">
							<i class="align-middle" data-feather="shopping-bag"></i> <span
								class="align-middle">Product</span>
						</a>
					</li>

				</ul>

			</div>
		</nav>

		<div class="main">
			@include('admin/partials/header')

			<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addProductLabel">Add Product</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<ul id="saveform_errList"> </ul>

							<div class="form-group mb-3">
								<label for="">Product Name</label>
								<input type="text" required class="nom form-control">
							</div>
							<div class="form-group mb-3">
								<label for="">Details of product</label>
								<textarea class="details form-control" rows="3" required></textarea>
							</div>
							<div class="form-group mb-3">
								<label for="">Prix of product</label>
								<input type="number" required class="prix form-control">
							</div>
							<div class="form-group mb-3">
								<label for="">Choose category</label>
								<select class="category form-control">
									@foreach($categories as $categorie)
									<option value="{{ $categorie->id }}">{{$categorie->category}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group mb-3">
								<label for="">Sélectionner une image :</label>
								<input type="file" accept="image/*" multiple class="image form-control">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary add_product">Save changes</button>
						</div>
					</div>
				</div>
			</div>

			{{-- Delete Modal --}}
			<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Delete Product Data</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h4>Confirm to Delete Data ?</h4>
							<input type="hidden" id="deleteing_id">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary delete_product">Yes Delete</button>
						</div>
					</div>
				</div>
			</div>
			{{-- End - Delete Modal --}}

			<main class="content">
				<div class="container-fluid p-0">

					<div id="success_message"></div>

					<h1 class="h3 mb-3"><strong>Products</strong> </h1>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">List of products
										<button type="button" class="btn btn-primary float-end btn-sm"
											data-bs-toggle="modal" data-bs-target="#addProduct">
											Ajouter Product
										</button>
									</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Nom de produit</th>
											<th>Prix</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>
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

	<script>
		$(document).ready(function(){

			fetchProduct();
			function fetchProduct() {
            $.ajax({
                type: "GET",
                url: "/admin/fetch-products",
                dataType: "json",
                success: function (response) {
                    $('tbody').html("");
                    $.each(response.product, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.nom + '</td>\
                            <td>' + item.prix + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
                }
            });
           }
			$(document).on('click', '.add_product', function(e) {
				e.preventDefault();
				var data = {
					'nom' : $('.nom').val(),
					'prix' : $('.prix').val(),
					'details': $('.details').val(),
					'category_id' : $('.category').val(),
					'image' : $('.image').val(),
				}

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url:"/admin/products",
					data: data,
					dataType: 'json',
					success: function(response) {
						if(response.status == 400)
						{
							$('#saveform_errList').html("");
                            $('#saveform_errList').addClass('alert alert-danger');
							$.each(response.errors, function(key, err_value){
								$('#saveform_errList').append('<li>' + err_value + '</li>');
							});
						}
						else
						{
							$('#success_message').html("");
							$('#success_message').addClass('alert alert-success');
							$('#success_message').text(response.message);
							$('#addProduct').modal('hide');
							$('#addProduct').find('input').val("");
							fetchProduct();
						}
					}
				})
			});

			$(document).on('click', '.deletebtn', function () {
				var categorie_id = $(this).val();
				console.log(categorie_id);
				$('#DeleteModal').modal('show');
				$('#deleteing_id').val(categorie_id);
            });

			$(document).on('click', '.delete_product', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/admin/delete-product/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        $('.delete_product').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_product').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchProduct();
                    }
                }
            });
        });

		});
	</script>


</body>

</html>