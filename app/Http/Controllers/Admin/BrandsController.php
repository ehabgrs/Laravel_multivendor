<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\Admin\CreateBrandRequest;
use \DB;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(PAGINATION_COUNT);
		return view('admin/brands/index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brands/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {
		if(!$request->has('is_active')) {
		$request->request->add(['is_active' => 0]);
		}
		
		$brand = new Brand();
		
		if($request->has('photo')) {
			$filename = upload_file('myuploads',$request->photo);
			$brand->photo = $filename;
		}
		
		$brand->is_active = $request->is_active;
		
		$brand->name = $request->name;
		
		$brand->save();
		
		return redirect()->route('admin.brands.index')->with(['success' => 'The brand has been created successfully']);
    }

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
        $brand = Brand::find($id);
		if(!$brand) {
			return redirect()->route('admin.brands.index')->with(['error', 'This brand is not found']);
		}
		
		return view('admin/brands/edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBrandRequest $request, $id)
    {
       $brand = Brand::find($id);
	   if(!$brand) {
			return redirect()->route('admin.brands.index')->with(['error', 'This brand is not found']);
		}
		
		if(!$request->has('is_active')) {
		$request->request->add(['is_active' => 0]);
		}
		try{
			
		   DB::beginTransaction();
		   
		   if($request->has('photo')) {
				$filename = upload_file('myuploads',$request->photo);
				$brand->update(['photo' => $filename]);
		   }
			
		   $brand->update(['is_active' => $request->is_active]);
		   
		   $brand->name = $request->name;
		   
		   $brand->save();
		   
		   DB::commit();
		   
		   return redirect()->route('admin.brands.index')->with('success' , 'The brand has been updated successfully');
		} catch (\Exception $ex) {
			return redirect()->route('admin.brands.index')->with(['error', 'There is a problem']);
		}
	 
	  
	   
	   return redirect()->route('admin.brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
		if(!$brand) {
			return redirect()->route('admin.brands.index')->with(['error', 'This brand is not found']);
		}
		$brand->delete();
		
		return redirect()->route('admin.brands.index')->with('success' , 'The brand has been deleted successfully');
		
    }
}
