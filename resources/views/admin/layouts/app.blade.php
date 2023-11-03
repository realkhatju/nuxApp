<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nuxApp</title>
    <link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Linux_Logo_in_Linux_Libertine_Font.svg/1200px-Linux_Logo_in_Linux_Libertine_Font.svg.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <style>
        .height{

        height: 100vh;
        }

        .form{

        position: relative;
        }

        .form .fa-search{

        position: absolute;
        top:20px;
        left: 20px;
        color: #9ca3af;

        }

        .form span{

        position: absolute;
        right: 17px;
        top: 13px;
        padding: 2px;
        border-left: 1px solid #d1d5db;

        }

        .left-pan{
        padding-left: 7px;
        }

        .left-pan i{

        padding-left: 10px;
        }

        .form-input{

        height: 55px;
        text-indent: 33px;
        border-radius: 10px;
        }

        .form-input:focus{

        box-shadow: none;
        border:none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3 mb-3">
                <div class="row h-75">
                    <div class="col">
                        <a href="">
                            <button class="w-75 text-start btn mb-4 fs-5">
                                <i class="fa-brands fa-linux fs-1"></i>
                            </button>
                        </a>

                        <a href="{{ route('admin#home')}}">
                            <button class="w-75 text-start btn mb-4 fs-5">
                                <i class="fa-solid fa-house"></i>
                                <span class="p-2">Home</span>
                            </button>
                        </a>

                        <a href="">
                            <button class="w-75 text-start btn mb-4 fs-5">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <span class="p-2">Explore</span>
                            </button>
                        </a>

                        <a href="{{ route('admin#notifications')}}">
                            <button class="w-75 text-start btn mb-4 fs-5">
                                <i class="fa-regular fa-bell"></i>
                                <span class="p-2">Notifications</span>
                            </button>
                        </a>

                        <a href="{{ route('admin#message')}}">
                            <button class="w-75 text-start btn mb-4 fs-5">
                                <i class="fa-solid fa-envelope"></i>
                                <span class="p-2">Message</span>
                            </button>
                        </a>

                        <a href="{{ route('admin#list')}}">
                            <button class="w-75 text-start btn mb-4 fs-5">
                                <i class="fa-solid fa-clipboard-list"></i>
                                <span class="p-2">List</span>
                            </button>
                        </a>

                        <a href="{{ route('admin#profile')}}">
                            <button class="w-75 text-start btn mb-4 fs-5">
                                <i class="fa-solid fa-user"></i>
                                <span class="p-2">Profile</span>
                            </button>
                        </a>

                        <a href="{{ route('admin#post')}}">
                            <button class="btn btn-info w-75 rounded-5 text-white fs-5">
                                <span>Post</span>
                            </button>
                        </a>

                    </div>

                </div>
                <div class="row d-flex justify-content-center align-items-end h-25">
                    <div class="dropdown">
                        <span class="w-100 d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown">
                            <div class="col"><i class="fa-brands fa-linux fs-1"></i></div>
                            <div class="col-6">{{Auth::user()->name}}</div>
                            <div class="col">...</div>
                        </span>
                        <ul class="dropdown-menu" >
                          <li><a class="dropdown-item" href="#">Add an existing account</a></li>
                          <li type="button" class="text-center">
                            <form action="{{ route('logout')}}" method="POST">
                                @csrf
                                <button class="mt-2 btn text-decoration-none  " type="submit">Log out @</button>
                            </form>
                          </li>
                        </ul>
                      </div>
                </div>
            </div>
            <div class="col-6 border-start border-end border-secondary overflow-auto" style="height: 100vh;">
                @yield('content')
            </div>
            <div class="col-3 mt-2" >
                    <div class="container">
                        <div class="row d-flex justify-content-center align-items-center">
                          <div class="col">
                            <div class="form">
                              <i class="fa fa-search"></i>
                              <input type="text" class="form-control form-input" placeholder="Search anything...">
                            </div>
                          </div>
                        </div>
                    </div>
            </div>
          </div>
      </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
</html>
