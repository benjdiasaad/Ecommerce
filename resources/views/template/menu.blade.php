@extends('layouts.master')

@section('content')

<section id="menu" class="menu section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Menu</h2>
      <p>Check Our Tasty Menu</p>
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="menu-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-starters">Pizzas</li>
          <li data-filter=".filter-salads">Salads</li>
          <li data-filter=".filter-specialty">Boissons</li>
        </ul>
      </div>
    </div>

    <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

      <div class="col-lg-6 menu-item filter-starters">
        @foreach($pizzas as $pizza)
          <img src="/storage/files/{{ $pizza->image }}" class="menu-img rounded-circle" width="100px" height="67px">
          <div class="menu-content">
            <a href="{{ route('template.show', $pizza->nom) }}"> {{ $pizza->nom }}</a><span>{{ $pizza->prix }} DH</span>
          </div>
          <div class="menu-ingredients">
            {{ $pizza->details }}
          </div>
          <div style="margin-left: 12%;">
            <a href="{{ route('template.show', $pizza->nom) }}" class="btn btn-light" style="margin-top:2%;color:black;"> Voir l'article </a>
          </div>
          <br>
        @endforeach
      </div>

      <div class="col-lg-6 menu-item filter-specialty">
        @foreach($boissons as $boisson)
          <img src="/storage/files/{{ $boisson->image }}" class="menu-img rounded-circle" width="100px" height="67px">
          <div class="menu-content">
            <a href="{{ route('template.show', $boisson->nom) }}">{{ $boisson->nom }}</a><span>{{ $boisson->prix }} DH</span>
          </div>
          <div class="menu-ingredients">
            {{ $boisson->details }}
          </div>
          <div style="margin-left: 12%;">
            <a href="{{ route('template.show', $boisson->nom) }}" class="btn btn-light" style="margin-top:2%;color:black;"> Voir l'article </a>
          </div>
          <br>
        @endforeach
      </div>

      <div class="col-lg-6 menu-item filter-salads">
        @foreach($salades as $salade)
          <img src="/storage/files/{{ $salade->image }}" class="menu-img rounded-circle" width="100px" height="67px">
          <div class="menu-content">
            <a href="{{ route('template.show', $salade->nom) }}">{{ $salade->nom }}</a><span>{{ $salade->prix }} DH</span>
          </div>
          <div class="menu-ingredients">
            {{ $salade->details }}
          </div>
          <div style="margin-left: 12%;">
            <a href="{{ route('template.show', $salade->nom) }}" class="btn btn-light" style="margin-top:2%;color:black;"> Voir l'article </a>
          </div>
          <br>
        @endforeach
      </div>

    </div>

  </div>
</section>
@endsection