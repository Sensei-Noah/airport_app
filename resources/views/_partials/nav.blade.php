<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand fs-2" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-4">
          <li>
            <a class="nav-link" href="/show_airport">Airports</a>
          </li>
          <li>
            <a class="nav-link" href="/show_airline">Airlines</a>
          </li>
          <li>
            <a class="nav-link" href="/show_country">Countries</a>
          </li>
          {{-- Admin = 1 ; user = 0 --}}
          @if (Auth::check())
            @if (Auth::user()->role == '1')
                <li>
                    <a class="nav-link" href="/admin/show_users">Users</a>
                </li>
            @endif
          @endif
        </ul>
      </div>

        <div class="">

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block text-light fs-5 dropdown">
                    @auth
                        <div class="d-flex ">
                            <a class="text-sm text-gray-700 dark:text-gray-500 text-decoration-none dropdown-toggle btn btn-secondary p-2 m-1" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth()-> user() -> name }}
                            </a>
                            {{-- Admin = 1 ; user = 0 --}}
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if (Auth::check())
                                    @if (Auth::user()->role == '1')
                                        <li>
                                            <a href="{{ url('/admin/adminLogout') }}" class="text-sm text-gray-700 dark:text-gray-500 text-decoration-none dropdown-item">Logout</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 text-decoration-none dropdown-item">Logout</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    @else
                        <div class="d-flex">

                            <a class="text-sm text-gray-700 dark:text-gray-500 text-decoration-none dropdown-toggle btn btn-secondary p-2 m-1" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Guest
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <li>
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 text-decoration-none dropdown-item">Log in</a>
                                </li>

                                @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 text-decoration-none dropdown-item">Register</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    @endauth
                </div>
            @endif

        </div>

    </div>
  </nav>
