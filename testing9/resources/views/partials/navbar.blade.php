<style>
    .alert {
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

</style>
<body>
<div class="preloader">
    <div class="wrapper-triangle">
        <div class="pen">
            <div class="line-triangle">
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
            </div>
            <div class="line-triangle">
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
            </div>
            <div class="line-triangle">
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
                <div class="triangle"></div>
            </div>
        </div>
    </div>
</div>
<div class="page">

    <!-- Page Header-->
    <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                 data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
                 data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed"
                 data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
                 data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static"
                 data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px"
                 data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-inner-outer">
                    <div class="rd-navbar-inner">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span>
                            </button>
                        @guest
                            @php
                                $type = 2;
                            @endphp
                        @endguest
                        @auth
                            @php
                                $type =  Auth::user()->user_type;
                            @endphp
                        @endauth
                        <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand">
                                @if( $type == '0')
                                    <a class="brand" href="{{url('/admin')}}">
                                        <h3>Food</h3>
                                    </a>
                                @elseif($type == '1' )
                                    <a class="brand" href="{{url('/restaurant')}}">
                                        <h3>Food</h3>
                                    </a>
                                @else
                                    <a class="brand" href="{{url('/food')}}">
                                        <h3>Food</h3>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="rd-navbar-right rd-navbar-nav-wrap">
                            <div class="rd-navbar-aside">
                            </div>
                            <div class="rd-navbar-main">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    @if( $type == '0')

                                    @elseif($type == '1' )
                                        <li class="rd-nav-item {{ request()->segment(1) == 'restaurant' ? 'active' : ''}}">
                                            <a class="rd-nav-link " href="{{url('restaurant')}}">Statistics</a>
                                        </li>
                                        <li class="rd-nav-item {{ request()->segment(1) == 'orders' ? 'active' : ''}}">
                                            <a class="rd-nav-link" href="{{url('orders')}}">Order</a></li>
                                        <li class="rd-nav-item {{ request()->segment(1) == 'dishes' ? 'active' : ''}}">
                                            <a class="rd-nav-link" href="{{url('dishes')}}">Dishes</a></li>
                                    @else
                                        <li class="rd-nav-item {{ request()->segment(1) == 'files' ? 'active' : ''}}">
                                            <a class="rd-nav-link" href="{{url('files')}}">Files</a></li>
                                        </li>
                                        <li class="rd-nav-item {{ request()->segment(1) == 'food' ? 'active' : ''}} {{ request()->segment(1) == '' ? 'active' : ''}}">
                                            <a class="rd-nav-link" href="{{url('/food')}}">Home</a>
                                        </li>
                                        <li class="rd-nav-item">
                                            <a class="rd-nav-link" href="#" data-toggle="modal"
                                               data-target="#cartModal">Cart
                                                @isset($cartArr)
                                                    <sup>{{ $cartArr->count() }}</sup>
                                                @endisset
                                            </a>
                                        </li>
                                    @endif
                                    @guest
                                         
                                        <li class="rd-nav-item {{ request()->segment(1) == 'login' ? 'active' : ''}}">
                                            <a class="rd-nav-link" href="{{route('login')}}">Login</a></li>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="rd-nav-item {{ request()->segment(1) == 'register' ? 'active' : ''}}">
                                                <a class="rd-nav-link"
                                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="rd-nav-item dropdown">
                                            <a id="navbarDropdown" class="rd-nav-link dropdown-toggle" href="#"
                                               role="button" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
