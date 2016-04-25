<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {

	public function run()
	{       
		DB::table('carts')->truncate();
		DB::table('carts_items')->truncate();
		DB::table('products')->truncate();

		$faker = Faker\Factory::create();
		$lorem = new Faker\Provider\Lorem($faker);
		$random = new Faker\Provider\Base($faker);

		for ($i=0; $i < 20; $i++)
		{
			$name = $lorem->word();

			$product = new Product;
			$product->slug  = ucfirst($name);
			$product->name  = ucfirst($name);
			$product->price = $random->randomNumber(3);
			$product->save();
		}
	}

}
