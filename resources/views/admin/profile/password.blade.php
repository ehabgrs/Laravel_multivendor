@extends('admin/layouts.main')

@section('content')

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
									<a href="">Profile </a>
                                </li>
                                <li class="breadcrumb-item">
									<a href="">Change your password</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> Change your password </h4>
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
                                        <form class="form" action="{{route('profile.password.update')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
											@method('PUT')
                                            <div class="form-body">
                                               <h4 class="form-section"><i class="ft-home"></i> Change your password </h4>
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Old password</label>
                                                            <input type="password" value="" id="old_password"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="old_password">
                                                            @error("old_password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> New password</label>
                                                            <input type="password" value="" id="password"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Confirm new password</label>
                                                            <input type="password" value="" id="password_confirmation"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="password_confirmation">
                                                            @error("password_confirmation")
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
