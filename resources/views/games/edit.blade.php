@extends('layouts.master')
@section('main')

<div class="row justify-content-center">
  <div class="col-md-12">

    <form class="card border-warning" action="{{ route('games.update', $game ) }}" method="post">
      <div class="card-header bg-warning ">
        <h1 class="h4 text-uppercase">Edituj zápas.</h1>
      </div>

      <div class="card-body">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        @include('games.form')
      </div>
      <div class="card-footer">

        <button type="submit" class="btn btn-secondary">
            Update
        </button>
        <a href="{{ url()->previous() }}"
        class="btn btn-outline-secondary"
        role="button"
        ><span class="fa fa-undo" aria-hidden="true"></span> Back</a>

      </div>
    </form>
  </div>
</div>
@endsection
@push('scripts')
  <script>
  </script>
@endpush