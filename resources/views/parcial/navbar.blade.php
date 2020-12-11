<!-- Header -->

<header class="header trans_300">

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="{{ url('/')}}">ambil<span style="color: #FFE600;">promo</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="{{ url('/')}}">home</a></li>
                            <li><a href="{{ url('/catalogue')}}">catalogue</a></li>
                            <li><a href="#">about</a></li>
                            <li><a href="{{ url('/contact')}}">contact</a></li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
            <li class="menu_item"><a href="{{ url('/')}}">home</a></li>
            <li class="menu_item"><a href="{{ url('/catalogue')}}">catalogue</a></li>
            <li class="menu_item"><a href="#">about</a></li>
            <li class="menu_item"><a href="{{ url('/contact')}}">contact</a></li>
        </ul>
    </div>
</div>
