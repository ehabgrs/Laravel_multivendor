<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\Admin\TagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(PAGINATION_COUNT);
		return view('admin/tags/index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tags/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        $tag =Tag::create(['slug' =>$request->slug]);
		$tag->name = $request->name;
		$tag->save();
		return redirect()->route('admin.tags.index')->with(['success' => 'The tag has been added successfully']);
		
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
		$tag = Tag::find($id);
		if(!$tag) {
			return redirect()->route('admin.tags.index')->with(['error' => 'This is not a valid tag']);
		}
        return view('admin/tags/edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, $id)
    {
		$tag = Tag::find($id);
		if(!$tag) {
			return redirect()->route('admin.tags.index')->with(['error' => 'This is not a valid tag']);
		}
		$tag->update(['slug' => $request->slug]);
		
		$tag->name = $request->name;
		$tag->save();
		
        return redirect()->route('admin.tags.index')->with(['success' => 'The tag has been updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
		if(!$tag) {
			return redirect()->route('admin.tags.index')->with(['error' => 'This is not a valid tag']);
		}
		$tag->delete();
		
		return redirect()->route('admin.tags.index')->with(['success' => 'The tag has been deleted successfully']);
    }
}
