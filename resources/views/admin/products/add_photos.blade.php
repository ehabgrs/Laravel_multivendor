@extends('admin/layouts.main')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/file-uploaders/dropzone.css')}}">

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
									<a href="">Add photos</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> Add photos to {{$product->name}}  </h4>
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
                                        <form class="form" action="{{route('admin.products.store.photos',$product->id)}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                               <h4 class="form-section"><i class="ft-home"></i> Add photos</h4>
												<div class="form-group">
													<div id="dpz-multiple-files" class="dropzone dropzone-area">
														<div class="dz-message">Add your photos</div>
													</div>
													<br><br>
												</div> 
											    <div class="photo_append"></div>
											
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
<script src="{{asset('assets/admin/vendors/js/extensions/dropzone.min.js')}}" type="text/javascript"></script>

@section('script')
    <script>
	
            var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", // The name that will be used to transfer the file
                //autoProcessQueue: false,
                maxFilesize: 5, // MB
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictFallbackMessage: "Your browser has a problem to use dropzone",
                dictInvalidFileType: "This file types not supported ",
                dictCancelUpload: "Cancel upload",
                dictCancelUploadConfirmation: "Are you sure of cancel?",
                dictRemoveFile: "Delete picture",
                dictMaxFilesExceeded: "Number of files to be uploaded is exceeded",
                headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}"
                }
                ,
                url: "{{ route('admin.products.receive_dropzone.photos') }}", // Set the url
                success:
                    function (file, response) {
                        $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    }
                ,
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else { 
                        name = uploadedDocumentMap[file.name]
                    }
                    $('form').find('input[name="document[]"][value="' + name + '"]').remove();
					
					$.ajax({
						type : 'post',
						url    : "{{ route('admin.products.remove_dropzone.photo')}}",
						data   :  {
							"name" : name,
							"_token": "{{ csrf_token() }}",
						},
						success:  function(data){
							console.log(data);
						},
					});
                }
                ,
                //previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
                init: function () {
                        @if(isset($event) && $event->document)
                    var files =
                    {!! json_encode($event->document) !!}
                        for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                    @endif
                }
            }
    </script>
@endsection