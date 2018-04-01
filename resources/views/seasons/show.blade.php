@extends('layouts.master')
@section('main')
<div class="row justify-content-center">
	<div class="col-md-12">
		<h2>Show {{ $season->name }}

            <a href="{{ route('season.edit', $season ) }}"
            class="btn btn-secondary"
            role="button"
            ><span class="fa fa-pencil" aria-hidden="true"></span> Uprav</a>

            <a href="{{ route('season.index') }}"
            class="btn btn-outline-secondary"
            role="button"
            ><span class="fa fa-undo" aria-hidden="true"></span> Späť</a>
		</h2>
		<h3>	Start season: 	{{ $season->start_date }} </h3>
		<h3>	End season: 	{{ $season->end_date }} </h3>
		<div class="row">
			<div class="col-md-6">
				<h3>Modry</h3>
				<ul>
					@forelse( $season->blue as $player )
					<li>{{ $player->name }}</li>
					@empty
					<li> nikto </li>
					@endforelse
				</ul>
			</div>
			<div class="col-md-6">
				<h3>Biely</h3>
				<ul>
					@forelse( $season->white as $player )
					<li>{{ $player->name }}</li>
					@empty
					<li> nikto </li>
					@endforelse
				</ul>
			</div>
		</div>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Datum</th>
		      <th scope="col">Pozvánka</th>
		      <th scope="col">Odohral sa</th>
		    </tr>
		  </thead>
		  <tbody>
			@forelse( $season->games()->sortByDesc('game_date') as $game )
		    <tr>
		      <th scope="row">{{ $game->id }}</th>
		      <td><a href="{{ route('game.show', $game) }}">{{ $game->game_date }}</a></td>
		      <td>{{ $game->invitation }}</td>
		      <td>{{ $game->played }}</td>
		    </tr>
			@empty
			<tr>
				<p>we got nothing :(</p>
			</tr>
			@endforelse
		  </tbody>
		</table>

	</div>
</div>
@endsection