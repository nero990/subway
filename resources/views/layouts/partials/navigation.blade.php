<aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="index.html">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->is_admin)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route("users.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li><a href="{{route("users.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span>Sauces</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route("sauces.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li><a href="{{route("sauces.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-feed"></i>
                        <span>Breads</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route("breads.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li><a href="{{route("breads.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Sandwiches</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route("sandwiches.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li><a href="{{route("sandwiches.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Vegetables</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route("vegetables.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li><a href="{{route("vegetables.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="index.html">
                        <i class="fa fa-feed"></i> <span>Meals</span>
                    </a>
                </li>
                @endif

                <li class="treeview">
                    <a href="index.html">
                        <i class="fa fa-shopping-cart"></i> <span>My Orders</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
