<!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                             <li class="{{ request()->is('admin/product/*') ? 'mm-active' : '' }}">
                                <a href="javascript: void(0);" class="has-arrow waves-effect " >
                                    <i class="bx bx-package"></i>
                                    <span key="t-ui-elements">Product</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.product.import') }}" key="t-light-sidebar" class="{{ request()->is('admin/product/import-product') ? 'active' : '' }}">import Product</a></li>
                                    <li><a href="{{ route('admin.product.index') }}" key="t-compact-sidebar" class="{{ (request()->is('admin/product/list') || request()->is('admin/product/edit/*') || request()->is('admin/product/detail/*')) ? 'active' : '' }}">List Product</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->