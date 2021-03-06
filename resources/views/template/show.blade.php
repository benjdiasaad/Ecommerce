@extends('layouts.master')

@section('content')

<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200" style="margin-top:5%;">

        <div class="col-lg-9 menu-item filter-starters">
            <img src="/storage/files/{{ $product->image }}" class="menu-img rounded-circle" width="100px" height="67px" alt="">
            <div class="menu-content">
                <a href="#">{{$product->nom}}</a><span>${{$product->prix}}</span>
            </div>
            <div class="menu-ingredients">
                {{$product->details}}
            </div>
            <br>
            <form action="{{route('cart.store')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}" />
            <button type="submit" class="btn btn-light" style="margin-top: -1%;margin-left: 85px;color:black;"> Ajouter au panier </button>
            </form>
            <br>
        </div>

      </div>

    </div>
  </section>
@endsection