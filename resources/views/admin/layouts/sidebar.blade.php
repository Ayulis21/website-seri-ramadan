<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.product.index') }}" class="waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-products">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.order.index') }}" class="waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span key="t-orders">Orders</span>
                    </a>
                </li>

                <li class="menu-title" key="t-apps">Setting</li>

                <li>
                    <a href="{{ route('admin.landingPage.index') }}" class="waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span key="t-landing-pages">Landing Page</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>