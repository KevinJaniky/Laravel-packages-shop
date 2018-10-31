@extends('shop::layouts.app')

@section('content')
<div class="row">



@foreach($products as $product)
<div class="card col-md-2" style="margin: 10px">
  <div class="card-body">
    <h5 class="card-title">{{ $product->name }}</h5>
    <p class="card-text">{{ $product->description }}</p>
    <p class="card-text">{{ $product->category->name }}</p>
    <a href="{{ route('shop.single.show',[$product->slug]) }}" class="btn btn-primary">{{ $product->prix }} €</a>
    <a href="{{ route('shop.addtopanier',[$product->slug]) }}" class="btn btn-primary">Add to panier</a>
  </div>
</div>
@endforeach
</div>
{{ $products->links() }}


<h1> PROMOTION</h1>

@foreach($promotions as $promotion)
<div class="card col-md-2" style="margin: 10px">
  <div class="card-body">
    <h5 class="card-title">{{ $promotion->product->name }}</h5>
    <p class="card-text">{{ $promotion->product->description }}</p>
    <p class="card-text">{{ $promotion->product->category->name }}</p>
    <a href="{{ route('shop.single.show',[$promotion->product->slug]) }}" class="btn btn-primary">{{ $promotion->product->price() }} €</a>
    <a href="{{ route('shop.addtopanier',[$promotion->product->slug]) }}" class="btn btn-primary">Add to panier</a>
  </div>
</div>
@endforeach

@endsection