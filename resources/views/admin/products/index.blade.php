@extends('admin/layouts.main')

@section('content')
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> Products </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}"> Home </a>
                                </li>
                                <li class="breadcrumb-item active"> Products
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
                                    <h4 class="card-title">Products </h4>
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
													<th>Name</th>
													<th>Description </th>
													<th>Price</th>
													<th>Sell price</th>
													<th>Is active </th>
													<th>Control</th>
												</tr>
                                            </thead>
                                            <tbody>

                                            @isset($products)
                                                @foreach($products as $product)
                                                    <tr>
                                                        <td>{{$product -> id}}</td>
                                                        <td>{{$product -> name}}</td>
														<td>{{$product -> description}}</td>
														<td>{{$product -> price}}</td>
														<td>{{$product -> selling_price}}</td>
                                                        <td>{{$product->get_active()}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.products.edit',$product -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
																   
																<a href="{{route('admin.products.edit_price',$product -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit price</a>
																   
																<a href="{{route('admin.products.add.photos',$product -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Photos</a>

																<form action="{{route('admin.products.destroy',$product -> id)}}" method="POST">
																	<input name="_method" type="hidden" value="DELETE" />
																	{{ csrf_field() }}
																	<input type="submit" value="Delete"
																	class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
																</form>

                                                            

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
					{{-- if we used laravel pagination $products->links() --}}
                </section>
            </div>
        
@endsection