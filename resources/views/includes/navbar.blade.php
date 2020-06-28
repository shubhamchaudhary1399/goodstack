
<nav class="my-navbar navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="material-icons md-36" style="color: #e74e4b;">home</i>
            <span class="mt-aside">{{ config('app.name', 'goodstack') }}</span>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" style="outline: none;">
                <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

            <li class="nav-item">

            </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="material-icons">exit_to_app</i>
                        <span class="mt-aside">{{ __('Login') }}</span>
                    </a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="material-icons">exit_to_app</i>
                            <span class="mt-aside">{{ __('Register') }}</span>
                    </a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    <div class="btn-group dropleft">
                        <img id="navbarDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre src='img/profile_image.png' class="img-fluid rounded-circle" style="max-height: 40px;">

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a  style="min-width:250px;" href='/home' class="dropdown-item custom-head">

                            <img style='max-height:45px;margin-right:10px;' class='img-fluid rounded-circle' src='img/profile_image.png'>
                            <div style="padding-right: 10px;">
                            <span>Hello, {{ Auth::user()->username }}</span>
                            <br>
                            <span style='font-size:14px;font-weight:400;padding-right: 35px;'>
                            {{ Auth::user()->email }}</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/home" class="dropdown-item"> <i class="material-icons md-18">home</i> <span>Home</span> </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons">exit_to_app</i>
                            <span class="mt-aside">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>
