@extends('shop::layouts.app')

@section('content')
<div class="container">
    @if($panier->count() == 0)
    <p>Le panier est vide</p>
    @else
    <h2>Total : {{ $total }} €</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
          @foreach($panier as $p)
            <tr>
              <td>{{ $p->id }}</td>
              <td>{{ $p->name }}</td>
              <td>{{ $p->qty }}</td>
              <td>{{ $p->price }}</td>
              <td><a href="{{ route('shop.removetopanier',[$p->rowId]) }}" class="btn btn-danger btn-sm">Remove</a></td>
            </tr>
          @endforeach
        </tbody>
    </table>

    <a href="{{ route('shop.validation') }}" class="btn btn-success">Valider le panier</a>
    <a href="{{ route('home') }}" class="btn btn-success">Continuer mes achats</a>
    @endif
</div>
@endsection
