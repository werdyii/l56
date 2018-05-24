        <div class="row">

          <div class="form-group col-md-3">
            <label for="game_date">Dátum</label>
            <input type="text" name="game_date" placeholder="datum"
              class="form-control {{ $errors->has('game_date') ? ' is-invalid' : '' }}"  
              value="{{ $game->date or old('game_date') }}">
            @if ($errors->has('game_date'))
              <div class="invalid-feedback">
                {{ $errors->first('game_date') }}
              </div>
            @endif
          </div>

          <div class="form-group col-md-2">
            <label for="game_time">Čas</label>
            <input type="time" name="game_time" placeholder="time"
              class="form-control {{ $errors->has('game_time') ? ' is-invalid' : '' }}"  
              value="{{ old('game_time', $game->time)  }}">
            @if ($errors->has('game_time'))
              <div class="invalid-feedback">
                {{ $errors->first('game_time') }}
              </div>
            @endif
          </div>

          <div class="form-group col-md-1">
            <label for="minimal_players">Min.</label>
            <input type="text" name="minimal_players"
              class="form-control {{ $errors->has('minimal_players') ? ' is-invalid' : '' }}"  value="{{ old('minimal_players',$game->minimal_players) }}">
            @if ($errors->has('minimal_players'))
              <div class="invalid-feedback">
                {{ $errors->first('minimal_players') }}
              </div>
            @endif
          </div>

          <div class="form-group col-md-6">
            <label for="showURL">URL Zápasu</label>
            <input type="text" class="form-control" id="showURL" name="game_url" value="{{ old('game_url', $game->url) }}" readonly="true">
          </div>

        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="CheckSendInvitations"
                name="send_invitations"
                value="1"
                {!! old("send_invitations") ? 'checked="checked"' : '' !!} >
            <label class="custom-control-label" for="CheckSendInvitations">Send invitation</label>
            <small class="form-text text-muted">
                pošle sa mail všetkym učastnikom ligy týždeň pre zápasom
            </small>
        </div>

        <div class="form-group">
            <label for="invitation">Text pozvania:</label>
            <textarea
                name="invitation"
                id="invitation"
                rows="6"
                class="form-control
                @if ($errors->has('invitation')) is-invalid @endif" required>{{ old('invitation',$game->invitation ) }}</textarea>
                @if ($errors->has('invitation'))
                <div class="invalid-feedback">
                    {{ $errors->first('invitation') }}
                </div>
                @endif
        </div>
