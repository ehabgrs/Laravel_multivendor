<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function index($slug)
	{
		$this->data['category'] =  Category::where('slug', $slug)->select()->first();
		
		if(!$this->data['category']) {
			return redirect()->route('home');
		}
		$this->data['products'] = $this->data['category']->products;

		return view('front.products',$this->data);
	}
}
