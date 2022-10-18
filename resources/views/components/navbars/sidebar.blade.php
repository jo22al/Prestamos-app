<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">

        <div class="container">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">

                <div class="row align-items-start">

                    <div class="col">
                        {{-- <span class="ms-2 font-weight-bold text-white">Prestamos App</span> --}}
                        <img src="{{ asset('assets') }}/img/logo-ct.jpg" width="130" height="50" alt="main_logo">
                    </div>
                </div>
        </div>

        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Usuario</h6>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-profile' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'usuarios' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('usuarios') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">supervisor_account</i>
                    </div>
                    <span class="nav-link-text ms-1">Gestión de usuarios</span>
                </a>
            </li>
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pages</h6>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'clientes' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('clientes') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">group_add</i>
                    </div>
                    <span class="nav-link-text ms-1">Clientes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'prestamos' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('prestamos') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">local_atm</i>
                    </div>
                    <span class="nav-link-text ms-1">Prestamos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'cuotas' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('cuotas') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">credit_card</i>
                    </div>
                    <span class="nav-link-text ms-1">Cuotas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'pagos' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('pagos') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">local_atm</i>
                    </div>
                    <span class="nav-link-text ms-1">Pagos</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
