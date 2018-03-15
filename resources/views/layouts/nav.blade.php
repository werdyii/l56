      <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-warning rounded">
        <a class="navbar-brand" href="#">LARAVEL 5.6</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Farm & Merkets</a>
              <div class="dropdown-menu" aria-labelledby="dropdown09">
                <a class="dropdown-item" href="{{ route('farms.index') }}">Farms</a>
                <a class="dropdown-item" href="{{ route('farms.create') }}">New farm</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('markets.index') }}">Markets</a>
                <a class="dropdown-item" href="{{ route('markets.create') }}">New market</a>
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
          </form>
        </div>
      </nav>