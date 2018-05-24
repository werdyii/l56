        <input type="hidden" name="blue" value="{{ old('blue') }}">
        <input type="hidden" name="white" value="{{ old('white') }}">

        <div class="row">
          <div class="form-group col-md-4">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="New season name" value="{{ $season->name or old('name') }}">
          </div>

          <div class="form-group col-md-4">
            <label for="start_date">Start date</label>
            <div class="input-group date">
              <input type="date" class="form-control" name="start_date" placeholder="datum" value="{{ $season->start_date or old('start_date')  }}">
              <div class="input-group-append input-group-addon">
                <button class="btn btn-outline-secondary" type="button">datum</button>
              </div>
            </div>
          </div>

          <div class="form-group col-md-4">
            <label for="end_date">End date</label>
            <div class="input-group date">
              <input type="date" class="form-control" name="end_date" placeholder="datum" value="{{ $season->end_date or old('end_date') }}">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">datum</button>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-4">
            <label for="players">Hráči</label>
            <select name="players" multiple class="form-control" id="players" size="16">
              @foreach( $players as $player )
                <option value="{{ $player->id }}"> {{ $player->name }} </option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="player_blue">Modrý</label>
            <select name="players_blue[]" multiple class="form-control" id="player_blue" size="16">
              @foreach( $season->blue as $player_blue )
                <option value="{{ $player_blue->id }}"> {{ $player_blue->name }} </option>
              @endforeach
            </select>
            <br>
            <div class="row justify-content-center">
              <div class="form-group">
                <a href="#"
                id="blue_add"
                class="btn btn-outline-secondary"
                role="button"
                ><span class="fa fa-plus-circle" aria-hidden="true"></span> Add</a>
                <a href="#"
                id="blue_del"
                class="btn btn-outline-danger"
                role="button"
                ><span class="fa fa-minus-circle" aria-hidden="true"></span> Del</a>
              </div>
            </div>

          </div>
          <div class="form-group col-md-4">
            <label for="player_white">Biely</label>
            <select name="players_white[]" multiple class="form-control" id="player_white" size="16">
              @foreach( $season->white as $player_white )
                <option value="{{ $player_white->id }}"> {{ $player_white->name }} </option>
              @endforeach
            </select>
            <br>
            <div class="row justify-content-center">
              <div class="form-group">
                <a href="#"
                id="white_add"
                class="btn btn-outline-secondary"
                role="button"
                ><span class="fa fa-plus-circle" aria-hidden="true"></span> Add</a>
                <a href="#"
                id="white_del"
                class="btn btn-outline-danger"
                role="button"
                ><span class="fa fa-minus-circle" aria-hidden="true"></span> Del</a>
              </div>
            </div>
          </div>
        </div>
      </div>