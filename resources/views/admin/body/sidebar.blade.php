<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/admin/dashboard') }}">
        <div class="sidebar-brand-text mx-3">Katheay <sup>Dai</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ URL::to('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('brand') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Brands</span></a>
    </li>
    <!--Nav Item Category -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category:</h6>
                <a class="collapse-item" href="{{ route('categories') }}">Category</a>
                <a class="collapse-item" href="{{ route('subcategory') }}">Sub Category</a>
            </div>
        </div>
    </li>
    <!--Nav Item Category -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoq" aria-expanded="true"
            aria-controls="collapseTwoq">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseTwoq" class="collapse" aria-labelledby="headingTwoq" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category:</h6>
                <a class="collapse-item" href="{{ route('add.product') }}">Add Product</a>
                <a class="collapse-item" href="{{ route('all.product') }}">All Products</a>
            </div>
        </div>
    </li>
    <!--Nav Item Coupone -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('coupon') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Coupone</span></a>
    </li>
    <!--Nav Item Category -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoqq" aria-expanded="true"
            aria-controls="collapseTwoqq">
            <i class="fas fa-fw fa-cog"></i>
            <span>Orders</span>
        </a>
        <div id="collapseTwoqq" class="collapse" aria-labelledby="headingTwoqq" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Orders:</h6>
                <a class="collapse-item" href="{{ route('new.order') }}">New Order</a>
                <a class="collapse-item" href="{{ route('admin.accept.order') }}">All Accept Order</a>
                <a class="collapse-item" href="{{ route('admin.cancel.order') }}">All Cancel Order</a>
                <a class="collapse-item" href="{{ route('admin.process.order') }}">All Process Order</a>
                <a class="collapse-item" href="{{ route('admin.delivery.order') }}">All Delivered Order</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.product.stock') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Stocks</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('all.message')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>ContactUs</span></a>
    </li>
    {{-- USer --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoqaa" aria-expanded="true"
            aria-controls="collapseTwoqaa">
            <i class="fas fa-solid fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseTwoqaa" class="collapse" aria-labelledby="headingTwoqaa" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User:</h6>
                <a class="collapse-item" href="{{ route('create.admin') }}">Add User</a>
                <a class="collapse-item" href="{{ route('admin.all.user') }}">All USer</a>
            </div>
        </div>
    </li>
    {{-- USer --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwoqaaq"
            aria-expanded="true" aria-controls="collapseTwoqaaq">
            <i class="fas fa-fw fa-cog"></i>
            <span>Return Order</span>
        </a>
        <div id="collapseTwoqaaq" class="collapse" aria-labelledby="headingTwoqaaq"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Return Order:</h6>
                <a class="collapse-item" href="{{ route('admin.return.request') }}">Return</a>
                <a class="collapse-item" href="{{ route('admin.all.request') }}">All Return</a>
            </div>
        </div>
    </li>

</ul>
