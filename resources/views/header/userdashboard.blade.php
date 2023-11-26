<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg  bg-white nav-target fixed-top ms-auto border">
        <div class="container-fluid">
            <a class="btn toggle-menu d-none d-md-block border border-dark" role="button" aria-controls="toggle btn">
                <span>
                    <i class="bi bi-list fs-4"></i>
                </span>
            </a>
            <ul class="navbar-nav ms-auto flex-row px-1">
                <li class="nav-item dropdown my-2 d-block d-md-none ">
                    <button class="navbar-toggler mobile-toggle-menu  border border-dark mobile-nav" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </li>
                <li class="nav-item dropdown mx-1">
                    <form action="" class=" d-none d-md-block">
                        <div class="input-group my-2">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="button-addon2" name="search">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </form>

                </li>

                <li class="nav-item dropdown mx-1">
                    <a class="nav-link dropdown-toggle d-flex align-items-center my-1" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe-asia-australia text-secondary"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-end p-2">
                        <li class=" ">
                            <a href="" class="text-secondary text-decoration-none">English</a>
                        </li>
                        <li>
                            <a href="" class="text-secondary text-decoration-none">French</a>
                        </li>

                    </ul>
                </li>
           
                <li class="nav-item dropdown me-5 text-secondary">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="">
                            <img src="{{  Auth::user()->image }}" class="rounded-pill image-size"
                                alt="">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.user') }}">My Profile</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


    {{-- Sidebar --}}

    <div class="offcanvas offcanvas-start sidebar bg-color" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="row">
            <div class="col-10 my-4">
                <h5 class="offcanvas-title text-center mx-3 text-white text-uppercase" id="offcanvasExampleLabel">
                    Attendance system
                </h5>
            </div>
            <div class="col-2 ">
                <button type="button" class="btn-close bg-dark d-block d-md-none  fs-2" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
        </div>

        <div class="offcanvas-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <i class="bi bi-person text-white my-1"></i>
                    <h4 class="text-center text-white mx-3">{{ Auth::user()->name }}</h4>
                </div>
            </div>
            <hr class="my-5">

            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li class="d-flex justify-content-start">
                        <a class="nav-link d-flex" href="{{ route('user.dashboard') }}">
                            <span class="mx-2"><i class="bi bi-speedometer text-white"></i></span>
                            <span class="mx-2 text-white">Dashboard</span>
                        </a>
                    </li>
                   
                    <li class="d-flex justify-content-start">
                        <a class="nav-link d-flex" href="{{ route('user.history') }}">
                            <span class="mx-2"><i class="bi bi-speedometer text-white"></i></span>
                            <span class="mx-2 text-white">History</span>
                        </a>
                    </li>
                    <li class="d-flex justify-content-start mt-5">
                        <a class="nav-link d-flex" href="{{ route('logout') }}">
                            <span class="mx-2"><i class="bi bi-box-arrow-right text-white"></i></span>
                            <span class="mx-2 text-white">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    
    <div class="nav-target p-md-5 my-5">
        @yield('content')

    </div>




    <script src="/assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
