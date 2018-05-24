@extends('layouts.blog')
@section('title', isset($title) ? $title : 'All games')
@section('main')

	<h3 class="pb-3 mb-4 font-italic border-bottom">
		@if(isset($user) && $user->avatar)
			<img src="{{ $user->avatar['tiny'] }}" alt="{{ $user->name }}">
		@endif
		{!! $title or " hrása nehrá ? " !!}

        <a href="{{ route('games.create') }}"
        class="btn btn-secondary"
        role="button"
        ><span class="fa fa-plus-circle" aria-hidden="true"></span> New Game</a>

	</h3>

	@forelse( $games as $game )

		<article id="game-{{ $game->id }}" class="game">
			<header class="game-header">
				<h2 datetime="{{ $game->game_date }}">
					<a href="{{ route('games.show', $game ) }}">{{ $game->game_date }} ( min: {{ $game->minimal_players }} ) </a>
				</h2>
			</header>
			<div class="game-content">
				<p>
					{{ $game->invitation }}
				</p>
			</div>
			<footer class="game-footer">
				<a href="{{ route('games.show', $game ) }}" class="read-more">
					Continue reading ...
				</a>
			</footer>
		</article>

	@empty

		<p>we got nothing :(</p>

	@endforelse


	{{ $games->appends(['year' => request('year'), 'month' => request('month')])->links('blog.pagination') }}

@endsection
@push('aside')
    @include('games.aside')
@endpush

