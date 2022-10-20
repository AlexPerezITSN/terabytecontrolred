<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/terabyte.png') }}" width="200px" style="margin-bottom: 12px;
    background-color: #eceff1;
    border-radius: 3px;
    box-shadow: 0 5px 10px rgb(0 0 0 / 10%);"
             alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/LogoTerabyte.png') }}" width="50px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
