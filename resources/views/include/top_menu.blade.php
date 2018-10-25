<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @auth('admin')
                <li class=" nav-item">
                    <a href="/admin">
                        <i class="la la-home"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="/apartments">
                        <i class="la la-bank"></i><span class="menu-title">Apartments</span>
                    </a>
                </li>
            <li class=" nav-item"><a href="/users"><i class="la la-user"></i><span class="menu-title">Users</span></a></li>
            <li class=" nav-item"><a href="/adminmacaddress"><i class="la la-mobile"></i><span class="menu-title">Mac Address</span></a></li>
            <li class=" nav-item"><a href="/nas"><i class="la la-inbox"></i><span class="menu-title">NAS</span></a></li>
            @endauth
            @auth('web')
            <li class=" nav-item"><a href="/macaddress"><i class="la la-mobile"></i><span class="menu-title">Mac Address</span></a></li>
            @endauth
        </ul>
    </div>
</div>