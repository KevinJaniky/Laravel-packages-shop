@extends('shop::layouts.app')

@section('content')
<div class="container">
  <h2>{{ $product->name }}<span class=" badge-primary badge">{{ $product->price() }} €</span></h2>
  <p>{{ $product->description }}</p>

  <div class="row">
    <a href="{{ route('shop.addtopanier',[$product->slug]) }}" class="btn btn-warning btn-sm">Add to panier</a>
  </div>
  <div class="card" style="width: 18rem;">
    <div class="card-header">
      Information
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Quantité : {{ $product->qte }}</li>
      <li class="list-group-item">Categorie : {{ $product->category->name }}</li>
      <li class="list-group-item">Brand : {{ $product->brand->name }}</li>
      <li class="list-group-item">Tags : 
        @foreach($product->tags as $t)
        {{ $t->name }}</li>
        @endforeach
    </ul>
    
  </div>

  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach($product->visuel as $v)
        <div class="carousel-item {{ $loop->index == 0 ? 'active' :'' }}">
          <img class="d-block w-100" src="{{ $v->url }}" alt="First slide">
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection