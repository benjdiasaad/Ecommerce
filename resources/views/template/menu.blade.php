@extends('layouts.master')

@section('content')

<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up" style="margin-top:7%;">

      <div class="section-title">
        <h2>Menu</h2>
        <p>Check Our Tasty Menu</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="menu-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-starters">Boissons</li>
            <li data-filter=".filter-salads">Salads</li>
            <li data-filter=".filter-specialty">Pizza</li>
          </ul>
        </div>
      </div>

      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-6 menu-item filter-starters">
        @foreach($boissons as $boisson)
            <img src="/storage/files/{{ $boisson->image }}" class="menu-img" alt="">
            <div class="menu-content">
                <a href="#">{{$boisson->nom}}</a><span>${{$boisson->prix}}</span>
            </div>
            <div class="menu-ingredients">
                {{$boisson->details}}
            </div>
            <br>
            <div>
                <a href="{{route('template.show', $boisson->nom)}}" class="stretched-link btn btn-secondary">Voir l'article</a>
            </div>
            <br>
          @endforeach
        </div>

        <div class="col-lg-6 menu-item filter-specialty">
            @foreach($pizzas as $pizza)
                <img src="/storage/files/{{ $pizza->image }}" class="menu-img" alt="">
                <div class="menu-content">
                    <a href="#">{{$pizza->nom}}</a><span>${{$pizza->prix}}</span>
                </div>
                <div class="menu-ingredients">
                    {{$pizza->details}}
                </div>
                <br>
                <div>
                    <a href="{{route('template.show', $pizza->nom)}}" class="stretched-link btn btn-secondary">Voir l'article</a>
                </div>
                <br>
              @endforeach
            </div>

        <div class="col-lg-6 menu-item filter-salads">
            @foreach($salades as $salade)  
             <img src="/storage/files/{{ $salade->image }}" class="menu-img" alt="">
             <div class="menu-content">
               <a href="#">{{$salade->nom}}</a><span>${{$salade->prix}}</span>
             </div>
             <div class="menu-ingredients">
               {{$salade->details}}
             </div>
             <br>
            <div>
                <a href="{{route('template.show', $salade->nom)}}" class="stretched-link btn btn-secondary">Voir l'article</a>
            </div>
            <br>
             @endforeach
           </div>
      </div>

    </div>
  </section>
@endsection