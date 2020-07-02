<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="{{ route('dashboard') }}" class="logo logo-metrica d-block text-center">
            <span><img src="{{ asset('public/assets/backend/images/logo-sm.png') }}" alt="logo-small" class="logo-sm" /></span>
        </a>
        <nav class="nav">
            <a href="#Blogs" class="nav-link @if(Route::currentRouteName() =='dashboard') active @endif" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Blogs" data-trigger="hover">
                <i data-feather="pie-chart" class="align-self-center menu-icon icon-dual"></i>
            </a>
            <a href="#Posts" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Posts" data-trigger="hover">
                <i data-feather="grid" class="align-self-center menu-icon icon-dual"></i>
            </a>
            <a href="#Cms" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Cms" data-trigger="hover">
                <i data-feather="grid" class="align-self-center menu-icon icon-dual"></i>
            </a>
        </nav>
        <!--end nav-->
        <div class="pro-metrica-end">
            <a href="#" class="help" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Chat"><i data-feather="message-circle" class="align-self-center menu-icon icon-md icon-dual mb-4"></i> </a>
            <a href="#" class="profile"><img src="{{ asset('public/assets/backend/images/users/user-4.jpg') }}" alt="profile-user" class="rounded-circle thumb-sm" /></a>
        </div>
    </div>
    <!--end main-icon-menu-->
    <div class="main-menu-inner">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route('dashboard') }}" class="logo">
                <span><img src="{{ asset('public/assets/backend/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark" />
                    <img src="{{ asset('public/assets/backend/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light" /></span>
            </a>
        </div>
        <div class="menu-body slimscroll">
            <div id="Blogs" class="main-icon-menu-pane @if(Route::currentRouteName() =='dashboard') mm-active active @endif">
                <div class="title-box"><h6 class="menu-title">Blogs</h6></div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin-blogs') }}">View</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('create-blogs') }}">Create</a></li>
                </ul>
            </div>
            <div id="Posts" class="main-icon-menu-pane">
                <div class="title-box"><h6 class="menu-title">Posts</h6></div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="#">View</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Create</a></li>
                </ul>
            </div>
            <div id="Cms" class="main-icon-menu-pane">
                <div class="title-box"><h6 class="menu-title">Cms</h6></div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('menu',['header-menu']) }}">Header Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('pages') }}">View Pages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('create-page') }}">Create Pages</a></li>
                    @if(isset($slug))
                    <li class="nav-item"><a class="nav-link" href="{{ route('edit-page',$slug) }}">Edit Page</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
