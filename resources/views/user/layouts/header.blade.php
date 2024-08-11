<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('user.beranda') }}"><img height="80" width="230"
                        src="assets-publik/img/logo2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ \Route::is('user.beranda') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('user.beranda') }}">Home</a>
                        </li>
                        <li class="nav-item {{ \Route::is('publik.buku') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('publik.buku') }}">All Book</a>
                        </li>
                        <li class="nav-item {{ \Route::is('user-book.*') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('user-book.index') }}">My Book</a>
                        </li>
                        @if (Auth::user())
                            <li class="nav-item submenu dropdown">
                                <a href="{{ route('logout') }}" class="genric-btn info circle arrow">Logout<span
                                        class="lnr lnr-arrow-right"></span></a>
                            </li>
                        @else
                            <li class="nav-item submenu dropdown">
                                <a href="{{ route('login') }}" class="genric-btn info circle arrow">login/register<span
                                        class="lnr lnr-arrow-right"></span></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
