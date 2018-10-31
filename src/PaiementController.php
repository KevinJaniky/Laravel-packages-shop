<?php

namespace Kjaniky\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use App\User;
use Auth;

class PaiementController extends Controller
{
    public function checkoutStripe(Request $request)
    {
        $total = \Cart::total();

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $user = User::find(Auth::user()->id);

            if (Auth::user()->email != $request->stripeEmail ) {

                $customer = Customer::create([
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken,
                ]);
                // invité
            }else {
                if(empty($user->customer_token)){
                    $customer = Customer::create([
                        'email' => $request->stripeEmail,
                        'source' => $request->stripeToken,
                    ]);
                    $this->setCustomerToken($customer->id);
                }else{
                    $customer = Customer::retrieve($user->customer_token);
                }
            }

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $total * 100,
                'currency' => 'eur',
            ]);

            \Cart::destroy();

        } catch (Exception $e) {
            return $e->getMessage();
        }

        /**
         *
         * Donné acces a la data pour le client.$customer
         *
         */

        return view('shop::panier.confirmation', ['charges' => $charge, 'total' => $total]);

    }


    private function setCustomerToken($token){
        $user = User::find(Auth::user()->id);
        $user->customer_token = $token;
        $user->save();
        return $user;
    }
}
