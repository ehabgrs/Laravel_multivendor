@include('front.includes.header')

<main id="main-site" class="displayhomenovthree">

    <header id="header" class="header-3 sticky-menu">
        @include('front.includes.header_mobile')
        @include('front.includes.header_top')
        @include('front.includes.header_center')
        @include('front.includes.header_bottom')
    </header>
    
    @include('front.includes.header_sticky')
    
    <aside id="notifications">
        <div class="container">

        </div>
    </aside>


    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
              @yield('content')
        </div>
    </div>

    @include('front.includes.footer')
    
    <div class="canvas-overlay"></div>
    <div id="back-top">
        <span>
            <i class="fa fa-long-arrow-up"></i>  
        </span>
    </div>
</main>
@yield('scripts')

@include('front.includes.footer_end')