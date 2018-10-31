<?php

namespace Kjaniky\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Auth;
use Kjaniky\Shop\Models\Product;
class PanierController extends Controller
{


    public function __construc(){
        $this->middleware(['auth','web']);
    }
    public function index(){

        $panier = Cart::content(); 
        $total = Cart::total();
        
    
        return view('shop::panier.index',['panier'=>$panier,'total'=>$total]);
    }

    public function add($slug,$qte=1){
        $product = Product::where('slug',$slug)->first();
        $panier = Cart::content(); 
        $exist = false;
        foreach($panier as $p){
            $tmp[] = $p->id;
        }

        if(!in_array($product->id,$tmp)){
            $d = Cart::add($product->id,$product->name,$qte,$product->price());
        }


        return redirect()->route('shop.panier');
    }

    public function remove($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function validation(){
        $panier = Cart::content(); 
        $total = Cart::total();
        return view('shop::panier.valider',['panier'=>$panier,'total'=>$total]);
    }

    public function payer(){
        $total = Cart::total();

        return view('shop::panier.payer',['total' => $total]);
    }

   
}
