{{ Route::currentRouteName() }} | {{  nav_active_class() }}

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-warning border-bottom rounded mb-3">
  <a class="navbar-brand" href="{{ route('home') }}">LARAVEL 5.6</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample09">
    <ul class="navbar-nav mr-auto">
      <!-- li class="nav-item @if( body_id() == 'home') active @endif">
        <a class="nav-link" href="{{ route('home') }}">Home
          @if( body_id() == 'home')<span class="sr-only">(current)</span>@endif
        </a>
      </li -->
      <li class="nav-item @if( nav_active_class() == 'blog') active @endif">
        <a class="nav-link" href="{{ route('blog.index') }}">Blog
          @if( nav_active_class() == 'blog')<span class="sr-only">(current)</span>@endif
        </a>
      </li>
      <li class="nav-item @if( body_id() == 'dashboard') active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard
          @if( body_id() == 'dashboard')<span class="sr-only">(current)</span>@endif
        </a>
      </li>

      {{-- Links --}}
      <li class="nav-item @if( body_id() == 'links') active @endif">
        <a class="nav-link" href="{{ route('links') }}">Link
          @if( body_id() == 'links')<span class="sr-only">(current)</span>@endif
        </a>
      </li>

      {{-- Farm & Merkets --}}
      <li class="nav-item dropdown @if( in_array( nav_active_class(), array('markets','farms') ) || ( body_id() == 'home' ) ) active @endif ">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Farm & Merkets
          @if( ( nav_active_class() == 'markets' ) || ( nav_active_class() == 'farms' ) || ( body_id() == 'home' ) ) <span class="sr-only">(current)</span> @endif
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown09">
          <a class="dropdown-item" href="{{ route('farms.index') }}">Farms</a>
          <a class="dropdown-item" href="{{ route('farms.create') }}">New farm</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('markets.index') }}">Markets</a>
          <a class="dropdown-item" href="{{ route('markets.create') }}">New market</a>
        </div>
      </li>

      {{-- NHL --}}
      <li class="nav-item dropdown @if(  in_array( nav_active_class(), array('season','games') ) ) active @endif ">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NHL</a>
        <div class="dropdown-menu" aria-labelledby="dropdown09">
          <a class="dropdown-item" href="{{ route('season.index') }}">Season</a>
          <a class="dropdown-item" href="{{ route('games.index') }}">Games</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{-- route('.index') --}}">Player</a>
          <a class="dropdown-item" href="{{-- route('markets.create') --}}">Štatistika</a>
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-md-0">
      <input class="form-control" type="text" placeholder="Search" aria-label="Search">
    </form>
  </div>
</nav>