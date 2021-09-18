<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <center>
                <a href="/dashboard">
                    <span>
                        <h5 style="font-family: Lilita One; font-size:22px; margin-left:50px"><img class="img-fluid"
                                src="{{asset('assets/assets\images\logo-kecil-2.png')}}" alt="Theme-Logo"></h5>
                    </span>
                </a>
            </center>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="feather icon-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            @if (Session::get('jenis_kelamin') == "P")
                            <img src="{{asset('assets/assets/images/user-profile/user-img.jpg')}}" class="img-radius" alt="User-Profile-Image">
                            @else
                            <img src="{{asset('assets/assets/images/avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                            @endif
                            <span>{{Session::get('nama')}}</span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <a href="{{url('profil')}}">
                                    <i class="feather icon-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="/logout">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>