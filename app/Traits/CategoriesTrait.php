<?php
namespace App\Traits;
use App\Models\Category;

trait CategoriesTrait
{
    public function getParentForDropdown($id = null)
    {
        return Category::whereNull('parent_id')->where('id', '!=', $id)->get();
    }
    
	public function redirectMainOrSub($key,$message)
	{
		if($key == true) {
			return redirect()->route('admin.categories.index')->with(['success' => $message]);
		} else {
			return redirect()->route('admin.categories.subcategories_index')->with(['success' => $message]);
		}
	}
	
	
}