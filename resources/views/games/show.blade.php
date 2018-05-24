@extends('layouts.blog')
@section('title', 'Game - '.$game->game_date )
@section('main')
	<article id="game-{{ $game->id }}" class="game">
		<header class="game-header">
			<h2 class="pb-3 mb-4 font-italic border-bottom">
				{{ $game->game_date }}
			</h2>
			<time datetime="{{ $game->game_date }}" class="blog-post-meta">
				min: {{ $game->minimal_players }} /
					@if ( $game->played )
					    played
					@else
					    no played
					@endif
			</time>
			<!-- @ include('partials.tags') -->
		</header>
		<div class="game-content">
			<p>
				{!! $game->invitation_rich_text !!}
			</p>
		</div>
		<footer class="game-footer">
			Tag: ....
		</footer>
	</article>

@endsection
@push('aside')
    @include('games.aside')
@endpush