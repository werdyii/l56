@extends('layouts.master')
@section('main')
<div class="row justify-content-center">
	<div class="col-md-12">
		<h2>Show all seasons ...
            <a href="{{ route('season.create') }}"
            class="btn btn-secondary"
            role="button"
            ><span class="fa fa-plus-circle" aria-hidden="true"></span> Nová sezóna</a>
		</h2>


		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Season</th>
		      <th scope="col">Games</th>
		      <th scope="col">Players</th>
		      <th scope="col">Start</th>
		      <th scope="col">End</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
			@forelse( $seasons as $season )
		    <tr>
		      <th scope="row">{{ $season->id }}</th>
		      <td><a href="{{ route('season.show', $season) }}">{{ $season->name }}</a></td>
		      <td>{{ $season->games()->count() }}</td>
		      <td>{{ $season->users()->count() }}</td>
		      <td>{{ $season->start_date }}</td>
		      <td>{{ $season->end_date }}</td>
		      <td>
                    <a href="{{ route('season.show', $season) }}"
                    class="btn btn-sm btn-info"
                    data-toggle="tooltip" data-placement="bottom" title="Show"
                    ><span class="fa fa-eye" aria-hidden="true"></span></a>

                    <a href="{{ route('season.edit', $season) }}"
                    class="btn btn-sm btn-secondary"
                    data-toggle="tooltip" data-placement="bottom" title="Edit"
                    ><span class="fa fa-pencil" aria-hidden="true"></span></a>

                    <a href="{{ route('season.delete', $season) }}"
                    class="btn btn-sm btn-danger"
                    data-toggle="tooltip" data-placement="bottom" title="Delete"
                    ><span class="fa fa-trash" aria-hidden="true"></span></a>

		      </td>
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