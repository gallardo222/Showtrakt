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
                        <a class="nav-link" href="/profile">
                            Profile
                        </a>
                    </li>
                    @if(\App\User::isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">
                            Admin
                        </a>
                    </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">
                                Blog
                            </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/search">
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

@include('partials.loginmodal')