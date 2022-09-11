<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Productrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'				 => 'required|max:100',
			'slug' 				 => 'required|unique:products,slug|max:100',
			'description'  		 => 'required|max:500',
			'short_description'	 => 'nullable|max:200',
			'price'              => 'required|numeric|between:0,100000.999',
			'selling_price'      => 'required|numeric|between:0,100000.999',
			//use custome validation
			//'manage_stock'       => 'required|in:0,1',
			//inject any value here and add it in the construct at the rule class
			//'qty'                => [new Test($this->manage_stock)],
			'qty'                => 'nullable|numeric',
			'sku'                => 'nullable',
			//min:1 at least has one value, not empty
			'category_id'     	 => 'required|array|min:1',
			//category_id.* all the values inside the array
			'category_id.*'      => 'numeric|exists:categories,id',
			'tag_id'             => 'nullable',
			'tag_id.*'           => 'numeric',
			'brand_id'           => 'required|exists:brands,id',
        ];
    }
}
