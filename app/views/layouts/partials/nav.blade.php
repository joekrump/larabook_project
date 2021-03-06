<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand active" href="/">Larabook</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>{{ link_to_route('statuses_path', 'Statuses') }}</li>
                <li><a href="#">Link</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar }}" alt="{{ $currentUser->username }}">
                        {{$currentUser->username}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li>{{ link_to_route('logout_path', 'Logout') }}</li>
                    </ul>
                </li>
                @else
                    <li>{{ link_to_route('register_path', 'Register') }}</li>
                    <li>{{ link_to_route('login_path', 'Log In') }}</li>
                @endif
            </ul>

        </div>
    </div>
</nav>