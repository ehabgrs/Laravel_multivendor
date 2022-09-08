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
									<a href="">Edit price</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> Product price edit   </h4>
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
                                        <form class="form" action="{{route('admin.products.update_price', $product -> id )}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
											@method('PUT')
                                            <div class="form-body">
                                               <h4 class="form-section"><i class="ft-home"></i> Edit {{$product->name}} price </h4>
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Price </label>
                                                            <input type="number" step="0.0001" value="{{$product->price}}" id="price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="price" />
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
                                                            <input type="number" step="0.0001" value="{{$product->selling_price}}"
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
                                                            <label for="projectinput1"> Special price </label>
                                                            <input type="number" step="0.0001" value="{{$product->special_price}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="special_price" />
                                                            @error("special_price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												
												<div class="row">
													<div class="col-md-6" >
														<div class="form-group" id="select_parent">
															<label for="brand_id"> Special price type</label>
															<select name="special_price_type"   class="select2 form-control">
																<optgroup label="Select parent category">
																	<option value = 'amount'> Amount </option>
																	<option value = 'percent'> Percent </option>
																</optgroup>
															</select>
															 @error("special_price_type")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
														</div>
													</div>
												</div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Offer start date</label>
                                                            <input type="date" value="{{$product->special_price_start}}"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="special_price_start" />
                                                            @error("special_price_start")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Offer end date</label>
                                                            <input type="date" value="{{$product->special_price_end ? $product->special_price_end : date('Y-m-d') }}"
                                                                   class="form-control"
                                                                   placeholder=""
                                                                   name="special_price_end" />
                                                            @error("special_price_end")
                                                            <span class="text-danger">{{$message}}</span>
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
