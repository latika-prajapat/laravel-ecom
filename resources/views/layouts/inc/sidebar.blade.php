<div class="sidenav-header">
    {{-- <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
    <span class="ms-1 font-weight-bold text-white">E-commerce</span>
    </a>
</div>
<hr class="horizontal light mt-0 mb-2">
<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">

        {{-- <li class="nav-item">
            <a class="nav-link text-white " href="{{route('index') }}">

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>

                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold {{ Request::is('categories*') ? 'active bg-gradient-primary' : '' }}"
                href="{{ route('categories.index') }}">
                <span class="nav-link-text ms-1">CATEGORIES</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold {{ Request::is('users*') ? 'active bg-gradient-primary' : '' }}"
                href="{{ route('users.index') }}">
                <span class="nav-link-text ms-1">USERS</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold {{ Request::is('products*') ? 'active bg-gradient-primary' : '' }}"
                href="{{ route('products.index') }}">
                <span class="nav-link-text ms-1">PRODUCTS</span>
            </a>
        </li>
     
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold {{ Request::is('banners*') ? 'active bg-gradient-primary' : '' }}"
                href="{{ route('banners.index') }}">
                <span class="nav-link-text ms-1">BANNERS</span>
            </a>
        </li>
    </ul>
</div>

</div>
