<aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h2 style="color: #FFF !important; padding: 5px; font-size: 20px !important;">{{config("app.name")}} Challenge</h2>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview @yield("dashboard_active")">
                    <a href="{{route("home")}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                @if(auth()->user())
                @if(auth()->user()->is_admin)
                <li class="treeview @yield("users_active")">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li @yield("users_all_active")><a href="{{route("users.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li @yield("users_new_active")><a href="{{route("users.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview @yield("sauces_active")">
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span>Sauces</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li @yield("sauces_all_active")><a href="{{route("sauces.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li @yield("sauces_new_active")><a href="{{route("sauces.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview @yield("breads_active")">
                    <a href="#">
                        <i class="fa fa-feed"></i>
                        <span>Breads</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li @yield("breads_all_active")><a href="{{route("breads.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li @yield("breads_new_active")><a href="{{route("breads.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview @yield("sandwiches_active")">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Sandwiches</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li @yield("sandwiches_all_active")><a href="{{route("sandwiches.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li @yield("sandwiches_new_active")><a href="{{route("sandwiches.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview @yield("vegetables_active")">
                    <a href="#">
                        <i class="fa fa-bars"></i>
                        <span>Vegetables</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li @yield("vegetables_all_active")><a href="{{route("vegetables.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li @yield("vegetables_new_active")><a href="{{route("vegetables.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>

                <li class="treeview @yield("meals_active")">
                    <a href="#">
                        <i class="fa fa-cutlery"></i>
                        <span>Meal</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li @yield("meals_all_active")><a href="{{route("meals.index")}}"><i class="fa fa-angle-right"></i> All</a></li>
                        <li @yield("meals_new_active")><a href="{{route("meals.create")}}"><i class="fa fa-angle-right"></i> New</a></li>
                    </ul>
                </li>
                @endif

                <li class="treeview @yield("meal_registrations_active")">
                    <a href="{{route("meal-registrations.index")}}">
                        <i class="fa fa-shopping-cart"></i> <span>My Meal Order</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</aside>
