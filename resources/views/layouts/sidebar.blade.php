<!-- Brand Logo -->
<a href="index3.html" class="brand-link">

    <img src="/palm-oil.png" alt="AdminLTE Logo" class="brand-image " style="opacity: ">
    <span class="brand-text font-weight-bold">Putra Makmur</span>

</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        Master
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.master.customer.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Customer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.master.supplier.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Supplier</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.master.armada.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Armada</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.master.supir.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Supir</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>
                        Transaksi
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                                Kontrak
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.transaksi.kontrakbeli.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kontrak Beli</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.transaksi.kontrakjual.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kontrak Jual</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.transaksi.muatbongkar.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Muat Bongkar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Laporan</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
