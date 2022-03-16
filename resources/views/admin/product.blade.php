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

			<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addProductLabel">Add Product</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data" id="form">
								@csrf
								  <div class="form-group mb-3">
									  <label for="">Product name</label>
									  <input type="text" name="nom" class="form-control">
									  <span class="text-danger error-text nom_error"></span>
								  </div>
								  <div class="form-group mb-3">
									<label for="">Prix</label>
									<input type="number" name="prix" class="form-control">
									<span class="text-danger error-text prix_error"></span>
								  </div>
								  <div class="form-group mb-3">
									<label for="">Details</label>
									<textarea name="details" class="details form-control" rows="3" required></textarea>
									<span class="text-danger error-text detail_error"></span>
								 </div>
								 <div class="form-group mb-3">
									<label for="">Choose category</label>
									<select class="form-control" name="category_id">
										@foreach($categories as $categorie)
										<option value="{{ $categorie->id }}">{{$categorie->category}}</option>
										@endforeach
									</select>
									<span class="text-danger error-text category_id_error"></span>
								</div>
								  <div class="form-group mb-3">
									  <label for="">Product image</label>
									  <input type="file" name="image" class="form-control">
									  <span class="text-danger error-text image_error"></span>
								  </div>
								  <div class="img-holder"></div>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								  <button type="submit" class="btn btn-primary">Save Product</button>
							  </form>

						</div>

					</div>
				</div>
			</div>

			{{-- Edit Modal --}}
			<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editProductModalLabel">Modify Product</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<form action="{{ route('update.product')}}" method="post" enctype="multipart/form-data" id="form-2">
								@csrf
								 <input type="hidden" id="product_id" name="product_id" />

								  <div class="form-group mb-3">
									  <label for="">Product name</label>
									  <input type="text" name="nom" class="nom form-control">
									  <span class="text-danger error-text nom_error"></span>
								  </div>
								  <div class="form-group mb-3">
									<label for="">Prix</label>
									<input type="number" name="prix" class="prix form-control">
									<span class="text-danger error-text prix_error"></span>
								  </div>
								  <div class="form-group mb-3">
									<label for="">Details</label>
									<textarea name="details" class="details form-control" rows="3" required></textarea>
									<span class="text-danger error-text detail_error"></span>
								 </div>
								 <div class="form-group mb-3">
									<label for="">Choose category</label>
									<select id="emptyDropdown" class="form-control">
									</select>
								</div>
								  <div class="form-group mb-3">
									  <label for="">Product image <button id="clearInputFile" type="button" class="btn btn-danger btn-sm" style="right: 0px;"> Clear </button> </label>
									  <input type="file" name="image" class="image form-control" data-value="">
									  <span class="text-danger error-text image_error"></span>
								  </div>
								  <div class="img-holder-update"></div>
								  <br>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								  <button type="submit" class="btn btn-primary">Modify Product</button>
							  </form>

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
											<th>Catgorie</th>
											<th>Image</th>
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
                            <td>' + item.category + '</td>\
                            <td> <img class="rounded-circle" width="65" height="70" src=/storage/files/'+ item.image + '> </img></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
                }
            });
           }

		   $('#form').on('submit', function(e){
                e.preventDefault();

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

                var form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            $.each(data.error, function(prefix,val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $(form)[0].reset();
                            // alert(data.msg);
							$("#success_message").html("");
							$("#success_message").addClass('alert alert-success');
							$("#success_message").text(data.msg);
							$("#addProduct").modal('hide');
                            fetchProduct();
                        }
                    }
                });
            });

			//Reset input file
            $('input[type="file"][name="image"]').val('');
            //Image preview
            $('input[type="file"][name="image"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });

			$(document).on('click', '.deletebtn', function () {
				var categorie_id = $(this).val();
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

		$(document).on('click', '.editbtn', function(e) {
				var product_id = $(this).val();
				$('#editProductModal').modal('show');
				$.ajax({
                type: "GET",
                url: "/admin/edit-product/" + product_id,
                success: function (response) {
                    if (response.status == 404) {
						$('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        $('#editProductModal').modal('hide');
                    } else {
                        $('.nom').val(response.product[0].nom);
                        $('.prix').val(response.product[0].prix);
                        $('.details').val(response.product[0].details);
						$('#emptyDropdown').append('<option value="' + response.product[0].categorie_id + '">' + response.product[0].category + '</option>');
						$('#editProductModal').find('#form-2').find('.img-holder-update').html('<img class="d-flex align-self-start rounded mr-3" height="64" src="/storage/files/'+response.product[0].image+'" >');
						$('#editProductModal').find('#form-2').find('input[type="file"]').attr('data-value','<img class="d-flex align-self-start rounded mr-3" height="64" src="/storage/files/'+response.product[0].image+'" >');
						// $('#editProductModal').find('#form-2').find('input[type="file"]').val('saad.jpg');
						// $('.image').val(response.product[0].image);
                    }
                }
            });
		});

		$('input[type="file"][name="image"]').on('change', function(){
			var img_path = $(this)[0].value;
			var img_holder = $('.img-holder-update');
			var currentImagePath = $(this).data('value');
			var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
			if(extension == 'jpg' || extension == 'jpeg' || extension == 'png'){
				if(typeof(FileReader) != 'undefined'){
					img_holder.empty();
					var reader = new FileReader();
					reader.onload = function(e){
                        $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
                    }
                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
				}else{
					$(img_holder).html('This browser does not support FileReader');
				}
			}else{
                    $(img_holder).html(currentImagePath);
            } 
		});

		$(document).on('click','#clearInputFile', function(){
			var form = $(this).closest('form');
			$(form).find('input[type="file"]').val('');
			$(form).find('.img-holder-update').html($(form).find('input[type="file"]').data('value'));
		});

	});
	</script>


</body>

</html>