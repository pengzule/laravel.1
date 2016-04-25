<?php namespace App\Http\Controllers\home;

use App\Product;
use App\Http\Controllers\BaseController;
class HomeController extends BaseController {

	public function index()
	{
		$cart = app('cart');

		$wishlist = app('wishlist');

		$products = Product::paginate(20);

		return View::make('cart.products', compact('cart', 'wishlist', 'products'));
	}

}
