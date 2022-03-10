  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 11AM - 23PM</span></i>
      </div>

    </div>
  </div>

  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="/">Restaurantly</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li><a class="nav-link scrollto" href="/about">About</a></li>
          <li><a class="nav-link scrollto" href="/menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="/special">Specials</a></li>
          <li><a class="nav-link scrollto" href="/contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart" aria-hidden="true"> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> {{ Cart::count() }} </span> </i> </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <a href="/contact" class="book-a-table-btn scrollto d-none d-lg-flex">Contact us</a>

    </div>
  </header>