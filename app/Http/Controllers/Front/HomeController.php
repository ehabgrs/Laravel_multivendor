<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$categories = Category::parent()->select('id','slug')->with(['childrens' => function($q){
			$q->select('id','parent_id','slug');
			$q->with(['childrens' => function($q){
				$q->select('id','parent_id','slug');
			}]);
		}])->get();
		
        return view('front/home',compact('categories'));
    }
}
