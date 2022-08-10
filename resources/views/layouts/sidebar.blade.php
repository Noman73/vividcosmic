<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('storage/logo/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VIVID COSMIC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info ">
                <a href="#" class="d-block"><i class="fas fa-circle text-success"></i> {{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ URL::to('/dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/fuser') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('admin/fuser_list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Packages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/packages') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Add Packages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/all_packages') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Packages List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Withdraw
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/withdraw_pending') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Pending Request</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/withdraw_transaction') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Transaction List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Balance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/balance') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('send.share.balance') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Send Share Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('send.founder.balance') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Send Founder Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/balance_all') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Transaction List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/add_product') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Add Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/product_list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Products List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Orphan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/orphan') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Add Orphan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/orphan_list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Orphan List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Stockiest
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/stockiest') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Add Stockiest</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::to('/admin/stockiest_list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Stockiest List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void()" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sales
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('weekly.sales') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Weekly Sales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('monthly.sales') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Monthly Sales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('yearly.sales') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Yearly Sales</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void()" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Share Balance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.share.balance') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Active Share Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sharebalance.list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Share Balance List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void()" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Founders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.founder.balance') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Active Founder Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('founders.list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Founder Balance List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ URL::to('/admin/upgrade') }}" class="nav-link">
                        <i class="nav-icon fas fa-level-up-alt"></i>
                        <p>
                            Upgrade
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
