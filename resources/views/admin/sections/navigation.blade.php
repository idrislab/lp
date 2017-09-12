<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/16709-200.png" alt="..."
                     class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Olá,</span>
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            @if(auth()->user()->hasRole('manager'))
                <div class="menu_section">
                    <h3>Geral</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('manager.dashboard') }}" title="Dashboard">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="menu_section">
                    <h3>Gerir</h3>
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('manager.clients') }}">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                Clientes
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('manager.landingPages') }}">
                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                Landing Pages
                            </a>
                        </li>
                    </ul>
                </div>
            @elseif(auth()->user()->hasRole('client'))
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li>
                            <a href="{{ route('client.dashboard') }}" title="Dashboard">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('client.landingPages') }}">
                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                Landing Pages
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
