<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Requests\Admin\Productrequest;
use App\Models\Product;
use App\Models\ProductImage;
use DB;
use App\Http\Requests\Admin\ProductPriceRequest;
use App\Http\Requests\Admin\ProductImageRequest;
use Illuminate\Support\Facades\File; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = Product::get();
        return view('admin/products/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands'] = Brand::active() -> select('id')->get();
		$data['tags']   = Tag::select('id')->get();
		$data['categories'] = Category::active()->select('id')->get();
		return view('admin/products/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Productrequest $request)
    {
		//set is active 0 if false ///AdminCommon model
		$request = Product::is_active($request);
		
		DB::beginTransaction();
		
        $product = Product::create([
			'slug' 			=> $request->slug,
			'brand_id' 		=> $request->brand_id,
			'is_active'		=> $request->is_active,
			'price'     	=> $request->price,
			'selling_price' => $request->selling_price,
			'sku'           => $request->sku,
			'qty'           => $request->qty,
		]);
		
		//translation
		$product->name = $request->name;
		$product->description = $request->description;
		$product->short_description = $request->short_description;
		$product->save();
		
		//attach take array
		$product->categories()->attach($request->category_id);
		if($request->tag_id) {
			$product->tags()->attach($request->tag_id);
		}
		
		DB::commit();
		
		return redirect()->route('admin.products.index');
    }
	
	
	public function edit_price($id)
	{
		$product = Product::find($id);
		
		if(!$product){
			return redirect()->route('admin.products.index')->with(['error' => 'This product is not available in the database']);
		}
		
		return view('admin/products/edit_price',compact('product'));
	}
	
	
	public function update_price(ProductPriceRequest $request, $id)
	{
		$product = Product::find($id);
		
		if(!$product){
			return redirect()->route('admin.products.index')->with(['error' => 'This product is not available in the database']);
		}
		Product::whereId($id)->update($request->except(['_token','_method']));
		
		return redirect()->route('admin.products.index');
	}
	
	
	//add multi photos by dropzone
	public function add_photos($id)
	{
		$product = Product::find($id);
		
		if(!$product){
			return redirect()->route('admin.products.index')->with(['error' => 'This product is not available in the database']);
		}
		return view('admin/products/add_photos',compact('product'));
	}
	
	
	public function receive_dropzone_photos(Request $request)
	{
		$file = $request->file('dzfile');
		$file_name = upload_file('products',$file);
		return response()->json([
			'name' => $file_name,
			'original_name' => $file->getClientOriginalName(),
		]);
		
	}
	
	public function remove_dropzone_photo(Request $request)
	{
		$file = public_path('assets/admin/uploads/products/'.$request->name);

		if(file_exists($file)) {
			if (File::delete($file)){
				return response()->json([
				'message' => 'deleted',
				]);
			}	
		}
	}
	
	
	public function store_photos($id, ProductImageRequest $request)
	{
		$product = Product::find($id);
		
		if(!$product){
			return redirect()->route('admin.products.index')->with(['error' => 'This product is not available in the database']);
		}
		
		if($request->has('document') && count($request->document) > 0) {
			foreach($request->document as $image) {
				ProductImage::create([
					'product_id' => $id,
					'photo'      => $image,
				]);
			}
			return redirect()->route('admin.products.index')->with(['success' => 'Photos have been added successfully']);
		}
		
		return redirect()->route('admin.products.index');
		
	}
	///////////end add photos
	
	
	
	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
