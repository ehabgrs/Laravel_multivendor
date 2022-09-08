@extends('admin/layouts.main')

@section('content')
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> @if(isset($key) && $key== 'subcategories') Subcategories @else  Main Categories @endif </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"> @if(isset($key) && $key == 'subcategories') Subcategories @else  Main Categories @endif
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">@if(isset($key) && $key == 'subcategories') Subcategories @else  Main Categories @endif </h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
												<tr>
													<th>Id</th>
													<th> Slug</th>
													<th>Name</th>
													<th>Is active </th>
													@if(isset($key) && $key== 'subcategories') <th>Parent </th> @endif
													<th>Control</th>
												</tr>
                                            </thead>
                                            <tbody>

                                            @isset($categories)
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category -> id}}</td>
                                                        <td>{{$category -> slug}}</td>
                                                        <td> {{$category -> name}}</td>
                                                        <td> {{$category->get_active()}}</td>
														@if(isset($key) && $key== 'subcategories') <td> {{$category -> _parent->name}} </td> @endif
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.categories.edit',$category -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>

																<form action="{{route('admin.categories.destroy',$category -> id)}}" method="POST">
																	<input name="_method" type="hidden" value="DELETE" />
																	{{ csrf_field() }}
																	<input type="submit" value="Delete"
																	class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
																</form>

                                                                <a href="" class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">Activate</a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        
@endsection