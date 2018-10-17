<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="/"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
            </li>
            @auth('admin')
            <li class=" nav-item"><a href="/users"><i class="la la-user"></i><span class="menu-title">Users</span></a></li>
            @endauth
            @auth('web')
            <li class=" nav-item"><a href="/macaddress"><i class="la la-mobile"></i><span class="menu-title">Mac Address</span></a></li>
            @endauth
            {{--<li class=" nav-item"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">Navbars</span></a></li>--}}
            {{--<li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Settings</span><span class="badge badge badge-pill badge-danger float-right mr-2">New</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="/users" >Users</a>
                    </li>
                    <li><a class="menu-item" href="/users" >Devices</a>
                    </li>
                </ul>
            </li>--}}
        </ul>
    </div>
</div>