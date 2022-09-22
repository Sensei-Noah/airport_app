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

        </ul>
      </div>

        <div class="">

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block text-light fs-5">
                    @auth
                        <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 text-decoration-none">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 text-decoration-none">Log in</a>
                        /{{-- seperator --}}
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 text-decoration-none">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>

    </div>
  </nav>
