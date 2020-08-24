<!DOCTYPE html>
<html>
<head>
    @include('layouts.links')
</head>
<body oncontextmenu="return false;">    
    <div class="wrapper">   
       @include('layouts.header')
        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            @include('layouts.profil_gauch')
                            <div class="col-lg-9 col-md-6 no-pd">
                                <div class="main-ws-sec">
                                    
                                    @yield('content')
                                </div><!--main-ws-sec end-->
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div> 
            </div>
        </main>
    </div><!--theme-layout end-->

<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
                @include('flashy::message')
<script type="text/javascript" src="{{ asset('assets/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>

</body>

<!-- Mirrored from gambolthemes.net/workwise-new/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 13:12:43 GMT -->
</html>