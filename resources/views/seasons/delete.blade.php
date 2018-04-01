@extends('layouts.master')
@section('main')
<div class="row justify-content-center">
	<div class="col-md-12">
		<h2>Delete {{ $season->name }}

            <form action="{{ route('season.destroy', $season) }}" method="post" class="d-inline-block denger">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button class="btn btn-danger" type="submit"
                data-toggle="tooltip" data-placement="bottom" title="Delete"
                ><span class="fa fa-trash" aria-hidden="true"></span> Submit deleting</button>
            </form>

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
	</div>
</div>
@endsection