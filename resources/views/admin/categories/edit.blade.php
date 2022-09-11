@extends('admin/layouts.main')

@section('content')

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
									<a href="">Categories </a>
                                </li>
                                <li class="breadcrumb-item">
									<a href="">Edit category</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> Category edit   </h4>
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
                                        <form class="form" action="{{route('admin.categories.update', $category -> id )}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
											@method('PUT')
											<input type="hidden" name="id" value="{{$category->id}}" />
                                            <div class="form-body">
                                               <h4 class="form-section"><i class="ft-home"></i> Edit Category </h4>
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Name </label>
                                                            <input type="text" value="{{$category->name}}" id="name"
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
                                                            <input type="text" value="{{$category -> slug}}" id="slug"
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
															<label for="projectinput2"> Has Parent?</label>
															<select id="has_parent" class="select2 form-control">
																<optgroup label="Select parent category">
																	<option value="1">No</option>
																	<option @if($key) selected @endif value="2">Yes</option>
																</optgroup>
															</select>
															@error('has_parent')
															<span class="text-danger"> {{$message}}</span>
															@enderror
														</div>
													</div>
                                                </div>
												<div class="row" >
													<div class="col-md-6" >
														<div class="form-group" id="select_parent"  @if(!$key) style="display:none" @endif>
															<label for="projectinput2">Parent</label>
															<select name="parent_id" id="parent_id" class="select2 form-control">
																<optgroup label="Select parent category">
																	@if($dropdownCategories && $dropdownCategories -> count() > 0)
																		@foreach($dropdownCategories as $dropdownCategory)
																			<option value="{{$dropdownCategory -> id }}" @if( $dropdownCategory -> id == $category-> parent_id) selected @endif >
																				{{$dropdownCategory -> name}}
																			</option>
																		@endforeach
																	@endif
																</optgroup>
															</select>
															@error('parent_id')
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
                                                                   @if($category->is_active == 1) checked @endif />
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('javascript')
<script>
$(document).ready(function(){
	@if(!$key) $('#parent_id').val(''); @endif
	$('#has_parent').on('change', function() {
	  if(this.value == 2){
		  $('#select_parent').fadeIn();
	  };
	  if(this.value == 1){
		  $('#parent_id option:selected').val('');
		  $('#select_parent').fadeOut();
		 
	  };
	});
});
</script>
@endsection
