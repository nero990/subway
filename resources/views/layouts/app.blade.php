<!DOCTYPE HTML>
<html>
<head>
    <title>{{config("app.name")}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset("css/bootstrap.css")}}" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="{{asset("css/style.css")}}" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS -->
    <link href="{{asset("css/font-awesome.css")}}" rel="stylesheet">
    <!-- //font-awesome icons CSS -->

    <!-- side nav css file -->
    <link href='{{asset("css/SidebarNav.min.css")}}' media='all' rel='stylesheet' type='text/css'/>
    <!-- side nav css file -->

    <!-- js-->
    <script src="{{asset("js/jquery-1.11.1.min.js")}}"></script>
    <script src="{{asset("js/modernizr.custom.js")}}"></script>

    <!--webfonts-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->

    <!-- Metis Menu -->
    <script src="{{asset("js/metisMenu.min.js")}}"></script>
    <script src="{{asset("js/custom.js")}}"></script>
    <link href="{{asset("css/custom.css")}}" rel="stylesheet">
    <!--//Metis Menu -->

    @yield("styles")
</head>
<body class="cbp-spmenu-push">
<div class="main-content">
    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
        <!--left-fixed -navigation-->
        @include("layouts.partials.navigation")
    </div>
    <!--left-fixed -navigation-->

    <!-- header-starts -->
    <div class="sticky-header header-section ">
        <div class="header-left">

            <!--toggle button start-->
            <button id="showLeftPush"><i class="fa fa-bars"></i></button>
            <!--toggle button end-->
            <div class="profile_details_left"><!--notifications of menu start -->
                <ul class="nofitications-dropdown">
                    <li class="dropdown head-dpdn">
                        <a><i class="fa fa-envelope"></i></a>
                    </li>

                </ul>
                <div class="clearfix"> </div>
            </div>
            <!--notification menu end -->
            <div class="clearfix"> </div>
        </div>
        <div class="header-right">


            <div class="profile_details">
                <ul>
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            @if(auth()->user())
                            <div class="profile_img">
                                <span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
                                <div class="user-name">
                                    <p>{{auth()->user()->name}}</p>
                                    <span>{{auth()->user()->role}}</span>
                                </div>
                                <i class="fa fa-angle-down lnr"></i>
                                <i class="fa fa-angle-up lnr"></i>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li> <a href="{{route("logout")}}"><i class="fa fa-sign-out"></i> Logout</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            @yield("content")
        </div>
    </div>
    <!--footer-->
    <div class="footer">
        <p>&copy; {{date("Y")}} {{config("app.name") }} challenge. All Rights Reserved</p>
    </div>
    <!--//footer-->
</div>

<!-- side nav js -->
<script src='{{asset("js/SidebarNav.min.js")}}' type='text/javascript'></script>
<script>
    $('.sidebar-menu').SidebarNav()
</script>
<!-- //side nav js -->

<!-- Classie --><!-- for toggle left push menu script -->
<script src="{{asset("js/classie.js")}}"></script>
<script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };

    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }
</script>
<!-- //Classie --><!-- //for toggle left push menu script -->

<!--scrolling js-->
<script src="{{asset("js/jquery.nicescroll.js")}}"></script>
<script src="{{asset("js/scripts.js")}}"></script>
<!--//scrolling js-->

<!-- Bootstrap Core JavaScript -->
<script src="{{asset("js/bootstrap.js")}}"> </script>

@yield("scripts")

</body>
</html>
