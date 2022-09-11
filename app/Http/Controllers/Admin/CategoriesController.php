<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Traits\CategoriesTrait;

class CategoriesController extends Controller
{
	use CategoriesTrait;
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//PAGINATION_COUNT defined at general file inside helper 
        $categories = Category::parent()->paginate(PAGINATION_COUNT);
		return view('admin/categories/index',compact('categories'));
    }
	
	public function subcategories_index()
    {
		//PAGINATION_COUNT defined at general file inside helper 
        $data['categories'] = Category::child()->paginate(PAGINATION_COUNT);
		$data['key'] = 'subcategories';
		return view('admin/categories/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getParentForDropdown();
        
        return view('admin/categories/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
		if(!$request->has('is_active')) {
		$request->request->add(['is_active' => 0]);
		}
		
		$category = Category::create(['slug' => $request->slug, 'is_active' => $request->is_active,'parent_id' => $request->parent_id]);
		//if we added name with update , not updated //TODO
		$category->name = $request->name;
		$category->save();
		
		//redirect depend on sub or main category
		$key = $request->parent_id == null ? true : false;
		return $this->redirectMainOrSub($key,'This category has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);
		
		if(!$data['category']){
			return redirect()->route('admin.categories.index')->with(['error' => 'This category is not found']);
		}
       
        $data['dropdownCategories'] = $this->getParentForDropdown($id);
		$data['key'] = $data['category']->parent_id;
		
		return view('admin/categories/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
		$category = Category::find($id);
		
		if(!$category) {
			return redirect()->route('admin.categories')->with(['error' => 'This category is not found']);
		}
		
		if(!$request->has('is_active')) {
			$request->request->add(['is_active' => 0]);
		}
		
		$category->update(['slug' => $request->slug, 'is_active' => $request->is_active , 'parent_id' => $request->parent_id]);
		
		//update the translation
		$category->name = $request->name;
		$category->save();
		
		//redirect depend on sub or main category
		$key = $request->parent_id == null ? true : false;
		return Category::redirectMainOrSub($key,'This category has been updated successfully');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$category = Category::find($id);
		
		if(!$category){
			return redirect()->route('admin.categories.index')->with(['error' => 'This category is not found']);
		}
		
		$category->delete();
		
		$key = $category->parent_id == null ? true : false;
		return Category::redirectMainOrSub($key,'The category has been deleted successfully');
		
    }
}
