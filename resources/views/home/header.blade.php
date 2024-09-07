         <!-- header inner -->
         <div class="header">
             <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
    <div class="center-desk" style="display: flex; align-items: center;">
        <div class="logo">
            <a href="{{'/'}}"><img src="images/logo.png" alt="#" style="width: 70px; height: 65px; padding-top: 0;" /></a>
        </div>
        <div>
            <h1 style="font-size: 50px; color: #000000; font-family: Arial, sans-serif; margin-left: 20px;">ROSE</h1>
        </div>
    </div>
</div>

                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{ url('/about') }}">ِAbout Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/our_room') }}">Our room</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/gallery') }}">Gallery</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                                </li>




                                @if (Route::has('login'))
                                @auth
                                <x-app-layout>

                                </x-app-layout>

                                @else
                                <li classbtn-primary  style="padding-right: 10px;">
                                    <a class="btn btn-success" href="{{url('login')}}" style="background-color: #A52A2A; border-color: #A52A2A;">Login</a>
                                </li>

                                    @if (Route::has('register'))

                                    <li class="nav-item">
                                         <a class="btn btn-primary" href="{{url('register')}}" style="background-color: #A52A2A; border-color: #A52A2A;">Register</a>
                                    </li>
                                    @endif
                                @endauth
                            </nav>
                        @endif

                            </ul>
                            </div>
                        </nav>
                    </div>
                </div>
              </div>
        </div>