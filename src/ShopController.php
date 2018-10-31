<?php

namespace Kjaniky\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kjaniky\Shop\Models\Product;
use Kjaniky\Shop\Models\Promotion;
use Auth;

class ShopController extends Controller
{

    public function __construc(){
        $this->middleware(['auth','web']);
    }
    public function index(){
        $products = Product::paginate(10);
        $promotions = Promotion::where('started_at','<=',\Carbon\Carbon::now())->where('finished_at','>=',\Carbon\Carbon::now())
        ->limit(4)->get();
    
        return view('shop::index',['products'=>$products,
        'promotions' => $promotions]);
    }

    public function show($slug){
        $product = Product::where('slug',$slug)->first();
        return view('shop::show',[
            'product' => $product,
        ]);
    }
}
