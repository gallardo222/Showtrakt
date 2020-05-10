<nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="/">Showtrakt</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal" >
                            Log In
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{'register'}}">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            Search
                        </a>
                    </li>

                 @endauth

            </ul>
            <ul class="nav navbar-nav">
                @auth
                <li class="nav-item">
                    <div class="nav-link">
                        <form action="{{route('logout')}}" method="POST" style="display: inline;">
                            @csrf
                            <button class="text-white" style="background: transparent; border: none !important;">LOGOUT</button>
                        </form>
                    </div>

                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="https://twitter.com/CreativeTim">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.facebook.com/CreativeTim">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.instagram.com/CreativeTimOfficial">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="modal fade modal-primary" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="card card-login card-plain" data-background-color>
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <br>
                            <br>
                            <br>

                            <img src="/assets/img/showtrakt-logo-bg.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="now-ui-icons users_circle-08"></i></span>
                                </div>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                            </div>
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="now-ui-icons ui-1_lock-circle-open"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                            </div>
                        </div>
                            <button type="submit" class="btn btn-neutral btn-round btn-lg btn-block">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>