<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
    <script
        src="https://kit.fontawesome.com/66ea7a0dc7.js"
        crossorigin="anonymous"
    ></script>
    <style>
        body {
            background-image: url("{{ asset('css/itb_art.jpg') }}");
        }

        .bg-not-dark {
            background-color: rgba(22, 22, 22, 0.4);
            backdrop-filter: blur(2px);
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 40px;
            line-height: 40px;
            background-color: #f5f5f5;
        }

        .token_container {
            border-style: solid;
            border-top-color: #56CCF2;
            border-bottom-color: #2F80ED;
            border-left-color: #2F80ED;
            border-right-color: #56CCF2;
            border-width: medium;
        }

        .btn-grad {
            background-image: linear-gradient(to right, #56CCF2 0%, #2F80ED 51%, #56CCF2 100%)
        }

        .btn-grad-gold {
            background-image: linear-gradient(to right, #FF8008 0%, #FFC837 51%, #FF8008 100%)
        }

        .btn-grad-red {
            background-image: linear-gradient(to right, #D31027 0%, #EA384D 51%, #D31027 100%)
        }

        .btn-grad {
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 10px #eee;
            display: block;
        }

        .btn-grad:hover {
            background-position: right center;
            color: #fff;
            text-decoration: none;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <img src="{{ asset('img/logo-text.png') }}" alt=""/>
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
            @if(config('app.enable_claim_token'))
                <a href="{{ route('home.token') }}" class="list-group-item list-group-item-action bg-light"
                ><b>Token</b></a
                >
            @endif
            @if(config('app.enable_vote'))
                <a href="{{ route('home.vote') }}" class="list-group-item list-group-item-action bg-light"
                ><b>Voting</b></a
                >
            @endif
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav
            class="navbar navbar-expand-lg navbar-dark bg-not-dark border-bottom text-white"
        >
            <button class="btn-grad btn" id="menu-toggle">Menu</button>

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

            <h5 class="navbar-title ml-3 mt-1 text-white">WELCOME | <b class="text-white">STEI 2020</b></h5>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle text-white"
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
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn-grad btn-primary">Top</button>
        <footer class="footer mb-auto py-1 bg-dark">
            <div class="container ml-auto" style="font-size: 14px;">
                <span class="text-white">This website is made with <i
                        class="fa fa-heart" aria-hidden="true"></i> by IT Team</span>
            </div>
        </footer>
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
