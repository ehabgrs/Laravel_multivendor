@extends('admin/layouts.main')

@section('content')

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
									<a href="">Products </a>
                                </li>
                                <li class="breadcrumb-item">
									<a href="">Create product</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> Create product   </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.products.store')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                               <h4 class="form-section"><i class="ft-home"></i> Create a new product </h4>
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Name </label>
                                                            <input type="text" value="{{old('name')}}" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="name" />
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												 <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Slug </label>
                                                            <input type="text" value="{{old('name')}}" id="slug"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="slug" />
                                                            @error("slug")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Description </label>
                                                            <input type="text" value="{{old('description')}}" id="description"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="description" />
                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Short description </label>
                                                            <input type="text" value="{{old('short_description')}}" id="short_description"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="short_description" />
                                                            @error("short_description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Price </label>
                                                            <input type="number" value="{{old('price')}}" id="price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="price" step=0.01/>
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Sell price </label>
                                                            <input type="number" step=0.01 value="{{old('selling_price')}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="selling_price" />
                                                            @error("selling_price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Product code </label>
                                                            <input type="text" step=0.01 value="{{old('sku')}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="sku" />
                                                            @error("sku")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Quantity</label>
                                                            <input type="number"  value="{{old('qty')}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="qty" />
                                                            @error("qty")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												
												
												<div class="row">
													<div class="col-md-6" >
														<div class="form-group" id="select_parent">
															<label for="parent_id"> Category</label>
															<select name="category_id[]" id="category_id" class="select2 form-control" multiple>
																<optgroup label="Select parent category">
																	@if($categories && $categories -> count() > 0)
																		@foreach($categories as $category)
																			<option value="{{$category -> id }}">
																				{{$category -> name}}
																			</option>
																		@endforeach
																	@endif
																</optgroup>
															</select>
															@error('category_id')
															<span class="text-danger"> {{$message}}</span>
															@enderror
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-6" >
														<div class="form-group" id="select_parent">
															<label for="tag_id"> Tag</label>
															<select name="tag_id[]" id="tag_id" class="select2 form-control" multiple>
																<optgroup label="Select parent category">
																	@if($tags && $tags -> count() > 0)
																		@foreach($tags as $tag)
																			<option value="{{$tag -> id }}">
																				{{$tag -> name}}
																			</option>
																		@endforeach
																	@endif
																</optgroup>
															</select>
															@error('tag_id')
															<span class="text-danger"> {{$message}}</span>
															@enderror
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-6" >
														<div class="form-group" id="select_parent">
															<label for="brand_id"> Brand</label>
															<select name="brand_id" id="brand_id" class="select2 form-control">
																<optgroup label="Select parent category">
																	@if($brands && $brands -> count() > 0)
																		@foreach($brands as $brand)
																			<option value="{{$brand -> id }}">
																				{{$brand -> name}}
																			</option>
																		@endforeach
																	@endif
																</optgroup>
															</select>
															@error('brand_id')
															<span class="text-danger"> {{$message}}</span>
															@enderror
														</div>
													</div>
												</div>
												
												
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="is_active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
																   @if(old('is_active') == 1) checked @endif
																   >
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1"> Active </label>

                                                            @error("is_active")
                                                            <span class="text-danger"> </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                            onclick="history.back();">
                                                        <i class="ft-x"></i> Return
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> Save
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
									</div>                                    
								</div>
                            </div>
						</div>
					</div>
                </section>
                <!-- // Basic form layout section end -->
            </div>

@endsection

