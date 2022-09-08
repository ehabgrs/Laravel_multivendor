{{--https://github.com/ahmedeagle/ecommerce--}}

<!-- opening tags and head-->
@include('admin/includes/header')
@yield('javascript')
{{--@notify_css--}}
@yield('style')
</head>
<!-- /////////-->



<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
	  
<!-- fixed-top nav-->
@include('admin.includes.nav')
<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- sidebar-->
@include('admin.includes.sidebar')
<!-- /////////-->


<!-- page content -->
<div class="app-content content">
	<div class="content-wrapper">
		@include('admin.includes.alerts.errors') 
		@include('admin.includes.alerts.success')
		<div class="content-body">
			@yield('content')
		</div>
	</div>
</div>
<!-- /////////-->


				
<!-- copy writes footer-->
@include('admin.includes.footer')
<!-- /////////-->

<!-- @notify_js 
@notify_render -->

<!-- js liberaries and html close tages -->
@include('admin.includes.footer2')
<!-- /////////-->