<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{ asset('static/img/icons/icon-48x48.png') }}" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />
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

					<li class="sidebar-item active">
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

				</ul>

			</div>
		</nav>

		<div class="main">
			@include('admin/partials/header')

			<!-- Modal -->
			<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<ul id="saveform_errList"></ul>

							<div class="form-group mb-3">
								<label for="">Category Name</label>
								<input type="text" required class="category form-control">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary add_category">Save changes</button>
						</div>
					</div>
				</div>
			</div>

			{{-- Edit Modal --}}
			<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editCategoryModalLabel">Edit & Update Category Data</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">

							<ul id="update_msgList"></ul>

							<input type="hidden" id="categorie_id" />

							<div class="form-group mb-3">
								<label for="">Category name</label>
								<input type="text" id="category" required class="form-control">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary update_category">Update</button>
						</div>

					</div>
				</div>
			</div>
			{{-- Edn- Edit Modal --}}


			{{-- Delete Modal --}}
			<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Delete Category Data</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h4>Confirm to Delete Data ?</h4>
							<input type="hidden" id="deleteing_id">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary delete_category">Yes Delete</button>
						</div>
					</div>
				</div>
			</div>
			{{-- End - Delete Modal --}}

			<main class="content">
				<div class="container-fluid p-0">

					<div id="success_message"></div>
					<h1 class="h3 mb-3"><strong>Categories</strong> </h1>

					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">List of categories
										<button type="button" class="btn btn-primary float-end btn-sm"
											data-bs-toggle="modal" data-bs-target="#addCategory">
											Ajouter Catégorie
										</button>
									</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>#</th>
											<th>Nom de la catégorie</th>
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

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<script>
	$(document).ready(function(){

			fetchCategory();
			
			function fetchCategory() {
            $.ajax({
                type: "GET",
                url: "/admin/fetch-categories",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.category, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.category + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
                }
            });
        }


		$(document).on('click', '.editbtn', function(e) {
				var categorie_id = $(this).val();
				$('#editCategoryModal').modal('show');
				$.ajax({
                type: "GET",
                url: "/admin/edit-category/" + categorie_id,
                success: function (response) {
                    if (response.status == 404) {
						$('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        $('#editCategoryModal').modal('hide');
                    } else {
                        // console.log(response.student.name);
                        $('#category').val(response.category.category);
                        $('#categorie_id').val(categorie_id);
                    }
                }
            });
		});

		$(document).on('click', '.update_category', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#categorie_id').val();
            // alert(id);

            var data = {
                'category': $('#category').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/admin/update-category/" + id,
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_category').text('Update');
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editCategoryModal').find('input').val('');
                        $('.update_category').text('Update');
                        $('#editCategoryModal').modal('hide');
                        fetchCategory();
                    }
                }
            });

        });

			$(document).on('click', '.add_category', function(e) {
				e.preventDefault();
				var data = {
					'category' : $('.category').val(),
				}

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					type: 'POST',
					url:"/admin/categories",
					data: data,
					dataType: 'json',
					success: function(response) {
						if(response.status == 400)
						{
							$('#saveform_errList').html("");
                            $('#saveform_errList').addClass('alert alert-danger');
							$.each(response.errors, function(key, err_value){
								console.log('ok');
								$('#saveform_errList').append('<li>' + err_value + '</li>');
							});
						}
						else
						{
							$('#success_message').html("");
							$('#success_message').addClass('alert alert-success');
							$('#success_message').text(response.message);
							$('#addCategory').modal('hide');
							$('#addCategory').find('input').val("");
							fetchCategory();
						}
					}
				})
			});

		$(document).on('click', '.deletebtn', function () {
            var categorie_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(categorie_id);
        });

        $(document).on('click', '.delete_category', function (e) {
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
                url: "/admin/delete-category/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        $('.delete_category').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_category').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchCategory();
                    }
                }
            });
        });
	});
	</script>

</body>

</html>