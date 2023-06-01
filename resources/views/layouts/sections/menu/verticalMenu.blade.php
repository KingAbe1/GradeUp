@php
    $configData = Helper::appClasses();
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    @if (!isset($navbarFull))
        <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                    @include('_partials.macros', ['height' => 20])
                </span>
                <span class="app-brand-text demo menu-text fw-bold">{{ config('variables.templateName') }}</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
        </div>
    @endif


    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text"></span>
        </li> --}}
        @php
            $activeClass = null;
            $currentRouteName = Route::currentRouteName();
        @endphp
        <li class="menu-item {{ $currentRouteName == 'dashboard' ? 'active' : '' }}">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li
            class="menu-item {{ $currentRouteName == 'app-user-list' || $currentRouteName == 'pages-profile-user' ? 'active' : '' }}">
            <a href="/app/user/list" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div>Manage Users</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName == 'app-chat' ? 'active' : '' }}">
            <a href="/app/chat" class="menu-link">
                <i class="menu-icon tf-icons ti ti-messages"></i>
                <div>Chat</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName == 'app-invoice-list' ? 'active' : '' }}">
            <a href="/app/invoice/list" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                <div>Manage Invoice</div>
            </a>
        </li>
        <li class="menu-item {{ $currentRouteName == 'app-user-view-account' ? 'active' : '' }}">
            <a href="/app/user/view/account" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div>Account Setting</div>
            </a>
        </li>
        {{-- <li class="menu-item {{ $currentRouteName == 'app-user-list' ? 'active' : '' }}">
            <a href="app/user/list" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>Manage Users</div>
            </a>
        </li> --}}

        {{-- submenu --}}
        {{-- @isset($menu->submenu)
            @include('layouts.sections.menu.submenu', ['menu' => $menu->submenu])
        @endisset --}}
    </ul>

</aside>
