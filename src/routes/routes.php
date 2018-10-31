<?php

Route::group(['middleware' => 'web'],function(){

  Route::get('/','Kjaniky\Shop\ShopController@index');
  Route::get('/home','Kjaniky\Shop\ShopController@index')->name('home');
  
  Route::get('shop/single/{slug}','Kjaniky\Shop\ShopController@show')->name('shop.single.show');
  
  Route::get('shop/panier','Kjaniky\Shop\PanierController@index')->name('shop.panier');
  Route::get('shop/panier/{slug}/add','Kjaniky\Shop\PanierController@add')->name('shop.addtopanier');
  
  Route::get('shop/panier/remove/{rowId}','Kjaniky\Shop\PanierController@remove')->name('shop.removetopanier');
  

  Route::get('shop/panier/validation','Kjaniky\Shop\PanierController@validation')->name('shop.validation');

  Route::get('shop/panier/payer','Kjaniky\Shop\PanierController@payer')->name('shop.payer');


  Route::group(['middleware' => ['auth'] ],function(){
    Route::post('shop/paiement/stripe','Kjaniky\Shop\PaiementController@checkoutStripe')->name('shop.stripe');

  });

});
