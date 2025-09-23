<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BookStore</title>

    <style>
        body{
            font-family: "Cairo", sans-serif;
            font-optical-sizing: auto;
            font-weight:600;
            font-style: normal;
            background-color: #E6EEF5;
        }

        .navbar .navbar-brand{
            font-size: x-large;
            color: #1F2D3D;
            font-weight: bold;
        }

        .bg-cart{
            background-color: #660B05;
            color: #fff;
        }

.nav-item {
    position: relative;
}

.nav-item .badge {
    position: absolute;
    top: -5px;   /* move it above */
    right: -10px; /* move it to the right */
    border-radius: 50%;
    font-size: 10px;
    padding: 4px 7px;
    background: red;
    color: white;
}
        .score{
            display: block;
            font-size: 16px;
            position: relative;
            overflow: hidden;
        }

        .score-wrap {
            display: inline-block;
            position: relative;
            height: 19px;

        }

        .score .stars-active{
            color: #FFCA00;
            position: relative;
            z-index: 10;
            display: block;
            overflow: hidden;
            white-space: nowrap;
        }

        .score .stars-inactive{
            color: lightgrey;
            position: absolute;
            top: 0;
            left: 0;
        }

        .rating{
            overflow:hidden;
            display: inline-block;
            position: relative;
            font-size: 20px;
        }

        .rating-star{
            padding: 0 5px;
            margin: 0;
            cursor: pointer;
            display: block;
            float: right;
        }

        .rating-star:after{
            position: relative;
            font-family: "Font Awesome 5 Free";
            content: '\f005';
            color: lightgray;
        }

        .rating-star.checked ~ .rating-star:after,
        .rating-star.checked:after{
            content: '\f005';
            color: #FFCA00;
        }

        .rating:hover .rating-star:after{
            content: '\f005';
            color: lightgray;
        }

        .rating-star:hover ~ .rating-star:after,
        .rating .rating-star:hover:after{
            content: '\f005';
            color: #FFCA00;
        }






    </style>
    @yield('head')
</head>
<body>

<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="{{url('/')}}">Bookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">

                    @auth
                        <li class="nav-item ms-4">
                            <a class="nav-link" href="{{route('my.product')}}">
                                <i class="fas fa-shopping-basket"></i>
                                My Products
                            </a>
                        </li>
                    @endauth

                    <li class="nav-item ms-4">
                        <a class="nav-link" href="{{route('gallery.authors.index')}}">
                            <i class="fa-solid fa-pen"></i>
                            Authors
                        </a>
                    </li>

                    <li class="nav-item ms-4">
                        <a class="nav-link" href="{{route('gallery.publishers.index')}}">
                            <i class="fa-solid fa-table"></i>
                            Publishers
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ms-4" href="{{route('gallery.categories.index')}}">
                            <i class="fa-solid fa-layer-group"></i>
                            Category
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link ms-4" href="{{route('cart.view')}}">
                            @if(Auth::user()->booksInCart()->count() > 0)
                                <span class="badge bg-danger">{{Auth::user()->booksInCart()->count() }}</span>
                            @else
                                <span class="badge bg-danger">0</span>

                            @endif

                            <i class="fa-solid fa-cart-shopping" style="position: relative;"></i>
                        </a>
                    </li>

                    @endauth
                </ul>

                  <ul class="navbar-nav ml-auto me-3">
                      @guest

                          <li class="nav-item ">
                              <a class="nav-link" href="{{route('login')}}">
                                  {{__('Login')}}
                              </a>
                          </li>
                          @if(Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('register')}}">
                                      {{__('Register')}}
                                  </a>
                              </li>
                          @endif

                      @else
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle p-0 border-0 bg-transparent" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img class="rounded-circle shadow-sm border border-light" width="40" height="40" src="{{Auth::user()->profile_photo_url}}" alt="{{Auth::user()->name}}">
                              </a>


                          <div class="dropdown-menu dropdown-menu-end  shadow-lg border-0 p-2 mt-2">
                              <div class="pt-2 pb-2 ">
                                  <div class="flex items-center px-3">

                                      @can('update-users')
                                          <a href="{{route('admin.index')}}" class="dropdown-item">Dashboard</a>
                                      @endcan

                                      <div>
                                          <div class="font-medium text-base text-gray-800 border-bottom">{{ Auth::user()->name }}</div>

                                      </div>
                                  </div>

                                  <div class="mt-3 space-y-1 ">
                                      <!-- Account Management -->
                                      <x-responsive-nav-link class="dropdown-item" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                          {{ __('Profile') }}
                                      </x-responsive-nav-link>

                                      @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                          <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                              {{ __('API Tokens') }}
                                          </x-responsive-nav-link>
                                      @endif

                                      <!-- Authentication -->
                                      <form method="POST" action="{{ route('logout') }}" x-data>
                                          @csrf

                                          <x-responsive-nav-link class="dropdown-item" href="{{ route('logout') }}"
                                                                 onclick="event.preventDefault();
                                                                 this.closest('form').submit()">
                                              {{ __('Log Out') }}
                                          </x-responsive-nav-link>
                                      </form>

                                      <!-- Team Management -->
                                      @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                          <div class="border-t border-gray-200"></div>

                                          <div class="block px-4 py-2 text-xs text-gray-400">
                                              {{ __('Manage Team') }}
                                          </div>

                                          <!-- Team Settings -->
                                          <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                              {{ __('Team Settings') }}
                                          </x-responsive-nav-link>

                                          @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                              <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                                  {{ __('Create New Team') }}
                                              </x-responsive-nav-link>
                                          @endcan

                                          <div class="border-t border-gray-200"></div>

                                          <!-- Team Switcher -->
                                          <div class="block px-4 py-2 text-xs text-gray-400">
                                              {{ __('Switch Teams') }}
                                          </div>

                                          @foreach (Auth::user()->allTeams() as $team)
                                              <x-switchable-team :team="$team" component="responsive-nav-link" />
                                          @endforeach
                                      @endif
                                  </div>
                              </div>
                          </div>



                          </li>
                      @endguest


                  </ul>
              </div>


        </div>
    </nav>

    <main class="pt-5">
        @yield('content')

    </main>
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
</body>
</html>
