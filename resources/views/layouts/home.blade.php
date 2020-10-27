<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <script
        src="https://kit.fontawesome.com/66ea7a0dc7.js"
        crossorigin="anonymous"
    ></script>
    <style>
        body {
            background-image: url("{{ asset('css/itb_art.jpg') }}");
        }
        .bg-not-dark {
            background-color: transparent;
            backdrop-filter: blur(16px);
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <img src="{{ asset('img/logo-text.png') }}" alt="" />
        </div>
        <div class="list-group list-group-flush">
            <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light"
            ><b>Dashboard</b></a
            >
            <a href="{{ route('home.profile') }}" class="list-group-item list-group-item-action bg-light"
            ><b>Profil</b></a
            >
            <a href="{{ route('home.ketang') }}" class="list-group-item list-group-item-action bg-light"
            ><b>Profil Ketang</b></a
            >
            <a href="{{ route('home.token') }}" class="list-group-item list-group-item-action bg-light"
            ><b>Token</b></a
            >
            <a href="{{ route('home.vote') }}" class="list-group-item list-group-item-action bg-light"
            ><b>Voting</b></a
            >
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav
            class="navbar navbar-expand-lg navbar-dark bg-not-dark border-bottom text-white"
        >
            <button class="btn btn-primary" id="menu-toggle">Menu</button>

            <button
                class="navbar-toggler bg-dark"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <h5 class="navbar-title ml-3 mt-1 text-black-50">WELCOME | <b class="text-black-50">STEI 2020</b></h5>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle text-black-50"
                            href="#"
                            id="navbarDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            {{ Auth::user()->name }}
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right"
                            aria-labelledby="navbarDropdown"
                        >
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Keluar
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn-primary">Top</button>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('custom-script')
</div>
</body>
</html>
