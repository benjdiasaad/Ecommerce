<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Restaurantly Benjdia - SAAD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/Saad.ico') }}" rel="icon">
  <link href="{{ asset('assets/img/Saad.jpg') }}" rel="Saad.jpg">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  @include('partials.navbar')

  @if (Cart::count() > 0)
<div class="px-4 px-lg-0" style="margin-top: 11%;">
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">Produit</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Prix</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Quantité</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Supprimer</div>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $product)
                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <img src="{{ $product->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="{{ route('template.show', ['nom' => $product->model->nom]) }}" class="text-dark d-inline-block align-middle">{{ $product->model->nom }}</a></h5><span class="text-muted font-weight-normal font-italic d-block">{{ $product->model->details }}</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>{{ $product->model->prix }}</strong></td>
                                <td class="border-0 align-middle"><strong style="margin-left: 15%;">1</strong></td>
                                <td class="border-0 align-middle" style="margin-left: 25%;">
                                    <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                    <div class="bg-dark rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                        <div class="input-group mb-4 border rounded-pill p-2">
                        <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                        <div class="input-group-append border-0">
                            <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                        </div>
                        </div>
                    </div>
                    <div class="bg-dark rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="bg-dark rounded-pill px-4 py-3 text-uppercase font-weight-bold">Détail de la commande </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                        <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Sous-total </strong><strong style="color:black;">{{ getPrix(Cart::subtotal()) }}</strong></li>
                        {{-- <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li> --}}
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxe</strong><strong style="color:black;">{{getPrix(Cart::tax()) }}</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                            <h5 class="font-weight-bold" style="color:black;">{{getPrix(Cart::total())}}</h5>
                        </li>
                        </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Passer à la caisse</a>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="col-md-12" style="margin-top: 11%;text-align:center;background-color:white;color:black;">
        <p>Votre panier est vide.</p>
    </div>
@endif

  @include('partials.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>