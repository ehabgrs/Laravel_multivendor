<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class WishlistController extends Controller
{
	public function index()
	{
		$data['products'] = auth()->user()->wishlist()->latest()->get();
		return view('front/wishlist',$data);
	}
	
    public function store(Request $request)
	{
		$product_id = $request->product_id;
		if(auth()->user()->product_exists_in_wishlist($product_id)){
			auth()->user()->wishlist()->detach($product_id);
			return response()->json(['message'=>'The item has been removed from the wishlist']);
		} else {
			auth()->user()->wishlist()->attach($product_id);
			return response()->json(['message'=>'The item has been added to the wishlist']);
		}
	}
	
	public function destroy(Request $request)
	{
		$product_id = $request->product_id;
		if(auth()->user()->product_exists_in_wishlist($product_id)){
			auth()->user()->wishlist()->detach($product_id);
			return response()->json(['message'=>'The item has been removed from the wishlist']);
		}
	}
}
