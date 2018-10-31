@extends('shop::layouts.app')

@section('content')
<div class="container">
        <div class="row pub ">
           <h4>Panier / Paiement </h4>
        </div>
	
       <div class="row pub panier">
          <div class="row">
               <div class="col cell example example2" id ="Btn-stripe">
                  <h3>Paiment avec carte</h3>
                    <hr>
                  <form action="{{ route('shop.stripe') }}" method="POST">
              
                      {{csrf_field()}}
                      <script
                              src="http://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="{{env('STRIPE_KEY') }}"
                              data-amount="{{ $total * 100 }}"
                              data-name="E-Shop"
                              data-description="Site de vente en ligne"
                              data-image="{{ URL('img/logo.png')}}"
                              data-locale="auto"
                              data-currency="eur">
                      </script>
                  </form>
                </div>
          </div>

        </div>
        

 </div>
@endsection
@section('script')
@endsection