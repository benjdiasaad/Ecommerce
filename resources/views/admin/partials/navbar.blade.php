<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/admin/dashboard">
            <span class="align-middle">BENJDIA Saad</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="/admin/dashboard">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('admin/category') ? 'active' : '' }}">
                <a class="sidebar-link" href="/admin/category">
                    <i class="align-middle" data-feather="menu"></i> <span
                        class="align-middle">Categorie</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is('admin/product') ? 'active' : '' }}">
                <a class="sidebar-link" href="/admin/product">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Product</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admin/message') ? 'active' : '' }}">
                <a class="sidebar-link" href="/admin/message">
                    <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Messages</span>
                </a>
            </li>

        </ul>

    </div>
</nav>