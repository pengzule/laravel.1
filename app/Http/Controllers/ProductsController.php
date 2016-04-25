<?php namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller {

  public function show($id)
  {
       $product = Product::find($id);
       if(is_null($product)){
           abort(404);
       }    
	return view('pages.show')->withProduct($product);
  }

}
