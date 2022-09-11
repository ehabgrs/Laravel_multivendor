<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Basket\Basket;
use App\Models\Product;

class CartController extends Controller
{
	protected $basket;
	
	public function __construct(Basket $basket)
	{
		$this->basket = $basket;
	}
	
    public function index()
	{
		$basket = $this->basket;
		return view('front/cart/index', compact('basket'));
	}
	
	public function add(Request $request)
	{
		$product_id = $request -> product_id ;
		
        $product = Product::where('id', $product_id)->firstOrFail();

        try {
            $this->basket->add($product, $request->quantity ?? 1);
        } catch (QuantityExceededException $e) {
            return 'Quantity Exceeded'; 
        }

		return response()->json(['message' => 'Product added successfully to the card ']); 
	}
	
	
	public function update(Request $request)
    {
        $product = Product::where('id', $request->product_id)->firstOrFail();

        try {
            $this->basket->update($product, $request->quantity);
        } catch (QuantityExceededException $e) {
            return 'Quantity Exceeded';
        }


        return 'Cart updated successfully';
    }
	
}
