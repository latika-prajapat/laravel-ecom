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
      
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold {{ Request::is('categories*') ? 'active bg-gradient-primary' : '' }}" href="{{ route('categories.index')}}">
                <span class="nav-link-text ms-1">CATEGORIES</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white font-weight-bold {{ Request::is('users*') ? 'active bg-gradient-primary' : '' }}" href="{{ route('users.index')}}">
                <span class="nav-link-text ms-1">USERS</span>
            </a>
        </li>
    </ul>
</div>

</div>
