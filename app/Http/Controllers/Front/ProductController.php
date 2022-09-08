<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($slug) 
	{
		$product =  Product::where('slug', $slug)->select()->first();
		
		if(!$product) {
			return redirect()->route('home');
		}
		$product_categories_ids = $product->categories->pluck('id'); //The pluck method retrieves all of the values for a given key
		$this->data['related_products'] = Product::where('id','!=',$product->id)->whereHas('categories',function($q) use($product_categories_ids) {
			$q->whereIn('category_id',$product_categories_ids);
		})->limit(20)->latest()->get();
		
		$this->data['product'] = $product;
		
		return view('front.product_details',$this->data);
	}
}
