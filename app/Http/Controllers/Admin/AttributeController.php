<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Http\Requests\Admin\AttribueRequest;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::get();
		return view('admin/attributes/index',compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/attributes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttribueRequest $request)
    {
        $attribute = new Attribute();
		
		$attribute->name = $request->name;
		
		$attribute->save();
		
		return redirect()->route('admin.attributes.index')->with(['success' => 'This attribute has been created successfully']);
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
        $attribute = Attribute::find($id);
		if(!$attribute){
			return redirect()->route('admin.attributes.index')->with(['error' => 'This attribute is not available']); 
		}
		
		return view('admin/attributes/edit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttribueRequest $request, $id)
    {
		$attribute = Attribute::find($id);
		if(!$attribute){
			return redirect()->route('admin.attributes.index')->with(['error' => 'This attribute is not available']); 
		}
		
		$attribute->name = $request->name;
		
		$attribute->save();
		
		return redirect()->route('admin.attributes.index')->with(['success' => 'The attribute has been updated successfully']);
        
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
