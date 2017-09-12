<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        <img src="https://d30y9cdsu7xlg0.cloudfront.net/png/16709-200.png"
                             alt="">{{ auth()->user()->name }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> Sair
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                <li role="presentation" class="dropdown">
                    <a  id="notifications" href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                       aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        @if(($count = auth()->user()->unreadNotifications()->count()) > 0)
                            <span class="badge bg-green">{{ $count }}</span>
                        @endif
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        @foreach (auth()->user()->notifications()->get() as $notification)
                            <li>
                                <a href="{{ route('client.subscribers', [ $notification->data['landingPage'] ]) }}" data-notification-id="{{ $notification->id }}">
                                    <span>
                                          <span>Nova Subscrição</span>
                                          <span class="time">{{ \Carbon\Carbon::parse($notification->data['created_at']['date'])->diffForHumans() }}</span>
                                    </span>
                                    <span class="message">
                                         {{ $notification->data['name'] }} subscreveu a {{ $notification->data['landingPageName'] }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>