{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/home">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/kategori">
                    <span data-feather="file"></span>
                    Kategori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/pelanggan">
                    <span data-feather="users"></span>
                    Pelanggan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/toko">
                    <span data-feather="users"></span>
                    Penjual
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span data-feather="bar-chart-2"></span>
                    Logistic Provider
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <span data-feather="layers"></span>
                    Backup Data
                </a>
            </li>
        </ul>
    </div>
</nav> --}}
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/admin/home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-speedometer2"
            viewBox="0 0 16 16">
            <path
                d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
            <path fill-rule="evenodd"
                d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
        </svg>
        <span class="fs-4"> Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/admin/home" class="nav-link text-white {{ Request::is('admin/home*') ? 'active' : '' }}"
                aria-current="page">
                <i class="bi bi-house-door-fill"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/admmotor" class="nav-link text-white {{ Request::is('admin/admmotor*') ? 'active' : '' }}">
                <i class="bi bi-bicycle"></i>
                Merk Motor
            </a>
        </li>
        <li>
            <a href="/admin/kategori" class="nav-link text-white {{ Request::is('admin/kategori*') ? 'active' : '' }}">
                <i class="bi bi-bookmarks"></i>
                Kategori
            </a>
        </li>
        <li>
            <a href="/admin/sukucadang"
                class="nav-link text-white {{ Request::is('admin/sukucadang*') ? 'active' : '' }}">
                <i class="bi bi-bookmarks-fill"></i>
                Kategori Sukucadang
            </a>
        </li>
        <li>
            <a href="/admin/produk" class="nav-link text-white {{ Request::is('admin/produk*') ? 'active' : '' }}">
                <i class="bi bi-bezier2"></i>
                Produk
            </a>
        </li>
        <li>
            <a href="/admin/pelanggan"
                class="nav-link text-white {{ Request::is('admin/pelanggan*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                Pelanggan
            </a>
        </li>
        <li>
            <a href="/admin/toko" class="nav-link text-white {{ Request::is('admin/toko*') ? 'active' : '' }}">
                <i class="bi bi-shop"></i>
                Toko
            </a>
        </li>
        <li>
            <a href="/admin/admchat" class="nav-link text-white {{ Request::is('admin/admchat*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                Chat
            </a>
        </li>

        {{-- <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-archive"></i>
                Back Up Data
            </a>
        </li> --}}
    </ul>
    <hr>
    {{-- <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div> --}}
</div>
